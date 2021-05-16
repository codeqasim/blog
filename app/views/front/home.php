<section class="hero">
<div class="">
<h1><?=$app->app_name;?></h1>
<p><?=$app->description;?></p>
</div>
</section>

<?php if ($featured->num_rows > 0) { foreach($featured as $f) { ?>
<section class="contain ptb25 featured">
<a href="<?=root?>post">
<div class="row">
<div class="c8"><img src="<?=root?>uploads/posts/<?=$f['img']?>" alt="<?=$f['title']?>" /></div>
<div class="c4">
<p class="tag">
<?php $catetory = $f['category_id'];
echo $mysqli->query("SELECT * FROM categories WHERE id = ".$catetory."")->fetch_object()->title; ?>
</p>
<h2><?=$f['title']?></h2>
<p><?=substr(strip_tags($f['content']), 0, 160)?></p>

<div class="author">
<img src="https://technewspakistan.com/content/images/size/w100/2021/05/22.jpg" alt="" />
<p>Qasim Hussain</p>
<p class="date_time">May 13, 2021 - 1 min read</p>
</div>
</div>
</div>
</a>
</section>
 <?php } } ?>

<section class="articles">
 <div class="contain">
 <div class="row">

<?php

if ($data->num_rows > 0)
{foreach($data as $d) { ?>
 <div class="c4 mb25">
 <div class="card">
 <a href="<?=root?><?=$d['slug']?>">
  <img src="<?=root?>uploads/posts/<?=$d['img']?>" alt="<?=$d['title']?>" />
  <div class="content">
   <p class="tag">
   <?php $catetory = $d['category_id'];
   echo  $mysqli->query("SELECT * FROM categories WHERE id = ".$catetory."")->fetch_object()->title; ?>
   </p>
   <h2><?=$d['title']?></h2>
   <p><?=strip_tags($d['content'])?></p>
    <div class="author">
    <img src="https://technewspakistan.com/content/images/size/w100/2021/05/22.jpg" alt="" />
    <p>Qasim Hussain</p>
    <p class="date_time"><?=$d['created_at']?></p>
    </div>
    </div>
 </a>
 </div>
 </div>
 <?php } } else { echo "No Published Articles Yet!"; } ?>

 </div>
 </div>
</section>