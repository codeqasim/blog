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
<div class="c8"><img src="<?=root?>uploads/posts/<?=$post['img']?>" alt="<?=$post['title']?>" /></div>
<div class="c4">
<p class="tag">
<?php $catetory = $post['category_id'];
echo $mysqli->query("SELECT * FROM categories WHERE id = ".$catetory."")->fetch_object()->title; ?>
</p>
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