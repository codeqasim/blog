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
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;500&display=swap" rel="stylesheet">

<meta name="description" content="<?=$meta_desc?>">
<meta name="keywords" content="<?=$meta_keywords?>">

<link rel="canonical" href="<?=$meta_url?>" />
<meta name="referrer" content="no-referrer-when-downgrade" />

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
<meta property="article:tag" content="Payoneer" />
<meta property="article:tag" content="accept payments" />
<meta property="article:tag" content="transactions" />
<meta property="article:tag" content="payment gateways" />
<meta property="article:tag" content="make money online" />
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
        "url": "",
        "sameAs": [
            "",
            ""
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
    <ul class="fr social">
      <?php if (!empty($app->whatsapp_url)){?><li><a target="_blank" href="<?=$app->whatsapp_url?>" class="wa"><span>Wa</span></a></li><?php } ?>
      <?php if (!empty($app->facebook_url)){?><li><a target="_blank" href="<?=$app->facebook_url?>" class="fb"><span>Fb</span></a></li><?php } ?>
      <?php if (!empty($app->twitter_url)){?><li><a target="_blank" href="<?=$app->twitter_url?>" class="tw"><span>Tw</span></a></li><?php } ?>
      <?php if (!empty($app->linkedin_url)){?><li><a target="_blank" href="<?=$app->linkedin_url?>" class="li"><span>Li</span></a></li><?php } ?>
      <?php if (!empty($app->instagram_url)){?><li><a target="_blank" href="<?=$app->instagram_url?>" class="ig"><span>Ig</span></a></li><?php } ?>
      <?php if (!empty($app->pinterest_url)){?><li><a target="_blank" href="<?=$app->pinterest_url?>" class="pr"><span>Pr</span></a></li><?php } ?>
    </ul>
  </div>
</nav>
</header>