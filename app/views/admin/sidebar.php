<aside class="c2 g-0 side_nav">
<div class="brand">
<a href="<?=root?>">
<img src="https://phptravels.com/assets/img/pages/media/icon-primary.png" alt="" />
Admin Panel
</a>
</div>
<ul>
 <li><a href="<?=root.admin?>dashboard" class="<?php if (isset($home_nav)){ echo $home_nav; }?>">Home</a></li>
 <li><a href="<?=root.admin?>posts" class="<?php if (isset($posts_nav)){ echo $posts_nav; }?>">Posts</a></li>
 <li><a href="<?=root.admin?>buttons" class="<?php if (isset($buttons_nav)){ echo $buttons_nav; }?>">Buttons</a></li>
 <li><a href="<?=root.admin?>inputs" class="<?php if (isset($inputs_nav)){ echo $inputs_nav; }?>">Inputs</a></li>
 <li><a href="<?=root.admin?>tables" class="<?php if (isset($tables_nav)){ echo $tables_nav; }?>">Table</a></li>
</ul>
</aside>