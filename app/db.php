<?php

// server credentials to setup call
$mysqli = new mysqli(server, username, password, dbname);

// database connection condition
if ($mysqli -> connect_errno) {
echo '<h2 style="color:#000 !important;font-family:calibri;text-align:center">Preparing Installation</h2>
<style>body{color:#fff}</style><script>location.replace("'.root.'install")</script>';
echo "Failed to connect to MySQL: " . $mysqli -> connect_error; exit();
} else { }

// main app credentials, can be called by $app->FIELD_NAME
$app = $mysqli->query("SELECT * FROM settings WHERE id = 1")->fetch_object();

// sql query for navigation of pages
$pages = $mysqli->query("SELECT * FROM pages");

// sql query for categories
$categories = $mysqli->query("SELECT * FROM categories WHERE status = 1");