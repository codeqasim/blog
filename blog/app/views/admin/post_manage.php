<?php

if (isset($data)) {
if ($data->num_rows > 0) {
foreach($data as $d) {

$title = $d['title'];
$slug = $d['slug'];
$hits = $d['hits'];
$category_id = $d['category_id'];
$img = $d['img'];
$content = $d['content'];
$keywords = $d['keywords'];
$status = $d['status'];
$user_id = $d['user_id'];

}}};

?>

<script src="//cdn.jsdelivr.net/npm/medium-editor@latest/dist/js/medium-editor.min.js"></script>
<link rel="stylesheet" href="<?=root?>assets/admin/css/medium-editor.css" />
<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<form autocomplete="off" method="POST" action="<?=root?>admin/post/add" enctype="multipart/form-data">
<h2 class="content_head">Add Post <button class="btn k fr c1" type="submit">Submit</button> </h2>
<hr>

<div class="post">
<div class="catnviews">
<p class="tag">
<span>Category </span>
<select class="category" name="category_id" id="" require>
 <!--<option>Select category</option>-->
<?php if ($categories->num_rows > 0) { foreach($categories as $cat) { ?>
 <option value="<?=$cat['id']?>"><?=$cat['title']?></option>
<?php } } ?>
</select>
</p>
<p class="viewsp">
Page views &nbsp;
<img src="http://localhost/blog/blog/assets/front/img/views.svg" alt="" class="views_svg">
<strong>&nbsp; <?php if (isset($hits)){ echo $hits; }?></strong>
</p>
</div>

<input id="title" type="text" name="title" class="title" placeholder="Post Title" autofocus value="<?php if (isset($title)){ echo $title; }?>" />
<p class="slug_link"> <?=root?><input id="display" type="text" name="slug" class="slug" placeholder="Post-slug" autofocus value="<?php if (isset($slug)){ echo $slug; }?>" /></p>

<hr class="slug_hr">

<script>
$('#title').keyup(function () {
title = $(this).val().split(',').slice(0, 1).join(' ').split(' ').join('-').replace('%40', '@');
document.getElementById("display").value = title;
});
</script>

<div class="author">
<img src="https://technewspakistan.com/content/images/size/w100/2021/05/22.jpg" alt="">
<p>Qasim Hussain</p>
<p class="date_time">2021-04-27 09:44:51</p>
</div>

<div class="img-gradient">
<?php if (isset($img)){ ?>
<img id="show" src="<?=root?>uploads/posts/<?=$img?>" class="img" alt="upload">
<input name="file" type='file' value="<?=root?>uploads/posts/<?=$img?>" id="imgInp" class="center-block" />
<?php } else { ?>
<img id="show" src="<?=root?>assets/admin/img/upload.png" class="img" alt="upload">
<input name="file" accept="image/*" type='file' id="imgInp" class="center-block" />
<?php } ?>

</div>

<?php if (!empty($keywords)){ ?>
<select name="keywords[]" class="form-control tags" multiple="multiple">
<?php
$array = explode(', ',$keywords);
print_r($array);
foreach ( $array as $key ){ echo '<option selected="selected" value="'.$key.'">'.$key.'</option>'; }
?>
</select>
<?php } ?>

<script>
// show image to view
imgInp.onchange = evt => {
const [file] = imgInp.files
if (file) { show.src = URL.createObjectURL(file) }
}

//$(function()
// { $('input[type=file]').on('change',function () { var filePath = $(this).val(); console.log(filePath); }); });
</script>

<div class="content">
<textarea name="content" id="" cols="30" rows="10" class="editable">
<?php if (isset($content)){ echo $content; }?>
</textarea>

</div>
</div>

<button class="btn k fl c1" type="submit">Submit</button>
</form>

<script>
var editor = new MediumEditor('.editable', {
    /* These are the default options for the editor, if nothing is passed this is what is used */
    activeButtonClass: 'medium-editor-button-active',
    allowMultiParagraphSelection: true,
    buttonLabels: false,
    contentWindow: window,
    delay: 0,
    disableReturn: false,
    disableDoubleReturn: false,
    disableExtraSpaces: false,
    disableEditing: false,
    elementsContainer: false,
    extensions: {},
    ownerDocument: document,
    spellcheck: true,
    targetBlank: true
});

// select 2 multi select
$(".tags").select2({
    tags: true,
    tokenSeparators: [',', ' '],
    placeholder: "Type tags and press enter for each",
})
</script>

<script>
$('.category option[value=<?=$category_id?>]').attr('selected','selected');
</script>