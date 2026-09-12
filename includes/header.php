<?php
$pageTitle = $pageTitle ?? 'College in Jaipur – Find Colleges, Courses & Admissions';
$pageDescription = $pageDescription ?? 'Explore colleges in Jaipur, compare courses and find admission information.';
$gtmId = 'GTM-WDB587JK';
$canonicalUrl = $canonicalUrl ?? ('https://collegeinjaipur.com' . (parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/'));
$robotsContent = $robotsContent ?? 'index,follow,max-image-preview:large,max-snippet:-1,max-video-preview:-1';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($pageTitle) ?></title>
    <meta name="description" content="<?= e($pageDescription) ?>">
    <meta name="robots" content="<?= e($robotsContent) ?>">
    <link rel="canonical" href="<?= e($canonicalUrl) ?>">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="College in Jaipur">
    <meta property="og:title" content="<?= e($pageTitle) ?>">
    <meta property="og:description" content="<?= e($pageDescription) ?>">
    <meta property="og:url" content="<?= e($canonicalUrl) ?>">
    <meta name="twitter:card" content="summary_large_image">
    <link rel="icon" type="image/svg+xml" href="<?= url('assets/favicon.svg') ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= url('assets/css/style.css') ?>" rel="stylesheet">
    <link href="<?= url('assets/css/blog.css') ?>" rel="stylesheet">
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        (function () {
            var choice = localStorage.getItem('google_consent');
            var granted = choice === 'granted' ? 'granted' : 'denied';
            gtag('consent', 'default', {
                ad_storage: 'denied',
                ad_user_data: 'denied',
                ad_personalization: 'denied',
                analytics_storage: granted,
                functionality_storage: 'granted',
                security_storage: 'granted',
                wait_for_update: 500
            });
        }());
    </script>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','<?= e($gtmId) ?>');</script>
    <!-- End Google Tag Manager -->
    <?php if (!empty($analyticsEvent) && is_array($analyticsEvent)): ?>
    <script>window.dataLayer.push(<?= json_encode($analyticsEvent, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?>);</script>
    <?php endif; ?>
    <?php foreach (($structuredData ?? []) as $schema): ?>
    <script type="application/ld+json"><?= json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?></script>
    <?php endforeach; ?>
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?= e($gtmId) ?>" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div class="topbar py-2 text-white">
    <div class="container d-flex justify-content-between small">
        <span><i class="bi bi-geo-alt me-1"></i>Jaipur, Rajasthan</span>
        <span>Powered by <strong>Groot Software</strong></span>
    </div>
</div>
<nav class="navbar navbar-expand-lg bg-white sticky-top shadow-sm">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-2" href="<?= url() ?>">
            <img src="<?= url('assets/logo.svg') ?>" alt="College in Jaipur" width="210" height="52">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
                <li class="nav-item"><a class="nav-link" href="<?= url('colleges.php') ?>">Colleges</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= url('courses.php') ?>">Courses</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= url('blog/') ?>">Blog</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= url('compare.php') ?>">Compare</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= url('about.php') ?>">About</a></li>
                <li class="nav-item"><a class="btn btn-primary rounded-pill px-4" href="<?= url('contact.php') ?>">Admission Help</a></li>
            </ul>
        </div>
    </div>
</nav>
