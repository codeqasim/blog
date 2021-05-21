<aside class="c2 g-0 side_nav">
<div class="brand">
<a href="<?=root?>">
<img src="<?=root;?>uploads/global/favicon.png" alt="admin" />
Admin Panel <a class="fr" href="<?=root?>" target="_blank"> <strong class="pr5">Web</strong> <i class="mdi mdi-open-in-new"></i></a>
</a>
</div>
<ul>
 <li><a href="<?=root.admin?>dashboard" class="<?php if (isset($home_nav)){ echo $home_nav; }?>">Home</a></li>
 <li><a href="<?=root.admin?>posts" class="<?php if (isset($posts_nav)){ echo $posts_nav; }?>">Posts</a></li>
 <li><a href="<?=root.admin?>pages" class="<?php if (isset($pages_nav)){ echo $pages_nav; }?>">Pages</a></li>
 <li><a href="<?=root.admin?>newsletters" class="<?php if (isset($newsletters_nav)){ echo $newsletters_nav; }?>">Newsletters</a></li>
 <li><a href="<?=root.admin?>settings" class="<?php if (isset($settings_nav)){ echo $settings_nav; }?>">Settings</a></li>
 <li><a href="<?=root?>logout">Logout</a></li>
<!-- <li><a href="<?=root.admin?>tables" class="<?php if (isset($tables_nav)){ echo $tables_nav; }?>">Table</a></li>-->
</ul>
</aside>