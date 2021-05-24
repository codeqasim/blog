<?php echo'<?xml version="1.0" encoding="UTF-8"?>';
$date = date("Y-m-d");
$time = date("h:i");
$date_time = $date .' '. $time;
?>
<?php echo'<?xml-stylesheet type="text/xsl" href="'.root.'app/views/sitemap/sitemap.xsl"?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<sitemap><loc>'.root.'sitemap-pages.xml</loc>
<lastmod>'.$date.'</lastmod></sitemap>
<sitemap><loc>'.root.'sitemap-posts.xml</loc>
<lastmod>'.$date.'</lastmod>
</sitemap>
<sitemap>
<loc>'.root.'sitemap-authors.xml</loc>
<lastmod>'.$date.'</lastmod>
</sitemap>
<sitemap>
<loc>'.root.'sitemap-categories.xml</loc>
<lastmod>'.$date.'</lastmod>
</sitemap>
<!--
<sitemap>
<loc>'.root.'sitemap-tags.xml</loc>
<lastmod>'.$date.'</lastmod>
</sitemap>
-->
</sitemapindex>'; ?>

<?php echo '<?xml version="1.0" encoding="UTF-8" ?>'?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<?php if ($posts->num_rows > 0) { foreach($posts as $post) {  $d = $post['created_at']; $date = date('Y-m-d', strtotime($d)); ?>
<url>
<loc><?=root.$post['slug']?></loc>
<lastmod><?=$date?></lastmod>
</url>
<?php } } ?>
</urlset>