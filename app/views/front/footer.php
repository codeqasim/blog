<p style="display: flex; justify-content: center; margin-bottom: -34px; position: absolute; width: 100%; text-align: center;">Powered by &nbsp;<a target="_blank" href="http://phpblogscript.com"> <strong> PHP Blog Script</strong></a></p>

<footer>
<div class="contain">

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
   <li><a href="<?=root?>about">About</a></li>
   <li><a href="<?=root?>contact">Contact</a></li>
   <li><a href="<?=root?>policy">Policy</a></li>
   <li><a href="<?=root?>sitemap.xml" target="_blank">Sitemap</a></li>
  </ul>
 </div>
</div>
</div>
</footer>