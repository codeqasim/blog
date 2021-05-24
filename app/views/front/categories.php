<section class="hero">
<h1><?=$url_end?></h1>
<p>Find below all artciles for above category</p>
</section>

<?php
$cat = $mysqli->query("SELECT * FROM `categories` WHERE `slug` LIKE '".$url_end."'");
foreach ($cat as $c ){ $cat_id = $c['id']; }
$posts = $mysqli->query("SELECT * FROM posts WHERE status = 1 AND category_id LIKE '".$cat_id."' ORDER BY id DESC LIMIT 100");
?>

<div class="categories">
<div class="contain mt25">
<div class="row">
<div class="c12">
<div class="row cat_post">

<?php foreach ($posts as $post) { ?>
<div class="c4 mb15">
<a href="<?=root?><?=$post['slug'];?>">
<?php if (getimagesize(root."uploads/posts/".$post['img']) !== false) {?>
<img src="<?=root?>uploads/posts/<?=$post['img']?>" class="img" alt="<?=$post['title']?>" />
<?php } else { ?>
<img src="<?=root?>assets/admin/img/no_img.png" class="img" alt="no image" />
<?php } ?>
</a>
</div>
<div class="c8">
<div class="articles">
<?php include "app/views/front/partcials/author.php"?>
</div>
<a href="<?=root?><?=$post['slug'];?>">
<h2 class="mt60"><?=$post['title'];?></h2>
</a>
<p><?=substr(strip_tags($post['content']), 0, 260)?></p>

 <div class="catnviews mt15">
<p class="tag">
<?php $catetory = $post['category_id'];
echo $mysqli->query("SELECT * FROM categories WHERE id = ".$catetory."")->fetch_object()->title; ?>
&nbsp;
</p>
<span class="viewsp">
<img src="<?=root?>assets/front/img/views.svg" alt="<?=$post['title']?>" class="views_svg" />
<strong>&nbsp;<?=$post['hits']?></strong>
</span>
</div>

</div>
<?php } ?>

</div>
</div>
</div>
</div>
</div>