<?php if ($posts->num_rows > 0) { foreach($posts as $post) { ?>
 <div class="c4 mb25">
 <div class="card">
 <a href="<?=root?><?=$post['slug']?>">

<?php

if (!empty(root."uploads/posts/".$post['img'])) {?>
<img src="<?=root?>uploads/posts/<?=$post['img']?>" class="img" alt="<?=$post['title']?>" />
<?php } else { ?>
<img src="<?=root?>assets/admin/img/no_img.png" class="img" alt="no image" />
<?php } ?>

 <div class="content">
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
   <p><?=strip_tags($post['content'])?></p>
   <?php include "author.php"?>
   </div>
 </a>
 </div>
 </div>
<?php } } else { echo "No Published Articles Yet!"; } ?>