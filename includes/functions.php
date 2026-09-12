<?php
declare(strict_types=1);

require_once __DIR__ . '/../config/database.php';

function e(?string $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

function url(string $path = ''): string
{
    return '/' . ltrim($path, '/');
}

function fallbackColleges(): array
{
    return [
        ['slug'=>'university-of-rajasthan','name'=>'University of Rajasthan','short_name'=>'UOR','type'=>'Public University','area'=>'JLN Marg','established'=>1947,'featured'=>1,'description'=>'A major public university in Jaipur offering undergraduate, postgraduate and research programmes.'],
        ['slug'=>'malaviya-national-institute-of-technology-jaipur','name'=>'Malaviya National Institute of Technology Jaipur','short_name'=>'MNIT Jaipur','type'=>'Public Institute','area'=>'Malviya Nagar','established'=>1963,'featured'=>1,'description'=>'A nationally recognised technical institute offering engineering, architecture, management and research programmes.'],
        ['slug'=>'jecrc-university','name'=>'JECRC University','short_name'=>'JECRC','type'=>'Private University','area'=>'Sitapura','established'=>2012,'featured'=>1,'description'=>'A multidisciplinary private university known for engineering, management, sciences and design programmes.'],
        ['slug'=>'manipal-university-jaipur','name'=>'Manipal University Jaipur','short_name'=>'MUJ','type'=>'Private University','area'=>'Dehmi Kalan','established'=>2011,'featured'=>1,'description'=>'A multidisciplinary university offering engineering, design, management, law, sciences and humanities programmes.'],
        ['slug'=>'jaipur-national-university','name'=>'Jaipur National University','short_name'=>'JNU Jaipur','type'=>'Private University','area'=>'Jagatpura','established'=>2007,'featured'=>1,'description'=>'A private university with programmes across engineering, management, law, life sciences and allied health.'],
        ['slug'=>'iis-university','name'=>'IIS (Deemed to be University)','short_name'=>'IIS University','type'=>'Deemed University','area'=>'Mansarovar','established'=>2009,'featured'=>0,'description'=>'A Jaipur-based institution offering programmes in arts, commerce, science, management and related disciplines.'],
        ['slug'=>'poornima-university','name'=>'Poornima University','short_name'=>'PU','type'=>'Private University','area'=>'Sitapura','established'=>2012,'featured'=>1,'description'=>'A private university focused on engineering, architecture, design, management, science and computer applications.'],
        ['slug'=>'amity-university-rajasthan','name'=>'Amity University Rajasthan','short_name'=>'Amity Jaipur','type'=>'Private University','area'=>'Kant Kalwar','established'=>2008,'featured'=>1,'description'=>'A multidisciplinary private university near Jaipur offering professional and academic programmes.'],
        ['slug'=>'vivekananda-global-university','name'=>'Vivekananda Global University','short_name'=>'VGU','type'=>'Private University','area'=>'Jagatpura','established'=>2012,'featured'=>1,'description'=>'A private university offering engineering, law, management, agriculture, design and applied sciences.'],
        ['slug'=>'suresh-gyan-vihar-university','name'=>'Suresh Gyan Vihar University','short_name'=>'SGVU','type'=>'Private University','area'=>'Jagatpura','established'=>2008,'featured'=>0,'description'=>'A multidisciplinary university with programmes in engineering, management, pharmacy, science and education.'],
        ['slug'=>'maharani-college-jaipur','name'=>'University Maharani College','short_name'=>'Maharani College','type'=>'Public College','area'=>'Ashok Nagar','established'=>1944,'featured'=>0,'description'=>'A constituent women’s college of the University of Rajasthan offering undergraduate programmes.'],
        ['slug'=>'maharaja-college-jaipur','name'=>'University Maharaja College','short_name'=>'Maharaja College','type'=>'Public College','area'=>'Ram Singh Road','established'=>1844,'featured'=>0,'description'=>'A constituent college of the University of Rajasthan with undergraduate science programmes.'],
        ['slug'=>'commerce-college-jaipur','name'=>'University Commerce College','short_name'=>'Commerce College','type'=>'Public College','area'=>'JLN Marg','established'=>1956,'featured'=>0,'description'=>'A constituent college of the University of Rajasthan focused on commerce and business education.'],
        ['slug'=>'kanoria-pg-mahila-mahavidyalaya','name'=>'Kanoria PG Mahila Mahavidyalaya','short_name'=>'Kanoria College','type'=>'Private College','area'=>'JLN Marg','established'=>1965,'featured'=>0,'description'=>'A women’s college offering undergraduate and postgraduate programmes across major streams.'],
        ['slug'=>'st-xaviers-college-jaipur','name'=>"St. Xavier's College Jaipur",'short_name'=>"St. Xavier's",'type'=>'Private College','area'=>'Nevta','established'=>2010,'featured'=>0,'description'=>'A degree college offering programmes in arts, commerce, business, science and computer applications.'],
        ['slug'=>'subodh-pg-college','name'=>'S.S. Jain Subodh P.G. College','short_name'=>'Subodh College','type'=>'Private College','area'=>'Rambagh Circle','established'=>1954,'featured'=>1,'description'=>'A Jaipur college offering undergraduate and postgraduate programmes across science, commerce and arts.'],
        ['slug'=>'aryagroup-of-colleges','name'=>'Arya Group of Colleges','short_name'=>'Arya College','type'=>'Private College','area'=>'Kukas','established'=>2000,'featured'=>0,'description'=>'A group of institutions in Jaipur offering engineering, technology and management programmes.'],
        ['slug'=>'skit-jaipur','name'=>'Swami Keshvanand Institute of Technology','short_name'=>'SKIT Jaipur','type'=>'Private College','area'=>'Jagatpura','established'=>2000,'featured'=>1,'description'=>'An engineering and management institute in Jaipur offering technical and professional programmes.'],
        ['slug'=>'poornima-college-of-engineering','name'=>'Poornima College of Engineering','short_name'=>'PCE','type'=>'Private College','area'=>'Sitapura','established'=>2000,'featured'=>0,'description'=>'An engineering institution in Jaipur offering undergraduate technical programmes.'],
        ['slug'=>'maharishi-arvind-institute','name'=>'Maharishi Arvind Institute of Engineering & Technology','short_name'=>'MAIET','type'=>'Private College','area'=>'Mansarovar','established'=>1999,'featured'=>0,'description'=>'A Jaipur institution offering engineering and technology programmes.'],
        ['slug'=>'rajasthan-college-jaipur','name'=>'University Rajasthan College','short_name'=>'Rajasthan College','type'=>'Public College','area'=>'JLN Marg','established'=>1957,'featured'=>0,'description'=>'A constituent college of the University of Rajasthan offering undergraduate arts programmes.'],
        ['slug'=>'biyani-girls-college','name'=>'Biyani Girls College','short_name'=>'Biyani College','type'=>'Private College','area'=>'Vidyadhar Nagar','established'=>2005,'featured'=>0,'description'=>'A women’s college offering programmes in commerce, management, science, education and technology.'],
        ['slug'=>'apex-university-jaipur','name'=>'Apex University Jaipur','short_name'=>'Apex University','type'=>'Private University','area'=>'Achrol','established'=>2018,'featured'=>0,'description'=>'A private university offering multidisciplinary undergraduate and postgraduate programmes.'],
        ['slug'=>'jagannath-university-jaipur','name'=>'Jagan Nath University Jaipur','short_name'=>'JNU Jaipur','type'=>'Private University','area'=>'Chaksu','established'=>2008,'featured'=>0,'description'=>'A private university offering engineering, management, law, agriculture and education programmes.'],
    ];
}

function getColleges(array $filters = [], int $limit = 0): array
{
    $pdo = db();
    if (!$pdo) {
        $rows = fallbackColleges();
        if (!empty($filters['q'])) {
            $q = strtolower($filters['q']);
            $rows = array_values(array_filter($rows, fn($row) => str_contains(strtolower($row['name'].' '.$row['area'].' '.$row['type']), $q)));
        }
        if (!empty($filters['type'])) {
            $rows = array_values(array_filter($rows, fn($row) => $row['type'] === $filters['type']));
        }
        if (!empty($filters['featured'])) {
            $rows = array_values(array_filter($rows, fn($row) => (int)$row['featured'] === 1));
        }
        return $limit ? array_slice($rows, 0, $limit) : $rows;
    }

    $where = ['status = 1'];
    $params = [];
    if (!empty($filters['q'])) {
        $where[] = '(name LIKE :q OR short_name LIKE :q OR area LIKE :q OR type LIKE :q)';
        $params['q'] = '%' . $filters['q'] . '%';
    }
    if (!empty($filters['type'])) {
        $where[] = 'type = :type';
        $params['type'] = $filters['type'];
    }
    if (!empty($filters['featured'])) {
        $where[] = 'featured = 1';
    }
    $sql = 'SELECT * FROM colleges WHERE ' . implode(' AND ', $where) . ' ORDER BY featured DESC, name ASC';
    if ($limit > 0) {
        $sql .= ' LIMIT ' . (int)$limit;
    }
    $statement = $pdo->prepare($sql);
    $statement->execute($params);
    return $statement->fetchAll();
}

function getCollege(string $slug): ?array
{
    $pdo = db();
    if (!$pdo) {
        foreach (fallbackColleges() as $college) {
            if ($college['slug'] === $slug) return $college;
        }
        return null;
    }
    $statement = $pdo->prepare('SELECT * FROM colleges WHERE slug = :slug AND status = 1 LIMIT 1');
    $statement->execute(['slug' => $slug]);
    return $statement->fetch() ?: null;
}
