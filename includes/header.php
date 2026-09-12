<?php
$pageTitle = $pageTitle ?? 'College in Jaipur – Find Colleges, Courses & Admissions';
$pageDescription = $pageDescription ?? 'Explore colleges in Jaipur, compare courses and find admission information.';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($pageTitle) ?></title>
    <meta name="description" content="<?= e($pageDescription) ?>">
    <link rel="canonical" href="https://collegeinjaipur.com<?= e(parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/') ?>">
    <link rel="icon" type="image/svg+xml" href="<?= url('assets/favicon.svg') ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= url('assets/css/style.css') ?>" rel="stylesheet">
    <link href="<?= url('assets/css/blog.css') ?>" rel="stylesheet">
</head>
<body>
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
