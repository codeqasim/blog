<h2 class="content_head">Dashboard
</h2>
<hr>
<div class="mtb20">
<div class="row">
<div class="c3"><a href="<?=root?>admin/posts" class="btn b l w100"> POSTS <strong class="fs18"><?php $sql = $mysqli->query("SELECT * FROM posts"); echo $sql->num_rows ?></strong> </a></div>
<div class="c3"><a href="<?=root?>admin/categories" class="btn g l w100"> CATEGORIES <strong class="fs18"><?php $sql = $mysqli->query("SELECT * FROM categories"); echo $sql->num_rows ?></strong></a></div>
<div class="c3"><a href="<?=root?>admin/pages" class="btn r l w100"> PAGES <strong class="fs18"><?php $sql = $mysqli->query("SELECT * FROM pages"); echo $sql->num_rows ?></strong></a></div>
<div class="c3"><a href="<?=root?>admin/users" class="btn y l w100"> USERS <strong class="fs18"><?php $sql = $mysqli->query("SELECT * FROM users"); echo $sql->num_rows ?></strong></a></div>
</div>
</div>

<div class="mtb20">
<div class="row">
<div class="c6">

<div class="panel mt20 top_10">
<div class="panel-heading"><strong><h2>Top 10 Traffic Visits</h2></strong></div>
<div class="panel-body">
<div  class="mt20">
<?php $data = $mysqli->query("SELECT * FROM traffic ORDER BY visits DESC LIMIT 10"); if ($data->num_rows > 0) { foreach($data as $d) {
$country = substr(strip_tags($d['country']), 0, 50);
if(empty($d['visits'])){}else{
?>
<h4><?=$country?> <span class="fr fw400"> Visits <strong><?=$d['visits']?></strong></span></h4>
<?php } } } ?>
</div>
</div>
</div>

</div>
<div class="c6">
<div class="p-10">
<div class="panel mt20 top_10">
<div class="panel-heading"><strong><h2>Top 10 Most Visited</h2></strong></div>
<div class="panel-body">
<div  class="mt20">
<?php $data = $mysqli->query("SELECT * FROM posts ORDER BY hits DESC LIMIT 10"); if ($data->num_rows > 0) { foreach($data as $d) { ?>
<h4><a href="<?=root?><?=$d['slug']?>" target="_blank"><?=substr(strip_tags($d['title']), 0, 50)?></a> <span class="fr fw400"> Views <strong><?=$d['hits']?></strong></span></h4>
<?php } } ?>
</div>
</div>
</div>
</div>
</div>
</div>
</div>