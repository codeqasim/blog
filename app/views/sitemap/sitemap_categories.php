<?php
echo'<?xml version="1.0" encoding="UTF-8"?>';
echo'<?xml-stylesheet type="text/xsl" href="'.root.'app/views/sitemap/sitemap.xsl"?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

if ($categories->num_rows > 0) { foreach($categories as $category) {

$d = $post['created_at'];
$date = date('Y-m-d', strtotime($d));

echo '
<sitemap>
<loc>'.root.$category['slug'].'</loc>
<lastmod>'.$date.'</lastmod>
</sitemap>
'; }}

echo'</sitemapindex>'; ?>