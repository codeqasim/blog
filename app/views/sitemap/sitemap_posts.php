<?php
echo'<?xml version="1.0" encoding="UTF-8"?>';
echo'<?xml-stylesheet type="text/xsl" href="'.root.'app/views/sitemap/sitemap.xsl"?>
';?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">
<?php if ($posts->num_rows > 0) { foreach($posts as $post) {  $d = $post['created_at']; $date = date('Y-m-d', strtotime($d)); ?>
<url>
<loc><?=root.$post['slug']?></loc>
<lastmod><?=$date?></lastmod>
<image:image>
<image:loc><?=root."uploads/posts/".$post['img']?></image:loc>
<image:caption><?=$post['img']?></image:caption>
</image:image>
</url>
<?php } } ?>
</urlset>