<h2 class="content_head" style="height:50px"><?=$title?></h2>
<?php echo $xcrud->render(); ?>

<script>
// categories slug
$('.slug').keypress(function( e ) {
    if(!/[0-9a-zA-Z-]/.test(String.fromCharCode(e.which)))
        return false;
});
</script>