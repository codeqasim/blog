<div class="post">
<?php if ($data->num_rows > 0) { foreach($data as $d) { ?>

<p class="tag">Category name goes here</p>
<h1 class="title"><?=$d['title']?></h1>
<?php include "app/views/front/partcials/author.php"?>
<img src="<?=root?>uploads/posts/<?=$d['img']?>" class="img" alt="<?=$d['title']?>" />

<div class="content">
<?=$d['content']?>
</div>

<?php } } else { include "404.php"; } ?>
</div>

<section class="post_articles">
<div class="articles contain">
<div class="row">
<?php include "app/views/front/partcials/post.php"?>
</div>
</div>
</section>