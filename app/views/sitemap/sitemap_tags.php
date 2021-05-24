<?php
echo'<?xml version="1.0" encoding="UTF-8"?>';
echo'<?xml-stylesheet type="text/xsl" href="'.root.'app/views/sitemap/sitemap.xsl"?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

if ($tags->num_rows > 0) {
foreach($tags as $tag) {

$d = $post['created_at'];
$date = date('Y-m-d', strtotime($d));

if(empty($tag['keywords'])) {
// Do something for all those arrays that are not empty
} else {

echo '
<sitemap>
<loc>'.root."tags/".str_replace(' ', '-', $tag['keywords']).'</loc>
<lastmod>'.$date.'</lastmod>
</sitemap>
'; }}}
echo'</sitemapindex>'; ?>