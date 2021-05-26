<?php

if (isset($data)) {
if ($data->num_rows > 0) {
foreach($data as $d) {

// get values for edit post
$titles = $d['title'];
$slug = $d['slug'];
$hits = $d['hits'];
$category_id = $d['category_id'];
$img = $d['img'];
$content = $d['content'];
$keywords = $d['keywords'];
$user_id = $d['user_id'];
$date = $d['created_at'];

if (empty($d['status'])){$status=$d['status'];}else{$status="4343";}
}}};

// get endpoint of url
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); $post_id = array_slice(explode('/', rtrim($uri, '/')), -1)[0];
?>

<script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<form autocomplete="off" method="POST" action="<?=root?>admin/post/add" enctype="multipart/form-data">
<h2 class="content_head ttc"><?php if ($post_id == "add"){echo "Add Post";}else {echo "Edit Post"." <span class='f400'>".$titles."</span>";}?> <button class="btn k fr c1" type="submit">Submit</button> </h2>
<hr>

<input type="hidden" name="post_type" value="<?php if ($post_id == "add"){}else {echo "update";}?>" />
<input type="hidden" name="post_id" value="<?=$post_id?>" />

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
<p class="viewsp tag" style="width:150px">
<span>Status</span>
<select class="status" name="status" style="min-width:80px">
    <option value="1">Active</option>
    <option value="0">Draft</option>
</select>
</p>
</div>

<input id="title" type="text" name="title" class="title" placeholder="Post Title" autofocus value="<?php if (isset($titles)){ echo $titles; }?>" />
<p class="slug_link"> <?=root?><input id="display" type="text" name="slug" class="slug" placeholder="Post-slug" autofocus value="<?php if (isset($slug)){ echo $slug; }?>" /></p>

<hr class="slug_hr">

<script>
$('#title').keyup(function () {
title = $(this).val().split(',').slice(0, 1).join(' ').split(' ').join('-').replace('%40', '@').toLowerCase();
document.getElementById("display").value = title;
});
</script>

<div class="catnviews">
<div class="author">
<img src="<?=root?>uploads/users/<?=$_SESSION['user_id']?>.jpg" alt="">
<p><?php $user = $mysqli->query('SELECT * FROM users WHERE id = "'.$_SESSION['user_id'].'"')->fetch_object(); echo $user->full_name ?></p>
<p class="date_time"> <?php if (empty($date)) { $post_date = date("Y-m-d")." ".date("H:i:s"); echo $post_date; } else { echo $date; } ?></p>
</div>
<p class="viewsp">
Page views &nbsp;
<img src="<?=root?>assets/front/img/views.svg" alt="" class="views_svg">
<strong>&nbsp; <?php if (isset($hits)){ echo $hits; }?></strong>
</p>
</div>

<input type="hidden" name="date_time" value="<?php if (empty($date)) { $post_date = date("Y-m-d")." ".date("H:i:s"); echo $post_date; } else { echo $date; } ?>" />

<div class="thumb" style="height:400px">
<?php

if (isset($img)){
if (getimagesize(root."uploads/posts/".$img) ) { ?>
<img id="show" src="<?=root?>uploads/posts/<?=$img?>" class="img" alt="upload">
<?php } } else { ?>
<img id="show" src="<?=root?>assets/admin/img/upload.png" class="img" alt="upload">
<?php } ?>

<input style="display:none" value="<?=root?>uploads/posts/<?=$img?>" name="file" accept="image/*" type='file' id="imgInp" class="center-block" />

<div class="upload">
<div class="file-upload-btn" onclick="document.getElementById('imgInp').click()">
<i class="fa fa-plus-circle"></i> &nbsp; Upload Image
</div>
</div>

</div>

<?php if (!empty($keywords)){ ?>
<select name="keywords[]" class="tags" multiple="multiple">
<?php
$array = explode(', ',$keywords);
foreach ( $array as $key ){ echo '<option selected="selected" value="'.$key.'">'.$key.'</option>'; }
?>
</select>
<?php } else { ?>

<select name="keywords[]" class="tags" multiple="multiple"></select>
<?php } ?>

<script>
// show image to view
imgInp.onchange = evt => {
const [file] = imgInp.files
if (file) { show.src = URL.createObjectURL(file) }
}
</script>

<div class="content">
<textarea name="content" class="editor" cols="30" rows="10" class="">
<?php if (isset($content)){ echo $content; }?>
</textarea>
</div>
</div>

<button class="btn k fr c1" type="submit">Submit</button>
</form>

<script>
// select 2 multi select
$(".tags").select2({
tags: true,
tokenSeparators: [',', ''],
placeholder: "Write tag and press enter",
})

<?php if (isset($category_id)){ ?>
// select category from db
$('.category option[value=<?=$category_id?>]').attr('selected','selected');
<?php } ?>

<?php if (isset($status)){ ?>
// select category from db
$('.status option[value=<?=$status?>]').attr('selected','selected');
<?php } ?>
</script>


<script>
ClassicEditor.create(document.querySelector(".editor"), {
        toolbar: {
            items: [
                "heading",
                "|",
                "bold",
                "italic",
                "link",
                "bulletedList",
                "numberedList",
                "|",
                "indent",
                "outdent",
                "|",
                "imageUpload",
                "blockQuote",
                "mediaEmbed",
                "undo",
                "redo",
            ],
        },
        language: "en",
        image: {
            toolbar: ["imageTextAlternative", "imageStyle:full", "imageStyle:side"],
        },
        licenseKey: "",
    })
        .then((editor) => {
            window.editor = editor;
        })
        .catch((error) => {
            console.error("Oops, something went wrong!");
            console.error(
                "Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:"
            );
            console.warn("Build id: ref2goguw78q-8ghiwfe1qu83");
            console.error(error);
        });
    </script>