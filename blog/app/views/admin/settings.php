<form method="post" action="<?=root?>admin/settings" enctype="multipart/form-data">
<h2 class="content_head">Settings
<button class="btn k fr c1" type="submit">Save</button>
</h2>
<hr>

<div class="header_panel">General settings</div>

<div class="panel">
<h2 class="head">Configurations</h2>
<p class="helper">Blog main credentials</p>

<div class="group mtb20">
<div class="row"><div class="c1"><label>Logo</label></div><div class="c4">
<img id="show" class="logo" src="<?=root?>uploads/global/logo.png" alt="logo" />
<input id="logo" name="logo" type="file" placeholder="logo" value="" /></div></div>

<script>
logo.onchange = evt => {
const [file] = logo.files
if (file) { show.src = URL.createObjectURL(file) }
}
</script>

<div class="row"><div class="c1"><label>Favicon</label></div><div class="c4">
<img id="shows" class="favicon" src="<?=root?>uploads/global/favicon.png" alt="favicon" />
<input id="fav" name="favicon" type="file" placeholder="favicon" value="" /></div></div>

<script>
fav.onchange = evt => {
const [file] = fav.files
if (file) { shows.src = URL.createObjectURL(file) }
}
</script>

<div class="row"><div class="c1"><label>Domain</label></div><div class="c4"><input name="site_url" type="text" placeholder="Domain" value="<?=$app->site_url?>" /></div></div>
<div class="row"><div class="c1"><label>Blog Name</label></div><div class="c4"><input name="app_name" type="text" placeholder="Blog name" value="<?=$app->app_name?>" /></div></div>
<div class="row"><div class="c1"><label>Home Title</label></div><div class="c4"><input name="home_title" type="text" placeholder="Home title" value="<?=$app->home_title?>" /></div></div>
<div class="row"><div class="c1"><label>Description</label></div><div class="c11"><input name="description" type="text" placeholder="Description" value="<?=$app->description?>" /></div></div>
<div class="row"><div class="c1"><label>Keywords</label></div><div class="c11"><input name="keywords" type="text" placeholder="keywords" value="<?=$app->keywords?>" /></div></div>
<div class="row"><div class="c1"><label>Theme Color</label></div><div class="c4"><input name="theme_color" type="color" placeholder="Theme color" value="<?=$app->theme_color?>" /></div></div>

<!--<input type="text" placeholder="" value="With Value" />
<div class="input">
<i class="far fa-question-circle"></i>
<input type="text" placeholder="" value="With Icon" />
</div>
</div>-->

</div>
</div>

<div class="panel">
<h2 class="head">Social Links</h2>
<p class="helper">Social media links</p>

<div class="group">

<div class="row"><div class="c1"><label>Whatsapp</label></div><div class="c4"><div class="input"><i class="fab fa-whatsapp"></i><input name="whatsapp_url" type="text" placeholder="Facebook link" value="<?=$app->whatsapp_url?>" /></div></div></div>
<div class="row"><div class="c1"><label>Facebook</label></div><div class="c4"><div class="input"><i class="icon-facebook"></i><input name="facebook_url" type="text" placeholder="Facebook link" value="<?=$app->facebook_url?>" /></div></div></div>
<div class="row"><div class="c1"><label>Twitter</label></div><div class="c4"><div class="input"><i class="fab fa-twitter"></i><input name="twitter_url" type="text" placeholder="Twitter link" value="<?=$app->twitter_url?>" /></div></div></div>
<div class="row"><div class="c1"><label>Instagram</label></div><div class="c4"><div class="input"><i class="fab fa-instagram"></i><input name="instagram_url" type="text" placeholder="Instagram link" value="<?=$app->instagram_url?>" /></div></div></div>
<div class="row"><div class="c1"><label>LinkedIn</label></div><div class="c4"><div class="input"><i class="fab fa-linkedin"></i><input name="linkedin_url" type="text" placeholder="LinkedIn link" value="<?=$app->linkedin_url?>" /></div></div></div>
<div class="row"><div class="c1"><label>Pinterest</label></div><div class="c4"><div class="input"><i class="fab fa-pinterest"></i><input name="pinterest_url" type="text" placeholder="Pinterest link" value="<?=$app->pinterest_url?>" /></div></div></div>

<!--<select name="" id="">
    <option>Select</option>
    <option>Value 1</option>
    <option>Value 2</option>
    <option>Value 3</option>
</select>

<div class="select">
<i class="far fa-question-circle"></i>
<select name="" id="">
    <option>Select with icon</option>
    <option>Value 1</option>
    <option>Value 2</option>
    <option>Value 3</option>
</select>
</div>-->

</div>
</div>

<!--<div class="panel">
<h2 class="head">Input select</h2>
<p class="helper">Choose your browser from the list</p>

<div class="group">
<input list="browsers" name="" placeholder="Type firefox">

<datalist id="browsers">
    <option value="Edge">
    <option value="Firefox">
    <option value="Chrome">
    <option value="Opera">
    <option value="Safari">
</datalist>

<div class="input">
<i class="far fa-question-circle"></i>
<input list="browsers_" name="" placeholder"Input with icon">

<datalist id="browsers_">
    <option value="Edge">
    <option value="Firefox">
    <option value="Chrome">
    <option value="Opera">
    <option value="Safari">
</datalist>
</div>

</div>
</div>-->
</form>