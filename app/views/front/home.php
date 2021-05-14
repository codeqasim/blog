<section class="hero">
<div class="">
<h1>Hero Section</h1>
<p>some params about the blog</p>
</div>
</section>

<section class="contain ptb25 featured">
<a href="<?=root?>post">
<div class="row">
<div class="c8"><img src="<?=root?>assets/front/img/item.jpg" alt="" /></div>
<div class="c4">
<p class="tag">Tag or Category</p>
<h2>How to Install Gitea on Ubuntu 20.04</h2>
<p>Pakistan stands at 4th place in the world for providing freelancing services according to the Online Labor Index published for the year 2017 by Oxford Internet Institute. Since the IT sector in Pakistan is emerging with every passing day, it is estimated that by the end of 2022, Pakistan will</p>

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

<?php foreach($data as $d) { ?>
 <div class="c4 mb25">
 <a href="<?=root?><?=$d['title_slug']?>">
  <img src="https://phptravels.com/blog/<?=$d['image_big']?>" alt="" />
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
 <?php } ?>


 </div>
 </div>
</section>