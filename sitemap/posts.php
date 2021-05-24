<?php
$root=(isset($_SERVER['HTTPS']) ? "https://" : "http://").$_SERVER['HTTP_HOST']; $root.= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']); define('root', $root);
//then remove character from right
$url = rtrim(root, '/');
// then explode
$url = explode('/', $url);
// remove the last element and return an array
json_encode(array_pop($url));
// implode again into string

include "../config.php";
include "../app/db.php";
$posts = $mysqli->query("SELECT * FROM posts WHERE status = 1");
header('Content-type: text/xml');
echo '<?xml version="1.0" encoding="UTF-8" ?>' ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<url>
<?php foreach ($posts as $p){ $d = $p['created_at']; $date = date('Y-m-d', strtotime($d));
?>
<loc><?=implode('/', $url)."/".$p['slug']?></loc>
<lastmod><?=$date?></lastmod>
<?php } ?>
</url>
</urlset>