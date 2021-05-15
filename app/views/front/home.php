<section class="hero">
<div class="">
<h1><?=$app->app_name;?></h1>
<p><?=$app->description;?></p>
</div>
</section>

<section class="contain ptb25 featured">
<a href="<?=root?>post">
<div class="row">
<div class="c8"><img src="<?=root?>uploads/posts/news.jpg" alt="" /></div>
<div class="c4">
<p class="tag">Version Release</p>
<h2>PHP Blog Script Lauched Production v1.0</h2>
<p>PHP blog script helping you to build your blog super fast within 5 minutes of installation and configuration. SEO optimized with backend admin panel and much more to explore.</p>

<div class="author">
<img src="https://technewspakistan.com/content/images/size/w100/2021/05/22.jpg" alt="" />
<p>Qasim Hussain</p>
<p class="date_time">May 13, 2021 - 1 min read</p>
</div>
</div>
</div>
</a>
</section>

<section class="articles">
 <div class="contain">
 <div class="row">

<?php if ($data->num_rows > 0) { foreach($data as $d) { ?>
 <div class="c4 mb25">
 <a href="<?=root?><?=$d['slug']?>">
  <img src="<?=root?>uploads/posts/<?=$d['img']?>" alt="<?=$d['title']?>" />
   <p class="tag"><?=$d['id']?></p>
   <h2><?=$d['title']?></h2>
   <p><?=strip_tags($d['content'])?></p>
    <div class="author">
    <img src="https://technewspakistan.com/content/images/size/w100/2021/05/22.jpg" alt="" />
    <p>Qasim Hussain</p>
    <p class="date_time"><?=$d['created_at']?></p>
    </div>
 </a>
 </div>
 <?php } } else { echo 0; } ?>

 </div>
 </div>
</section>