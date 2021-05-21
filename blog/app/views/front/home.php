<section class="hero">
<div class="">
<h1><?=$app->app_name;?></h1>
<p><?=$app->description;?></p>
</div>
</section>

<?php if ($featured->num_rows > 0) { foreach($featured as $post) { ?>
<section class="contain ptb25 featured">
<a href="<?=root.$post['slug']?>">
<div class="row">
<div class="c8">
<?php if (getimagesize(root."uploads/posts/".$post['img']) !== false) {?>
<img src="<?=root?>uploads/posts/<?=$post['img']?>" class="img" alt="<?=$post['title']?>" />
<?php } else { ?>
<img src="<?=root?>assets/admin/img/no_img.png" class="img" alt="no image" />
<img src="" alt="" />
<?php } ?>
</div>
<div class="c4">

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

<h2><?=$post['title']?></h2>
<p><?=substr(strip_tags($post['content']), 0, 160)?></p>

<?php include "app/views/front/partcials/author.php"?>

</div>
</div>
</a>
</section>
 <?php } } ?>

<section class="articles">
 <div class="contain">
 <div class="row">
 <?php include "app/views/front/partcials/post.php"?>
 </div>
 </div>
</section>