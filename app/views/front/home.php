<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<section class="hero">
<div class="">
<h1><?=$app->app_name;?></h1>
<p><?=$app->description;?></p>

<div class="row">
<div class="c4"></div>
<div class="c4">
<select class="select" ></select>
</div>
<div class="c4"></div>
</div>

</div>
</section>

<style>
.select2-container{width:100% !important}
.select2-dropdown{top:-45px}
.select2-container--default .select2-selection--single .select2-selection__arrow { height: 46px; position: absolute; top: 1px; right: 12px; width: 20px; }
.select2-container--default .select2-selection--single .select2-selection__placeholder { color: #000; }
.select2-container--default .select2-selection--single .select2-selection__rendered { color: #000; line-height: 28px; height: 50px; display: flex; justify-content: center; align-items: center; font-weight: bold; text-transform: uppercase; }
.select2-container--default .select2-selection--single { height:50px; }
.select2-result-repository{padding-top:4px;padding-bottom:3px}
.select2-result-repository__avatar{float:left;width:60px;margin-right:10px}
.select2-result-repository__avatar img{width:100%;height:auto;border-radius:2px}
.select2-result-repository__meta{margin-left:70px}
.select2-result-repository__title{color:black;font-weight:700;word-wrap:break-word;line-height:1.1;margin-bottom:4px}
.select2-result-repository__forks,.select2-result-repository__stargazers{margin-right:1em}
.select2-result-repository__forks,.select2-result-repository__stargazers,.select2-result-repository__watchers{display:inline-block;color:#aaa;font-size:11px}
.select2-result-repository__description{font-size:13px;color:#777;margin-top:4px}
.select2-results__option--highlighted .select2-result-repository__title{color:white}
.select2-results__option--highlighted .select2-result-repository__forks,.select2-results__option--highlighted .select2-result-repository__stargazers,.select2-results__option--highlighted .select2-result-repository__description,.select2-results__option--highlighted .select2-result-repository__watchers{color:#c6dcef}
.select2-results__option{padding:6px;user-select:none;-webkit-user-select:none}
.select2-results__option--selectable{cursor:pointer}
.select2-container--default .select2-results__option--highlighted.select2-results__option--selectable{background-color:#5897fb;color:white}
</style>

<script type="text/javascript">

$(document).on('select2:open', () => {
 document.querySelector('.select2-search__field').focus();
});

$(".select").select2({
  ajax: {
    // url: "https://api.github.com/search/repositories",
    url: "<?=root?>search",
    dataType: 'json',
    delay: 250,
    data: function (params) {
      return {
        q: params.term, // search term
        page: params.page
      };
    },
    processResults: function (data, params) {
      // parse the results into the format expected by Select2
      // since we are using custom formatting functions we do not need to
      // alter the remote JSON data, except to indicate that infinite
      // scrolling can be used
      params.page = params.page || 1;

      console.log(data)

      return {
        results: data,
        pagination: {
          more: (params.page * 30) < data.total_count
        }
      };
    },
    cache: true
  },
  placeholder: 'Search by Name',
  minimumInputLength: 3,
  templateResult: formatRepo,
  templateSelection: formatRepoSelection,

});

function formatRepo (repo) {
  if (repo.loading) {
    return repo.text;
  }

  var $container = $(
    "<div class='select2-result-repository clearfix'>" +
      "<div class='select2-result-repository__avatar'><img src='" + repo.img + "' /></div>" +
      "<div class='select2-result-repository__meta'>" +
        "<div class='select2-result-repository__title'></div>" +
        "<div class='select2-result-repository__description'></div>" +
        "<div class='select2-result-repository__statistics'>" +
          "<div class='select2-result-repository__forks'><i class='fa fa-flash'></i> </div>" +
          "<div class='select2-result-repository__stargazers'><i class='fa fa-star'></i> </div>" +
          "<div class='select2-result-repository__watchers'><i class='fa fa-eye'></i> </div>" +
        "</div>" +
      "</div>" +
    "</div>"
  );

  $container.find(".select2-result-repository__title").text(repo.title);
  $container.find(".select2-result-repository__description").text(repo.desc);
  $container.find(".select2-result-repository__forks").append(repo.hits + " Views");
  $container.find(".select2-result-repository__stargazers").append(repo.date + " Date");
  // $container.find(".select2-result-repository__watchers").append(repo.watchers_count + " Watchers");

  return $container;
}

function formatRepoSelection (repo) {
  return repo.full_name || repo.text;
}
</script>

<?php if ($featured->num_rows > 0) { foreach($featured as $post) { ?>
<section class="contain ptb25 featured">
<a href="<?=root.$post['slug']?>">
<div class="row">
<div class="c8">
<?php if (!empty(root."uploads/posts/".$post['img']) !== false) {?>
<img src="<?=root?>uploads/posts/<?=$post['img']?>" class="img" alt="<?=$post['title']?>" />
<?php } else { ?>
<img src="<?=root?>assets/admin/img/no_img.png" class="img" alt="no image" />
<?php } ?>
</div>
<div class="c4">

<div class="catnviews mt15">
<p class="tag">
<?php $catetory = $post['category_id'];
echo $mysqli->query("SELECT * FROM categories WHERE id = ".$catetory."")->fetch_object()->title; ?>
&nbsp;
</p>
<span class="viewsp">
<img src="<?=root?>assets/front/img/views.svg" alt="<?=$post['title']?>" class="views_svg" />
<strong>&nbsp;<?=$post['hits']?></strong>
</span>
</div>

<h2><?=$post['title']?></h2>
<p><?=substr(strip_tags($post['content']), 0, 160)?></p>

<?php include "app/views/front/partcials/author.php"?>

</div>
</div>
</a>
</section>
 <?php } } ?>

<section class="articles">
 <div class="contain">
 <div class="row">
 <?php include "app/views/front/partcials/post.php"?>
 </div>
 </div>
</section>