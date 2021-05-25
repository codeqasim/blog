<?php if ($data->num_rows > 0) { foreach($data as $d) { ?>
<div class="post">
<div class="catnviews">
<p class="tag">
<?php $catetory = $post['category_id'];
echo $mysqli->query("SELECT * FROM categories WHERE id = ".$catetory."")->fetch_object()->title; ?>
</p>
<p class="viewsp">
Page views &nbsp;
<img src="<?=root?>assets/front/img/views.svg" alt="" class="views_svg" />
<strong>&nbsp;<?=$d['hits']?></strong>
</p>
</div>
<h1 class="title"><?=$d['title']?></h1>
<?php include "app/views/front/partcials/author.php"?>

<?php if (!empty(root."uploads/posts/".$d['img']) ) {?>
<img src="<?=root?>uploads/posts/<?=$d['img']?>" class="img" alt="<?=$d['title']?>" />
<?php } else { ?>
<img src="<?=root?>assets/admin/img/no_img.png" class="img" alt="no image" />
<?php } ?>

<div>
<?php if (!empty($meta_keywords)){
$array = explode(', ',$meta_keywords);
foreach ( $array as $key ){
echo '<h4 class="tags">'.$key.'</h4>';
} } ?>
</div>

<div class="content" id="target">
<?=$d['content']?>
</div>
</div>
<?php } } else { include "404.php"; } ?>

<section class="post_articles">
<div class="articles contain">
<div class="row">
<?php include "app/views/front/partcials/post.php"?>
</div>
</div>
</section>

<script>
// open all links in new tab
var linkList = document.querySelectorAll('#target a');
for(var i in linkList){ linkList[i].setAttribute('target', '_blank'); }
</script>

<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-50bcada124277092"></script>

<script>
createYoutubeEmbed = (key) => {
    return '<iframe width="420" height="345" src="https://www.youtube.com/embed/' + key + '" frameborder="0" allowfullscreen></iframe><br/>';
};

transformYoutubeLinks = (text) => {
    if (!text) return text;
    const self = this;

    const linkreg = /(?:)<a([^>]+)>(.+?)<\/a>/g;
    const fullreg = /(https?:\/\/)?(www\.)?(youtube\.com\/watch\?v=|youtu\.be\/)([^& \n<]+)(?:[^ \n<]+)?/g;
    const regex = /(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/watch\?v=|youtu\.be\/)([^& \n<]+)(?:[^ \n<]+)?/g;

    let resultHtml = text;

    // get all the matches for youtube links using the first regex
    const match = text.match(fullreg);
    if (match && match.length > 0) {
        // get all links and put in placeholders
        const matchlinks = text.match(linkreg);
        if (matchlinks && matchlinks.length > 0) {
            for (var i=0; i < matchlinks.length; i++) {
                resultHtml = resultHtml.replace(matchlinks[i], "#placeholder" + i + "#");
            }
        }

        // now go through the matches one by one
        for (var i=0; i < match.length; i++) {
            // get the key out of the match using the second regex
            let matchParts = match[i].split(regex);
            // replace the full match with the embedded youtube code
            resultHtml = resultHtml.replace(match[i], self.createYoutubeEmbed(matchParts[1]));
        }

        // ok now put our links back where the placeholders were.
        if (matchlinks && matchlinks.length > 0) {
            for (var i=0; i < matchlinks.length; i++) {
                resultHtml = resultHtml.replace("#placeholder" + i + "#", matchlinks[i]);
            }
        }
    }
    return resultHtml;
};

const htmlContent = document.getElementById('contentToTransform');
htmlContent.innerHTML = transformYoutubeLinks(htmlContent.innerHTML);
</script>
