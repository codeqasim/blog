<aside class="c2 g-0 side_nav">
<div class="brand">
<a href="<?=root?>">
<img src="<?=root;?>uploads/global/favicon.png" alt="admin" />
Admin Panel <a class="fr" href="<?=root?>" target="_blank"> <strong class="pr5">Web</strong> <i class="mdi mdi-open-in-new"></i></a>
</a>
</div>
<ul>
 <li><a href="<?=root.admin?>dashboard" class="<?php if (isset($home_nav)){ echo $home_nav; }?>">Dashboard</a></li>
 <a href="<?=root.admin?>post/add" class="add_post"><span><svg class="add_post_svg" viewBox="0 0 24 24"><path d="M12 1v22m11-11H1" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round"></path></svg></span></a>
 <li><a href="<?=root.admin?>posts" class="<?php if (isset($posts_nav)){ echo $posts_nav; }?>">Posts </a></li>
 <li><a href="<?=root.admin?>draft" class="<?php if (isset($draft_nav)){ echo $draft_nav; }?>">Draft <span class="fr"><strong><?php $sql = $mysqli->query("SELECT * FROM posts WHERE status = 0"); echo $sql->num_rows ?></strong></span></a></li>
 <?php if ($_SESSION['user_id']==1){ ?>
 <li><a href="<?=root.admin?>categories" class="<?php if (isset($categories_nav)){ echo $categories_nav; }?>">Categories</a></li>
 <li><a href="<?=root.admin?>pages" class="<?php if (isset($pages_nav)){ echo $pages_nav; }?>">Pages</a></li>
 <li><a href="<?=root.admin?>newsletters" class="<?php if (isset($newsletters_nav)){ echo $newsletters_nav; }?>">Newsletters</a></li>
 <li><a href="<?=root.admin?>settings" class="<?php if (isset($settings_nav)){ echo $settings_nav; }?>">Settings</a></li>
 <li><a href="<?=root.admin?>traffic" class="<?php if (isset($traffic_nav)){ echo $traffic_nav; }?>">Traffic</a></li>
 <li><a href="<?=root.admin?>users" class="<?php if (isset($users_nav)){ echo $users_nav; }?>">Users</a></li>
 <?php } ?>
 <li><a href="<?=root.admin?>profile" class="<?php if (isset($profile_nav)){ echo $profile_nav; }?>">Profile</a></li>
 <li><a href="<?=root?>logout">Logout</a></li>
<!-- <li><a href="<?=root.admin?>tables" class="<?php if (isset($tables_nav)){ echo $tables_nav; }?>">Table</a></li>-->
</ul>
</aside>