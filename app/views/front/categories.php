<section class="hero">
<h1><?=$url_end?></h1>
<p>Find below all artciles for above category</p>
</section>

<?php
$cat = $mysqli->query("SELECT * FROM `categories` WHERE `slug` LIKE '".$url_end."'");
foreach ($cat as $c ){ $cat_id = $c['id']; }
$posts = $mysqli->query("SELECT * FROM posts WHERE `category_id` LIKE '".$cat_id."' ORDER BY id DESC LIMIT 100");
?>

<div class="categories">
<div class="contain mt25">
<div class="row">
<div class="c12">
<div class="row cat_post">

<?php foreach ($posts as $post) { ?>
<div class="c4 mb15">
<a href="<?=root?><?=$post['slug'];?>">
<img class="img" src="<?=root."uploads/posts/".$post['img'];?>" alt="<?=$post['title'];?>" />
</a>
</div>
<div class="c8">
<div class="articles">
<?php include "app/views/front/partcials/author.php"?>
</div>
<h2 class="mt60"><?=$post['title'];?></h2>
<p><?=substr(strip_tags($post['content']), 0, 260)?></p>
</div>
<?php } ?>



</div>
</div>
</div>
</div>
</div>