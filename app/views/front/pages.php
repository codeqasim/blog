<?php
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$url_end = array_slice(explode('/', rtrim($uri, '/')), -1)[0];
$pages = $mysqli->query("SELECT * FROM `pages` WHERE `slug` LIKE '".$url_end."'"); ?>

<?php if ($pages->num_rows > 0) { foreach($pages as $page) { ?>
<section class="pages">
<div class="contain">
 <div class="panel mt25 mb25">
  <div class="panel-heading"><?=$page['title']?></div>
  <div class="panel-body">
    <?=$page['content']?>
  </div>
 </div>
</div>
</section>
<?php } } else { include "404.php"; } ?>
