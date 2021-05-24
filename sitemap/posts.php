<?php
$root=(isset($_SERVER['HTTPS']) ? "https://" : "http://").$_SERVER['HTTP_HOST']; $root.= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']); define('root', $root);
$url = rtrim(root, '/');$url = explode('/', $url);json_encode(array_pop($url));
include "../config.php";
include "../app/db.php";
$posts = $mysqli->query("SELECT * FROM posts WHERE status = 1");
header('Content-type: text/xml');
echo'<?xml version="1.0" encoding="UTF-8"?>';
echo'<?xml-stylesheet type="text/xsl" href="'.root.'sitemap.xsl"?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
if ($posts->num_rows > 0) { foreach($posts as $post) {
$d = $post['created_at'];
$date = date('Y-m-d', strtotime($d));
echo '<sitemap>
<loc>'.root.$post['slug'].'</loc>
<lastmod>'.$date.'</lastmod>
</sitemap>'; }}
echo'</sitemapindex>'; ?>