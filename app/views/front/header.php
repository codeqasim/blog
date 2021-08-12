<!DOCTYPE HTML>
<html lang="en">

<head>
<title><?php if (isset($title)){echo $title;}?> - <?=$app->app_name;?></title>
<style> :root { --theme_color:<?=$app->theme_color?>; }</style>
<meta name="theme-color" content="<?=$app->theme_color?>" />
<link rel="shortcut icon" href="<?=root;?>uploads/global/favicon.png">
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="X-UA-Compatible" content="ie=edge" />
<!--<link rel="stylesheet" href="https://necolas.github.io/normalize.css/latest/normalize.css" />-->
<link rel="stylesheet" href="<?=root?>assets/front/css/style.css" />
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;500&display=swap" rel="stylesheet">

<meta name="description" content="<?=$meta_desc?>">
<meta name="keywords" content="<?=$meta_keywords?>">

<link rel="canonical" href="<?=$meta_url?>" />
<meta name="referrer" content="no-referrer-when-downgrade" />
<?php if (isset($amphome) == 1){?><link rel="amphtml" href="<?=$amp_url;?>" /><?php } ?>

<!-- meta open graph -->
<meta property="og:site_name" content="<?=$app->app_name?>" />
<meta property="og:type" content="article" />
<meta property="og:title" content="<?=$meta_title?>" />
<meta property="og:description" content="<?=$meta_desc?>" />
<meta property="og:url" content="<?=$meta_url?>" />
<meta property="og:image" content="<?=$meta_img?>" />

<!-- meta article -->
<meta property="article:published_time" content="<?=$meta_time?>" />
<meta property="article:modified_time" content="<?=$meta_time?>" />
<?php if (!empty($meta_keywords)){
$array = explode(', ',$meta_keywords);
foreach ( $array as $key ){
echo '<meta property="article:tag" content="'.$key.'" />';
} } ?>
<meta property="article:publisher" content="<?=$app->facebook_url;?>" />
<meta property="article:author" content="<?=root?>" />

<!-- meta twitter media card -->
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="<?=$meta_title?>" />
<meta name="twitter:description" content="<?=$meta_desc?>" />
<meta name="twitter:url" content="<?=$meta_url?>" />
<meta name="twitter:image" content="<?=$meta_img?>" />
<meta name="twitter:label1" content="Written by" />
<meta name="twitter:data1" content="<?=$meta_writer?>" />
<meta name="twitter:label2" content="Filed under" />
<meta name="twitter:data2" content="<?=$meta_keywords?>" />
<meta name="twitter:site" content="@phpblogscript" />
<meta property="og:image:width" content="1640" />
<meta property="og:image:height" content="924" />
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Article",
    "publisher": {
        "@type": "Organization",
        "name": "<?=$app->app_name?>",
        "url": "<?=root?>",
        "logo": {
            "@type": "ImageObject",
            "url": "<?=root?>uploads/global/favicon.png",
            "width": 60,
            "height": 60
        }
    },
    "author": {
        "@type": "Person",
        "name": "",
        "image": {
            "@type": "ImageObject",
            "url": "<?=$meta_img?>",
            "width": 708,
            "height": 888
        },
        "url": "https://phpblogscript.com",
        "sameAs": [
            "PHP Blog Script"
        ]
    },
    "headline": "<?=$meta_title?>",
    "url": "<?=$meta_url?>",
    "datePublished": "<?=$meta_time?>",
    "dateModified": "<?=$meta_time?>",
    "image": {
        "@type": "ImageObject",
        "url": "<?=$meta_img?>",
        "width": 1640,
        "height": 924
    },
    "keywords": "<?=$meta_keywords?>",
    "description": "<?=$meta_desc?>",
    "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "<?=root?>"
    }
}
</script>

<script>
// ger users country
var requestUrl = "https://ipwhois.app/json/";
fetch(requestUrl)
.then(function(response) { return response.json(); })
.then(function(c) { var user_country = c['country']; console.log(user_country);

// submit to db
var req = '<?=root?>traffic?country=' + user_country; fetch(req) });
</script>
<?=$app->header_code?>
</head>
<body>

<header>
<nav>
<div class="contain">
    <ul class="fl">
      <li class="brand"><a href="<?=root?>"><img src="<?=root;?>uploads/global/logo.png" alt="logo" /></a></li>
      <li class="x-hide"><a href="<?=root?>">Home</a></li>
      <?php if ($pages->num_rows > 0) { foreach($pages as $nav) { ?>
      <li class="x-hide"><a href="<?=root?><?=$nav['slug']?>"><?=$nav['title']?></a></li>
      <?php } } ?>
    </ul>
    <div tabindex="0" class="menu">
    <ul class="menu-content">
      <?php if ($categories->num_rows > 0) { foreach($categories as $cat) { ?>
      <li><a href="<?=root?><?=$cat['slug']?>"><?=$cat['title']?></a></li>
      <?php } } ?>
    </ul>
    </div>
    <ul class="fr">
    <li><a href="<?=root?>admin">Login</a></li>
    </ul>
  </div>
</nav>
</header>