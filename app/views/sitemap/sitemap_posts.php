<?php header('Content-type: application/xml; charset=utf-8') ?>
<?php echo '<?xml version="1.0" encoding="UTF-8"?>' ?>
<?php
echo'
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
if ($posts->num_rows > 0) { foreach($posts as $post) {
$d = $post['created_at'];
$date = date('Y-m-d', strtotime($d));
echo '
<sitemap>
<loc>'.root.$post['slug'].'</loc>
<lastmod>'.$date.'</lastmod>
</sitemap>
'; }}
echo'</sitemapindex>'; ?>