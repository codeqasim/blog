<main>

<?php if ($data->num_rows > 0) { foreach($data as $d) { ?>
<div class="post">
<div class="catnviews">
<p class="tag">
<?php $catetory = $post['category_id'];
echo $mysqli->query("SELECT * FROM categories WHERE id = ".$catetory."")->fetch_object()->title; ?>
</p>
<p class="viewsp">
Page views &nbsp;
<img src="<?=root?>assets/front/img/views.svg" alt="" class="views_svg" />
<strong>&nbsp;<?=$d['hits']?></strong>
</p>
</div>
<h1 class="title"><?=$d['title']?></h1>
<?php include "app/views/front/partcials/author.php"?>

<?php if (getimagesize(root."uploads/posts/".$d['img']) ) {?>
<img src="<?=root?>uploads/posts/<?=$d['img']?>" class="img" alt="<?=$d['title']?>" />
<?php } else { ?>
<img src="<?=root?>assets/admin/img/no_img.png" class="img" alt="no image" />
<?php } ?>

<div class"post_tags">
<?php if (!empty($meta_keywords)){
$array = explode(', ',$meta_keywords);
foreach ( $array as $key ){
echo '<h4 class="tags">'.$key.'</h4>';
} } ?>
</div>

<div class="content" id="target">
<?=$d['content']?>
</div>
</div>
<?php } } else {
$title ="Page not Found";
include "404.php";
} ?>

<section class="post_articles" style="margin:100px 0">
<div class="articles contain">
<div class="row">
<?php include "app/views/front/partcials/post.php"?>
</div>
</div>
</section>

</main>

<script>
// open all links in new tab
var linkList = document.querySelectorAll('#target a');
for(var i in linkList){ linkList[i].setAttribute('target', '_blank'); }
</script>

<style>
html,body{margin:0}header{position:fixed;top:0;height:60px;width:100%;background:#fff;z-index:1}
main{margin-top:70px}
@supports (height:100vh){body{background:linear-gradient(to right top,<?=$app->theme_color?> 50%,#DDD 50%);background-size:100% calc(100% - 100vh + 68px);background-repeat:no-repeat}
body:before{content:'';position:fixed;top:68px;bottom:0;width:100%;z-index:-1;background:#fff}}
main,header{box-sizing:border-box}
</style>

<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-50bcada124277092"></script>