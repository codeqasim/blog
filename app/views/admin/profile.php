<form method="post" action="<?=root?>admin/users" enctype="multipart/form-data">
<h2 class="content_head">Profile
<button class="btn k fr c1" type="submit">Save</button>
</h2>
<hr>
<div class="header_panel">User Profile</div>
<div class="panel">
<h2 class="head">Account</h2>
<p class="helper">Only .jpg files are supported</p>
<div class="group mtb20">

<!-- query to get user from db -->
<?php $user = $mysqli->query('SELECT * FROM users WHERE id = "'.$_SESSION['user_id'].'"')->fetch_object(); ?>

<?php
$user_id = $_SESSION['user_id'];
$src = root.'uploads/users/'.$user_id.'.jpg';
if (@getimagesize($src)) { $img = root."uploads/users/".$user_id.".jpg";  } else { $img = root."uploads/users/default.jpg";}; ?>
<div class="row"><div class="c1"><label>Full Name</label></div><div class="c4"><input name="full_name" type="text" placeholder="Full Name" value="<?=$user->full_name?>" /></div></div>
<div class="row"><div class="c1"><label>Email</label></div><div class="c4"><input name="email" type="email" placeholder="email" value="<?=$user->email?>" /></div></div>
<div class="row"><div class="c1"><label>Password</label></div><div class="c4"><input name="password" type="text" placeholder="Password" value="" required /></div></div>

<div class="row"><div class="c1"><label>Image</label></div><div class="c4">
<img id="show" class="logo" src="<?=$img?>" alt="img" />
<input id="img" name="file" type="file" placeholder="profile image" value="<?=$img?>" /></div>
</div>

<script>
img.onchange = evt => {
const [file] = img.files
if (file) { show.src = URL.createObjectURL(file) } }
</script>

</div>
</div>
</form>