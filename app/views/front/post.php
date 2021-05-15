<?php if ($data->num_rows > 0) {
foreach($data as $d) { ?>

<div class="post">
<p class="tag">Category name goes here</p>
<h1 class="title"><?=$d['title']?></h1>

<div class="author">
<img src="https://technewspakistan.com/content/images/size/w100/2021/05/22.jpg" alt="" />
<p>Qasim Hussain</p>
<p class="date_time"><?=$d['created_at']?></p>
</div>

<img src="<?=root?>uploads/posts/<?=$d['img']?>" class="img" alt="<?=$d['title']?>" />

<div class="content">
<?=$d['content']?>
</div>

</div>

<?php } } else { echo "No Founds Found"; } ?>