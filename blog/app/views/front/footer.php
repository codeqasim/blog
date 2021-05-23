<p style="display: flex; justify-content: center; margin-bottom: -34px; position: absolute; width: 100%; text-align: center;">Powered by &nbsp;<a target="_blank" href="http://phpblogscript.com"> <strong> PHP Blog Script</strong></a></p>

<footer>
<?=$app->footer_code?>
<div class="contain">

<ul class="fr social">
<?php if (!empty($app->whatsapp_url)){?><li><a target="_blank" href="<?=$app->whatsapp_url?>" class="wa"><img src="<?=root?>assets/front/fonts/whatsapp.svg" alt="whatsapp" /></a></li><?php } ?>
<?php if (!empty($app->facebook_url)){?><li><a target="_blank" href="<?=$app->facebook_url?>" class="fb"><img src="<?=root?>assets/front/fonts/facebook.svg" alt="facebook" /></a></li><?php } ?>
<?php if (!empty($app->twitter_url)){?><li><a target="_blank" href="<?=$app->twitter_url?>" class="tw"><img src="<?=root?>assets/front/fonts/twitter.svg" alt="twitter" /></a></li><?php } ?>
<?php if (!empty($app->linkedin_url)){?><li><a target="_blank" href="<?=$app->linkedin_url?>" class="li"><img src="<?=root?>assets/front/fonts/linkedin.svg" alt="linkedin" /></a></li><?php } ?>
<?php if (!empty($app->instagram_url)){?><li><a target="_blank" href="<?=$app->instagram_url?>" class="ig"><img src="<?=root?>assets/front/fonts/instagram.svg" alt="instagram" /></a></li><?php } ?>
<?php if (!empty($app->pinterest_url)){?><li><a target="_blank" href="<?=$app->pinterest_url?>" class="pr"><img src="<?=root?>assets/front/fonts/pinterest.svg" alt="pinterest" /></a></li><?php } ?>
</ul>

<form action="<?=root?>newsletters" method="post">
<div class="row newsletter">
<div class="c3">
<h2>Newsletter</h2>
<p>Subscribe to stay tune</p>
</div>
<div class="c2">
<input type="text" name="name" placeholder="Your name" required/>
</div>
<div class="c3">
<input type="email" name="email" placeholder="Your email address" required/>
</div>
<div class="c2">
<button type="submit" class="btn b">Submit</button>
</div>
</div>
</form>

<div class="row foot">
 <div class="c6"><a href="<?=root?>" class="brand"> <?=$app->app_name?></a></div>
 <div class="c6 fr">
  <ul>
   <li><a href="<?=root?>">Home</a></li>
   <?php if ($pages->num_rows > 0) { foreach($pages as $nav) { ?>
   <li><a href="<?=$nav['slug']?>"><?=$nav['title']?></a></li>
   <?php } } ?>
   <li><a href="<?=root?>sitemap.xml" target="_blank">Sitemap</a></li>
  </ul>
 </div>
</div>
</div>
</footer>