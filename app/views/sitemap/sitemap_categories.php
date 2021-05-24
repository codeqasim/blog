<?php
echo'<?xml version="1.0" encoding="UTF-8"?>';
echo'<?xml-stylesheet type="text/xsl" href="'.root.'app/views/sitemap/sitemap.xsl"?>
';?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">
<?php if ($categories->num_rows > 0) { foreach($categories as $category) {  $d = $category['created_at']; $date = date('Y-m-d', strtotime($d)); ?>
<url>
<loc><?=root.$category['slug']?></loc>
<lastmod><?=$date?></lastmod>
</url>
<?php } } ?>
</urlset>