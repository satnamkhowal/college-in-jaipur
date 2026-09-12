<?php
require_once __DIR__ . '/includes/functions.php';
$q = trim($_GET['q'] ?? '');
$type = trim($_GET['type'] ?? '');
$colleges = getColleges(['q'=>$q, 'type'=>$type]);
$pageTitle = ($q ? 'Search: '. $q .' – ' : '') . 'Colleges in Jaipur | College in Jaipur';
$pageDescription = 'Browse and filter colleges and universities in Jaipur by name, area and institution type.';
require __DIR__ . '/includes/header.php';
?>
<main class="bg-light-subtle">
<section class="page-heading py-5"><div class="container"><nav aria-label="breadcrumb"><ol class="breadcrumb"><li class="breadcrumb-item"><a href="<?= url() ?>">Home</a></li><li class="breadcrumb-item active">Colleges</li></ol></nav><h1 class="fw-bold">Colleges in Jaipur</h1><p class="text-secondary mb-0">Search and shortlist colleges across Jaipur.</p></div></section>
<section class="container pb-5"><div class="row g-4">
    <aside class="col-lg-3"><form class="card border-0 shadow-sm p-4 sticky-lg-top filter-card"><h2 class="h5 fw-bold">Filter colleges</h2><label class="form-label mt-3" for="q">Search</label><input class="form-control" id="q" name="q" value="<?= e($q) ?>" placeholder="College or area"><label class="form-label mt-3" for="type">Institution type</label><select class="form-select" id="type" name="type"><option value="">All types</option><?php foreach (['Public University','Private University','Deemed University','Public Institute','Public College','Private College'] as $item): ?><option <?= $type===$item?'selected':'' ?>><?= e($item) ?></option><?php endforeach; ?></select><button class="btn btn-primary mt-4">Apply filters</button><a href="<?= url('colleges.php') ?>" class="btn btn-link">Clear</a></form></aside>
    <div class="col-lg-9"><div class="d-flex justify-content-between align-items-center mb-3"><strong><?= count($colleges) ?> colleges found</strong><span class="small text-secondary">Information should be verified with the institution.</span></div>
    <div class="vstack gap-3"><?php foreach ($colleges as $college): ?><article class="card border-0 shadow-sm"><div class="card-body p-4"><div class="row align-items-center g-3"><div class="col-auto"><div class="college-mark"><?= e(substr($college['short_name'] ?: $college['name'],0,2)) ?></div></div><div class="col"><span class="badge bg-primary-subtle text-primary"><?= e($college['type']) ?></span><h2 class="h5 fw-bold mt-2 mb-1"><?= e($college['name']) ?></h2><p class="small text-secondary mb-2"><i class="bi bi-geo-alt"></i> <?= e($college['area']) ?>, Jaipur<?= !empty($college['established']) ? ' · Est. '.e((string)$college['established']) : '' ?></p><p class="small text-secondary mb-0"><?= e($college['description']) ?></p></div><div class="col-md-auto"><a class="btn btn-outline-primary" href="<?= url('college.php?slug='.urlencode($college['slug'])) ?>">View details</a></div></div></div></article><?php endforeach; ?><?php if (!$colleges): ?><div class="alert alert-info">No matching colleges found. Try removing a filter.</div><?php endif; ?></div></div>
</div></section></main>
<?php require __DIR__ . '/includes/footer.php'; ?>
