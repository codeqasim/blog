<h2 class="content_head" style="height:50px"><?=$title?></h2>
<?php echo $xcrud->render(); ?>

<script>
// categories slug
$('.title').keyup(function () {
title = $(this).val().split(',').slice(0, 1).join(' ').split(' ').join('-').replace('%40', '@').toLowerCase();
document.getElementsByClassName("slug").value = title;
});
</script>