<?php echo '<?xml version="1.0" encoding="UTF-8" ?>'?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<?php if ($posts->num_rows > 0) { foreach($posts as $post) {  $d = $post['created_at']; $date = date('Y-m-d', strtotime($d)); ?>
<url>
<loc><?=root.$post['slug']?></loc>
<lastmod><?=$date?></lastmod>
</url>
<?php } } ?>
</urlset>