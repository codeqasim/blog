<?php
echo'<?xml version="1.0" encoding="UTF-8"?>';
echo'<?xml-stylesheet type="text/xsl" href="'.root.'app/views/sitemap/sitemap.xsl"?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

if ($users->num_rows > 0) { foreach($users as $user) {
echo '
<sitemap>
<loc>'.root.$user['slug'].'</loc>
<lastmod>'.$user['created_at'].'</lastmod>
</sitemap>
'; }}

echo'</sitemapindex>'; ?>