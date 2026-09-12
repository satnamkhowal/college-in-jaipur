<?php
declare(strict_types=1);

$lockFile = __DIR__ . '/install.lock';
$success = '';
$error = '';

if (is_file($lockFile)) {
    http_response_code(403);
    exit('<!doctype html><html><body style="font-family:system-ui;padding:40px"><h1>Installer locked</h1><p>The website is already installed. Delete <code>install/install.lock</code> only if you intentionally want to reinstall.</p><p><a href="/">Open website</a></p></body></html>');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $host = trim($_POST['host'] ?? 'localhost');
    $port = (int)($_POST['port'] ?? 3306);
    $database = trim($_POST['database'] ?? '');
    $username = trim($_POST['username'] ?? '');
    $password = (string)($_POST['password'] ?? '');
    $createDatabase = isset($_POST['create_database']);

    if (!preg_match('/^[a-zA-Z0-9_]+$/', $database)) {
        $error = 'Database name may contain only letters, numbers and underscore.';
    } elseif ($host === '' || $username === '' || $port < 1 || $port > 65535) {
        $error = 'Please enter valid database connection details.';
    } else {
        try {
            $server = new PDO("mysql:host={$host};port={$port};charset=utf8mb4", $username, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
            if ($createDatabase) {
                $server->exec("CREATE DATABASE IF NOT EXISTS `{$database}` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
            }
            $server->exec("USE `{$database}`");
            $schema = file_get_contents(__DIR__ . '/schema.sql');
            if ($schema === false) throw new RuntimeException('Could not read schema.sql');
            $server->exec($schema);

            require_once __DIR__ . '/../includes/functions.php';
            $insert = $server->prepare('INSERT INTO colleges (slug,name,short_name,type,area,established,description,featured) VALUES (:slug,:name,:short_name,:type,:area,:established,:description,:featured) ON DUPLICATE KEY UPDATE name=VALUES(name),short_name=VALUES(short_name),type=VALUES(type),area=VALUES(area),established=VALUES(established),description=VALUES(description),featured=VALUES(featured)');
            foreach (fallbackColleges() as $college) $insert->execute($college);

            $courses = [
                ['btech','B.Tech','Engineering','Undergraduate','4 years'],['bca','BCA','Computer Applications','Undergraduate','3 years'],['mca','MCA','Computer Applications','Postgraduate','2 years'],['bba','BBA','Management','Undergraduate','3 years'],['mba','MBA','Management','Postgraduate','2 years'],['bcom','B.Com','Commerce','Undergraduate','3 years'],['bsc','B.Sc','Science','Undergraduate','3 years'],['ba','BA','Arts & Humanities','Undergraduate','3 years'],['llb','LLB','Law','Undergraduate','3 years'],['bdes','B.Des','Design','Undergraduate','4 years'],['bpharm','B.Pharm','Pharmacy','Undergraduate','4 years'],['bed','B.Ed','Education','Undergraduate','2 years']
            ];
            $courseInsert = $server->prepare('INSERT INTO courses (slug,name,stream,level,duration) VALUES (?,?,?,?,?) ON DUPLICATE KEY UPDATE name=VALUES(name),stream=VALUES(stream),level=VALUES(level),duration=VALUES(duration)');
            foreach ($courses as $course) $courseInsert->execute($course);

            $config = "<?php\nreturn " . var_export(['host'=>$host,'port'=>$port,'database'=>$database,'username'=>$username,'password'=>$password], true) . ";\n";
            if (file_put_contents(__DIR__ . '/../config/local.php', $config, LOCK_EX) === false) throw new RuntimeException('Could not write config/local.php. Make the config folder writable and try again.');
            file_put_contents($lockFile, 'Installed at ' . date(DATE_ATOM), LOCK_EX);
            $success = 'Installation completed. Tables and starter data are ready.';
        } catch (Throwable $exception) {
            error_log('College in Jaipur installer: ' . $exception->getMessage());
            $error = 'Installation failed. Check the database details, permissions and server error log.';
        }
    }
}
?>
<!doctype html><html lang="en"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Install College in Jaipur</title><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"></head><body class="bg-light"><main class="container py-5"><div class="row justify-content-center"><div class="col-lg-7"><div class="card border-0 shadow"><div class="card-body p-4 p-lg-5"><h1 class="h2 fw-bold">College in Jaipur installer</h1><p class="text-secondary">Enter the MySQL details supplied by your hosting provider. The installer will create all required tables and starter records.</p><?php if($error): ?><div class="alert alert-danger"><?= htmlspecialchars($error,ENT_QUOTES,'UTF-8') ?></div><?php endif; ?><?php if($success): ?><div class="alert alert-success"><strong><?= htmlspecialchars($success,ENT_QUOTES,'UTF-8') ?></strong><hr><a class="btn btn-success" href="/">Open website</a></div><?php else: ?><form method="post" class="row g-3"><div class="col-md-8"><label class="form-label">Database host / IP</label><input class="form-control" name="host" value="<?= htmlspecialchars($_POST['host']??'localhost',ENT_QUOTES,'UTF-8') ?>" required></div><div class="col-md-4"><label class="form-label">Port</label><input class="form-control" type="number" name="port" value="<?= (int)($_POST['port']??3306) ?>" required></div><div class="col-12"><label class="form-label">Database name</label><input class="form-control" name="database" value="<?= htmlspecialchars($_POST['database']??'',ENT_QUOTES,'UTF-8') ?>" required></div><div class="col-md-6"><label class="form-label">Database username</label><input class="form-control" name="username" autocomplete="username" required></div><div class="col-md-6"><label class="form-label">Database password</label><input class="form-control" type="password" name="password" autocomplete="current-password"></div><div class="col-12"><div class="form-check"><input class="form-check-input" type="checkbox" name="create_database" id="createDb"><label class="form-check-label" for="createDb">Create database if it does not exist (requires permission)</label></div></div><div class="col-12"><button class="btn btn-primary btn-lg">Install database</button></div></form><?php endif; ?></div></div></div></div></main></body></html>
