<?php
require_once __DIR__ . '/includes/functions.php';
$college = getCollege(trim($_GET['slug'] ?? ''));
if (!$college) { http_response_code(404); $pageTitle='College not found'; require __DIR__.'/includes/header.php'; echo '<main class="container py-5"><div class="alert alert-warning"><h1 class="h3">College not found</h1><a href="'.url('colleges.php').'">Browse colleges</a></div></main>'; require __DIR__.'/includes/footer.php'; exit; }
$requestPath = parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH);
if ($requestPath === '/college.php') {
    header('Location: /college/' . rawurlencode($college['slug']) . '/', true, 301);
    exit;
}
$pageTitle = $college['name'] . ' – Courses, Admission & Details';
$pageDescription = $college['description'];
$canonicalUrl = 'https://collegeinjaipur.com/college/' . $college['slug'] . '/';
$collegeSchema = [
    '@context'=>'https://schema.org','@type'=>'CollegeOrUniversity','name'=>$college['name'],
    'url'=>$canonicalUrl,'description'=>$college['description'],
    'address'=>['@type'=>'PostalAddress','addressLocality'=>'Jaipur','addressRegion'=>'Rajasthan','addressCountry'=>'IN','streetAddress'=>$college['area']],
];
if (!empty($college['established'])) $collegeSchema['foundingDate'] = (string)$college['established'];
$structuredData = [$collegeSchema];
require __DIR__ . '/includes/header.php';
?>
<main><section class="college-hero py-5 text-white"><div class="container"><nav aria-label="breadcrumb"><ol class="breadcrumb breadcrumb-light"><li class="breadcrumb-item"><a href="<?= url() ?>">Home</a></li><li class="breadcrumb-item"><a href="<?= url('colleges.php') ?>">Colleges</a></li><li class="breadcrumb-item active"><?= e($college['short_name']) ?></li></ol></nav><div class="d-flex flex-column flex-md-row gap-4 align-items-md-center"><div class="college-mark college-mark-lg bg-white text-primary"><?= e(substr($college['short_name'] ?: $college['name'],0,2)) ?></div><div><span class="badge text-bg-warning mb-2"><?= e($college['type']) ?></span><h1 class="display-6 fw-bold mb-2"><?= e($college['name']) ?></h1><p class="mb-0"><i class="bi bi-geo-alt me-1"></i><?= e($college['area']) ?>, Jaipur <?= !empty($college['established']) ? ' · Established '.e((string)$college['established']) : '' ?></p></div></div></div></section>
<section class="container py-5"><div class="row g-4"><div class="col-lg-8"><div class="card border-0 shadow-sm p-4 mb-4"><h2 class="h4 fw-bold">About <?= e($college['short_name'] ?: $college['name']) ?></h2><p class="text-secondary mb-0"><?= e($college['description']) ?></p></div><div class="card border-0 shadow-sm p-4"><h2 class="h4 fw-bold">College information</h2><div class="row g-3 mt-1"><div class="col-sm-6"><div class="info-box"><small>Institution type</small><strong><?= e($college['type']) ?></strong></div></div><div class="col-sm-6"><div class="info-box"><small>Location</small><strong><?= e($college['area']) ?>, Jaipur</strong></div></div><div class="col-sm-6"><div class="info-box"><small>Established</small><strong><?= e((string)($college['established'] ?? 'Check official website')) ?></strong></div></div><div class="col-sm-6"><div class="info-box"><small>Admission status</small><strong>Check with institution</strong></div></div></div><div class="alert alert-warning small mt-4 mb-0">Courses, eligibility, fees and admission dates can change. Verify current details on the institution’s official website before applying.</div></div></div><aside class="col-lg-4"><div class="card border-0 shadow-sm p-4"><h2 class="h5 fw-bold">Get admission guidance</h2><p class="small text-secondary">Share your preferred course and contact details.</p><form action="<?= url('contact.php') ?>" method="get"><input type="hidden" name="college" value="<?= e($college['name']) ?>"><button class="btn btn-primary w-100">Request a callback</button></form></div></aside></div></section></main>
<?php require __DIR__ . '/includes/footer.php'; ?>
