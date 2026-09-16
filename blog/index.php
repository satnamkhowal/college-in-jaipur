<?php
require_once __DIR__ . '/../includes/blog-data.php';
$posts = allBlogPosts();
$category = trim($_GET['category'] ?? '');
$q = trim($_GET['q'] ?? '');
if ($category) $posts = array_values(array_filter($posts, fn($p)=>$p['category']===$category));
if ($q) $posts = array_values(array_filter($posts, fn($p)=>str_contains(strtolower($p['title'].' '.$p['description']), strtolower($q))));
$page = max(1,(int)($_GET['page']??1)); $perPage=24; $totalPages=max(1,(int)ceil(count($posts)/$perPage)); $page=min($page,$totalPages); $visible=array_slice($posts,($page-1)*$perPage,$perPage);
$pageTitle='College & Admission Blog in Jaipur | College in Jaipur';
$pageDescription='1000 Jaipur college guides covering admissions, courses, fees, areas, comparisons and student planning for 2026.';
$canonicalUrl=$page>1?'https://collegeinjaipur.com/blog/?page='.$page:'https://collegeinjaipur.com/blog/';
$robotsContent=($category||$q)?'noindex,follow':'index,follow,max-image-preview:large';
require __DIR__ . '/../includes/header.php';
?>
<main><section class="page-heading py-5"><div class="container"><span class="eyebrow">Student resource hub</span><h1 class="fw-bold">Jaipur College & Admission Blog</h1><p class="text-secondary">1000 practical Hinglish guides for college research, courses, fees, comparisons and admission planning.</p><form class="row g-2 mt-3"><div class="col-md-6"><input class="form-control form-control-lg" name="q" value="<?= e($q) ?>" placeholder="Search guides"></div><div class="col-md-3"><select class="form-select form-select-lg" name="category"><option value="">All categories</option><?php foreach(['College Guides','Course Guides','Area Guides','Comparisons'] as $item): ?><option <?= $category===$item?'selected':'' ?>><?= e($item) ?></option><?php endforeach; ?></select></div><div class="col-md-auto"><button class="btn btn-primary btn-lg">Search</button></div></form></div></section>
<section class="container py-5"><div class="d-flex justify-content-between mb-4"><strong><?= count($posts) ?> guides found</strong><span class="text-secondary small">Page <?= $page ?> of <?= $totalPages ?></span></div><div class="row g-4"><?php foreach($visible as $post): ?><div class="col-md-6 col-xl-4"><article class="card blog-card h-100 border-0 shadow-sm"><div class="card-body p-4"><span class="badge bg-primary-subtle text-primary mb-3"><?= e($post['category']) ?></span><h2 class="h5 fw-bold"><a class="stretched-link text-decoration-none text-dark" href="<?= url('blog/'.$post['slug'].'/') ?>"><?= e($post['title']) ?></a></h2><p class="small text-secondary mb-0"><?= e($post['description']) ?></p></div></article></div><?php endforeach; ?></div>
<?php if($totalPages>1): ?><nav class="mt-5"><ul class="pagination justify-content-center"><?php for($i=max(1,$page-2);$i<=min($totalPages,$page+2);$i++): ?><li class="page-item <?= $i===$page?'active':'' ?>"><a class="page-link" href="?page=<?= $i ?>&category=<?= urlencode($category) ?>&q=<?= urlencode($q) ?>"><?= $i ?></a></li><?php endfor; ?></ul></nav><?php endif; ?></section></main>
<?php require __DIR__ . '/../includes/footer.php'; ?>
