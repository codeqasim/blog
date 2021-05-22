<!DOCTYPE HTML>
<html lang="en">

<head>
<title><?=$title?></title>
<link rel="shortcut icon" href="<?=root;?>uploads/global/favicon.png">
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="X-UA-Compatible" content="ie=edge" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://necolas.github.io/normalize.css/latest/normalize.css" />
<link rel="stylesheet" href="<?=root?>assets/admin/css/style.css" />
<style> :root { --theme_color: <?=$app->theme_color?>; } </style>
</head>

<body>
<div class="c12">
<div class="row">
<?php include "sidebar.php"; ?>
<div class="c10 side_content">