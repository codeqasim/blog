<!DOCTYPE HTML>
<html lang="en">

<head>
<title><?=$title?> - <?=$app->app_name;?></title>
<link rel="shortcut icon" href="<?=root;?>uploads/global/favicon.png">
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="X-UA-Compatible" content="ie=edge" />
<link rel="stylesheet" href="https://necolas.github.io/normalize.css/latest/normalize.css" />
<link rel="stylesheet" href="<?=root?>assets/front/css/style.css" />
<link rel="preconnect" href="https://fonts.gstatic.com"> <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;500&display=swap" rel="stylesheet">
</head>

<body>

<header>
<nav>
<div class="container-f">
    <ul class="fl">
      <li class="brand"><a href="<?=root?>"> <img src="<?=root;?>uploads/global/logo.png" alt="logo" /></a></li>
      <li><a href="<?=root?>">Home</a></li>
      <?php if ($pages->num_rows > 0) { foreach($pages as $nav) { ?>
      <li><a href="<?=$nav['slug']?>"><?=$nav['title']?></a></li>
      <?php } } ?>
      <?php if ($categories->num_rows > 0) { foreach($categories as $cat) { ?>
      <li><a href="<?=$cat['slug']?>"><?=$cat['title']?></a></li>
      <?php } } ?>
    </ul>

    <ul class="fr">
      <li><a href="#">Login</a></li>
      <li><a href="#">Signup</a></li>
    </ul>
  </div>
</nav>
</header>