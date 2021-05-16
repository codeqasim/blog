<?php if ($posts->num_rows > 0) { foreach($posts as $post) { ?>
 <div class="c4 mb25">
 <div class="card">
 <a href="<?=root?><?=$post['slug']?>">
  <img src="<?=root?>uploads/posts/<?=$post['img']?>" alt="<?=$post['title']?>" />
  <div class="content">
   <p class="tag">
   <?php $catetory = $post['category_id'];
    echo $mysqli->query("SELECT * FROM categories WHERE id = ".$catetory."")->fetch_object()->title; ?>
   </p>
   <h2><?=$post['title']?></h2>
   <p><?=strip_tags($post['content'])?></p>
   <?php include "author.php"?>
   </div>
 </a>
 </div>
 </div>
<?php } } else { echo "No Published Articles Yet!"; } ?>