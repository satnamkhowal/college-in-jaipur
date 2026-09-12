<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/blog-data.php';
header('Content-Type: application/xml; charset=utf-8');
$base='https://collegeinjaipur.com';
echo '<?xml version="1.0" encoding="UTF-8"?>';
?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<?php foreach(['/','/colleges.php','/courses.php','/compare.php','/about.php','/contact.php','/blog/'] as $path): ?><url><loc><?= e($base.$path) ?></loc><changefreq>weekly</changefreq><priority><?= $path==='/'?'1.0':'0.8' ?></priority></url><?php endforeach; ?>
<?php foreach(getColleges() as $college): ?><url><loc><?= e($base.'/college.php?slug='.urlencode($college['slug'])) ?></loc><changefreq>monthly</changefreq><priority>0.8</priority></url><?php endforeach; ?>
<?php foreach(allBlogPosts() as $post): ?><url><loc><?= e($base.'/blog/'.$post['slug'].'/') ?></loc><changefreq>monthly</changefreq><priority>0.7</priority></url><?php endforeach; ?>
</urlset>
