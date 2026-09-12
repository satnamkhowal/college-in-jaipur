<?php
require_once __DIR__ . '/includes/functions.php';
$pageTitle = 'College in Jaipur – Find the Right College in Jaipur';
$featured = getColleges(['featured' => true], 6);
require __DIR__ . '/includes/header.php';
?>
<main>
    <section class="hero py-5">
        <div class="container py-lg-5">
            <div class="row align-items-center g-5">
                <div class="col-lg-7">
                    <span class="badge text-bg-warning rounded-pill px-3 py-2 mb-3">Jaipur-focused college discovery</span>
                    <h1 class="display-4 fw-bold">Find the right college in Jaipur for your future</h1>
                    <p class="lead text-secondary">Explore institutions, courses and admission information in one focused platform.</p>
                    <form action="<?= url('colleges.php') ?>" class="search-panel bg-white shadow p-2 rounded-4 d-flex gap-2 mt-4">
                        <label class="visually-hidden" for="homeSearch">Search colleges</label>
                        <input id="homeSearch" name="q" class="form-control form-control-lg border-0" placeholder="Search by college, area or type">
                        <button class="btn btn-primary px-4 rounded-3"><i class="bi bi-search me-2"></i>Search</button>
                    </form>
                    <div class="d-flex flex-wrap gap-4 mt-4 text-secondary small"><span><strong class="text-dark fs-5"><?= count(fallbackColleges()) ?>+</strong> starter listings</span><span><strong class="text-dark fs-5">100%</strong> Jaipur focused</span><span><strong class="text-dark fs-5">Free</strong> discovery</span></div>
                </div>
                <div class="col-lg-5">
                    <div class="hero-card bg-primary text-white rounded-5 p-4 p-lg-5 shadow-lg">
                        <i class="bi bi-mortarboard display-1"></i><h2 class="h3 mt-3">Confused about college selection?</h2><p class="text-white-50">Tell us your course preference, budget and location. We’ll help you create a practical shortlist.</p><a href="<?= url('contact.php') ?>" class="btn btn-light rounded-pill px-4">Get free guidance</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container py-5">
        <div class="d-flex justify-content-between align-items-end mb-4"><div><span class="eyebrow">Top choices</span><h2 class="fw-bold mb-0">Featured colleges in Jaipur</h2></div><a href="<?= url('colleges.php') ?>" class="btn btn-outline-primary rounded-pill">View all</a></div>
        <div class="row g-4">
            <?php foreach ($featured as $college): ?>
            <div class="col-md-6 col-xl-4"><article class="card college-card h-100 border-0 shadow-sm"><div class="card-body p-4"><div class="college-mark mb-3"><?= e(substr($college['short_name'] ?: $college['name'], 0, 2)) ?></div><span class="badge bg-primary-subtle text-primary mb-2"><?= e($college['type']) ?></span><h3 class="h5 fw-bold"><?= e($college['name']) ?></h3><p class="small text-secondary"><i class="bi bi-geo-alt"></i> <?= e($college['area']) ?>, Jaipur</p><p class="text-secondary small"><?= e($college['description']) ?></p></div><div class="card-footer bg-white border-0 p-4 pt-0"><a class="btn btn-outline-primary w-100" href="<?= url('college/' . $college['slug'] . '/') ?>">View college details</a></div></article></div>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="course-strip py-5"><div class="container"><span class="eyebrow">Browse by stream</span><h2 class="fw-bold mb-4">Popular study options</h2><div class="row g-3">
        <?php foreach ([['engineering','Engineering','cpu'],['mba','MBA','briefcase'],['bca','BCA','laptop'],['medical','Medical','heart-pulse'],['commerce','Commerce','graph-up'],['science','Science','flask'],['law','Law','bank'],['design','Design','pen']] as [$slug,$course,$icon]): ?>
        <div class="col-6 col-md-3"><a class="course-tile" href="<?= url('courses/'.$slug.'/') ?>"><i class="bi bi-<?= $icon ?>"></i><span><?= e($course) ?></span></a></div>
        <?php endforeach; ?>
    </div></div></section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
