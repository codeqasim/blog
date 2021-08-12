<?php if ($data->num_rows > 0) { foreach($data as $d) { ?>
<?php if (getimagesize(root."uploads/posts/".$d['img']) !== false) {
$img = root."uploads/posts/".$d['img']; } else { $img = root."assets/admin/img/no_img.png";}
$meta_desc = substr(strip_tags($d['content']), 0, 160);
?>

<!DOCTYPE html>
<html amp>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">

    <title><?=$meta_title?></title>

    <link rel="icon" href="<?=root;?>uploads/global/favicon.png" type="image/png" />
    <link rel="canonical" href="<?=$meta_url?>" />
    <meta name="referrer" content="no-referrer-when-downgrade" />

    <meta property="og:site_name" content="<?=$app->app_name?>" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="<?=$d['title']?>" />
    <meta property="og:description" content="<?=$meta_desc?>" />
    <meta property="og:url" content="<?=$meta_url?>" />
    <meta property="og:image" content="<?=$img?>" />
    <meta property="article:published_time" content="<?=$meta_time?>" />
    <meta property="article:modified_time" content="<?=$meta_time?>" />
    <meta property="article:tag" content="<?=$meta_keywords?>" />

    <meta property="article:publisher" content="https://www.facebook.com/technewspakistan.official" />
    <meta property="article:author" content="https://www.facebook.com/qasimofficials" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="<?=$d['title']?>" />
    <meta name="twitter:description" content="<?=$meta_desc?>" />
    <meta name="twitter:url" content="<?=$meta_url?>" />
    <meta name="twitter:image" content="<?=$img?>" />
    <meta name="twitter:label1" content="Written by" />
    <meta name="twitter:data1" content="Qasim Hussain" />
    <meta name="twitter:label2" content="Filed under" />
    <meta name="twitter:data2" content="<?=$meta_keywords?>" />
    <meta name="twitter:site" content="@phpblogscript" />
    <meta property="og:image:width" content="1640" />
    <meta property="og:image:height" content="924" />

    <script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Article",
    "publisher": {
        "@type": "Organization",
        "name": "<?=$app->app_name?>",
        "url": "<?=root?>",
        "logo": {
            "@type": "ImageObject",
            "url": "<?=$img?>,
            "width": 60,
            "height": 60
        }
    },
    "author": {
        "@type": "Person",
        "name": "Qasim Hussain",
        "image": {
            "@type": "ImageObject",
            "url": "<?=$img?>",
            "width": 708,
            "height": 888
        },
        "url": "<?=root?>author/qasim/",
        "sameAs": [
            "https://www.qasimhussain.com",
            "https://www.facebook.com/qasimofficials"
        ]
    },
    "headline": "<?=$d['title']?>",
    "url": "<?=$meta_url?>",
    "datePublished": "<?=$meta_time?>",
    "dateModified": "<?=$meta_time?>",
    "image": {
        "@type": "ImageObject",
        "url": "<?=$img?>",
        "width": 1640,
        "height": 924
    },
    "keywords": "<?=$meta_keywords?>",
    "description": "<?=$meta_desc?>",
    "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "<?=root?>"
    }
}
    </script>

    <meta name="generator" content="php blog script v1.0" />
    <link rel="alternate" type="application/rss+xml" title="<?=$app->app_name?>" href="<?=root?>sitemap.xml" />

    <style amp-custom>
    *,
    *::before,
    *::after {
        box-sizing: border-box;
    }

    html {
        overflow-x: hidden;
        overflow-y: scroll;
        font-size: 62.5%;
        -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
    }

    body {
        min-height: 100vh;
        margin: 0;
        padding: 0;
        color: #3a4145;
        font-family: -apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Oxygen,Ubuntu,Cantarell,Open Sans,Helvetica Neue,sans-serif;
        font-size: 1.7rem;
        line-height: 1.55em;
        font-weight: 400;
        font-style: normal;
        background: #fff;
        scroll-behavior: smooth;
        overflow-x: hidden;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    p,
    ul,
    ol,
    li,
    dl,
    dd,
    hr,
    pre,
    form,
    table,
    video,
    figure,
    figcaption,
    blockquote {
        margin: 0;
        padding: 0;
    }

    ul[class],
    ol[class] {
        padding: 0;
        list-style: none;
    }

    img {
        display: block;
        max-width: 100%;
        border-radius: 10px;
    }

    input,
    button,
    select,
    textarea {
        font: inherit;
        -webkit-appearance: none;
    }

    fieldset {
        margin: 0;
        padding: 0;
        border: 0;
    }

    label {
        display: block;
        font-size: 0.9em;
        font-weight: 700;
    }

    hr {
        position: relative;
        display: block;
        width: 100%;
        height: 1px;
        border: 0;
        border-top: 1px solid currentcolor;
        opacity: 0.1;
    }

    ::selection {
        text-shadow: none;
        background: #cbeafb;
    }

    mark {
        background-color: #fdffb6;
    }

    small {
        font-size: 80%;
    }

    sub,
    sup {
        position: relative;
        font-size: 75%;
        line-height: 0;
        vertical-align: baseline;
    }
    sup {
        top: -0.5em;
    }
    sub {
        bottom: -0.25em;
    }

    ul li + li {
        margin-top: 0.6em;
    }

    a {
        color: var(--ghost-accent-color, #1292EE);
        text-decoration-skip-ink: auto;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        margin: 0;
        font-weight: 700;
        color: #121212;
        line-height: 1.4em;
    }

    h1 {
        font-size: 3.4rem;
        line-height: 1.1em;
    }

    h2 {
        font-size: 2.4rem;
        line-height: 1.2em;
    }

    h3 {
        font-size: 1.8rem;
    }

    h4 {
        font-size: 1.7rem;
    }

    h5 {
        font-size: 1.6rem;
    }

    h6 {
        font-size: 1.6rem;
    }

    amp-img {
        height: 100%;
        width: 100%;
        max-width: 100%;
        max-height: 100%;
    }

    amp-img img {
        object-fit: cover;
    }

    .page-header {
        padding: 50px 5vmin 30px;
        text-align: center;
        font-size: 2rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .page-header a {
        color: #121212;
        font-weight: 700;
        text-decoration: none;
        font-size: 1.6rem;
        letter-spacing: -0.1px;
    }

    .post {
        max-width: 680px;
        margin: 0 auto;
    }

    .post-header {
        margin: 0 5vmin 5vmin;
        text-align: center;
    }

    .post-meta {
        margin: 1rem 0 0 0;
        text-transform: uppercase;
        color: #738a94;
        font-weight: 500;
        font-size: 1.3rem;
    }

    .post-image {
        margin: 0 0 5vmin;
    }

    .post-image img {
        display: block;
        width: 100%;
        height: auto;
    }

    .post-content {
        padding: 0 5vmin;
    }

    .post-content > * + * {
        margin-top: 1.5em;
    }

    .post-content [id]:not(:first-child) {
        margin: 2em 0 0;
    }

    .post-content > [id] + * {
        margin-top: 1rem;
    }

    .post-content [id] + .kg-card,
    .post-content blockquote + .kg-card {
        margin-top: 40px;
    }

    .post-content > ul,
    .post-content > ol,
    .post-content > dl {
        padding-left: 1.9em;
    }

    .post-content hr {
        margin-top: 40px;
    }

    .post .post-content hr + * {
        margin-top: 40px;
    }

    .post-content amp-img {
        background-color: #f8f8f8;
    }

    .post-content blockquote {
        position: relative;
        font-style: italic;
    }

    .post-content blockquote::before {
        content: "";
        position: absolute;
        left: -1.5em;
        top: 0;
        bottom: 0;
        width: 0.3rem;
        background: var(--ghost-accent-color, #1292EE);
    }

    .post-content :not(.kg-card):not([id]) + .kg-card {
        margin-top: 40px;
    }

    .post-content .kg-card + :not(.kg-card) {
        margin-top: 40px;
    }

    .kg-card figcaption {
        padding: 1.5rem 1.5rem 0;
        text-align: center;
        font-weight: 500;
        font-size: 1.3rem;
        line-height: 1.4em;
        opacity: 0.6;
    }

    .kg-card figcaption strong {
        color: rgba(0,0,0,0.8);
    }

    .post-content :not(pre) code {
        vertical-align: middle;
        padding: 0.15em 0.4em 0.15em;
        border: #e1eaef 1px solid;
        font-weight: 400;
        font-size: 0.9em;
        line-height: 1em;
        color: #15171a;
        background: #f0f6f9;
        border-radius: 0.25em;
    }

    .post-content > pre {
        overflow: scroll;
        padding: 16px 20px;
        color: #fff;
        background: #1F2428;
        border-radius: 5px;
        box-shadow: 0 2px 6px -2px rgba(0,0,0,.1), 0 0 1px rgba(0,0,0,.4);
    }

    .kg-embed-card {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
    }

    .kg-image-card img {
        margin: auto;
    }

    .kg-gallery-card + .kg-gallery-card {
        margin-top: 0.75em;
    }

    .kg-gallery-container {
        position: relative;
    }

    .kg-gallery-row {
        display: flex;
        flex-direction: row;
        justify-content: center;
    }

    .kg-gallery-image {
        width: 100%;
        height: 100%;
    }

    .kg-gallery-row:not(:first-of-type) {
        margin: 0.75em 0 0 0;
    }

    .kg-gallery-image:not(:first-of-type) {
        margin: 0 0 0 0.75em;
    }

    .kg-bookmark-card,
    .kg-bookmark-publisher {
        position: relative;
    }

    .kg-bookmark-container,
    .kg-bookmark-container:hover {
        display: flex;
        flex-wrap: wrap;
        flex-direction: row-reverse;
        color: currentColor;
        background: rgba(255,255,255,0.6);
        font-family: -apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Oxygen,Ubuntu,Cantarell,Open Sans,Helvetica Neue,sans-serif;
        text-decoration: none;
        border-radius: 5px;
        box-shadow: 0 2px 6px -2px rgba(0, 0, 0, 0.1), 0 0 1px rgba(0, 0, 0, 0.4);
        overflow: hidden;
    }

    .kg-bookmark-content {
        flex-basis: 0;
        flex-grow: 999;
        padding: 20px;
        order: 1;
    }

    .kg-bookmark-title {
        font-weight: 600;
        font-size: 1.5rem;
        line-height: 1.3em;
    }

    .kg-bookmark-description {
        display: -webkit-box;
        max-height: 45px;
        margin: 0.5em 0 0 0;
        font-size: 1.4rem;
        line-height: 1.55em;
        overflow: hidden;
        opacity: 0.8;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
    }

    .kg-bookmark-metadata {
        margin-top: 20px;
    }

    .kg-bookmark-metadata {
        display: flex;
        align-items: center;
        font-weight: 500;
        font-size: 1.3rem;
        line-height: 1.3em;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .kg-bookmark-description {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 2;
        overflow: hidden;
    }

    .kg-bookmark-metadata amp-img {
        width: 18px;
        height: 18px;
        max-width: 18px;
        max-height: 18px;
        margin-right: 10px;
    }

    .kg-bookmark-thumbnail {
        display: flex;
        flex-basis: 20rem;
        flex-grow: 1;
        justify-content: flex-end;
    }

    .kg-bookmark-thumbnail amp-img {
        max-height: 200px;
    }

    .kg-bookmark-author {
        white-space: nowrap;
        text-overflow: ellipsis;
        overflow: hidden;
    }

    .kg-bookmark-publisher::before {
        content: "�";
        margin: 0 .5em;
    }

    .kg-width-full.kg-card-hascaption {
        display: grid;
        grid-template-columns: inherit;
    }

    .post-content table {
        border-collapse: collapse;
        width: 100%;
    }

    .post-content th {
        padding: 0.5em 0.8em;
        text-align: left;
        font-size: .75em;
        text-transform: uppercase;
    }

    .post-content td {
        padding: 0.4em 0.7em;
    }

    .post-content tbody tr:nth-child(2n + 1) {
        background-color: rgba(0,0,0,0.1);
        padding: 1px;
    }

    .post-content tbody tr:nth-child(2n + 2) td:last-child {
        box-shadow:
            inset 1px 0 rgba(0,0,0,0.1),
            inset -1px 0 rgba(0,0,0,0.1);
    }

    .post-content tbody tr:nth-child(2n + 2) td {
        box-shadow: inset 1px 0 rgba(0,0,0,0.1);
    }

    .post-content tbody tr:last-child {
        border-bottom: 1px solid rgba(0,0,0,.1);
    }

    .page-footer {
        padding: 60px 5vmin;
        margin: 60px auto 0;
        text-align: center;
        background-color: #f8f8f8;
    }

    .page-footer h3 {
        margin: 0.5rem 0 0 0;
    }

    .page-footer p {
        max-width: 500px;
        margin: 1rem auto 1.5rem;
        font-size: 1.7rem;
        line-height: 1.5em;
        color: rgba(0,0,0,0.6)
    }

    .powered {
        display: inline-flex;
        align-items: center;
        margin: 30px 0 0;
        padding: 6px 9px 6px 6px;
        border: rgba(0,0,0,0.1) 1px solid;
        font-size: 12px;
        line-height: 12px;
        letter-spacing: -0.2px;
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", "Roboto", "Oxygen", "Ubuntu", "Cantarell", "Fira Sans", "Droid Sans", "Helvetica Neue", sans-serif;
        font-weight: 500;
        color: #222;
        text-decoration: none;
        background: #fff;
        border-radius: 6px;
    }

    .powered svg {
        height: 16px;
        width: 16px;
        margin: 0 6px 0 0;
    }

    @media (max-width: 600px) {
        body {
            font-size: 1.6rem;
        }
        h1 {
            font-size: 3rem;
        }

        h2 {
            font-size: 2.2rem;
        }
    }

    @media (max-width: 400px) {
        h1 {
            font-size: 2.6rem;
            line-height: 1.15em;
        }
        h2 {
            font-size: 2rem;
            line-height: 1.2em;
        }
        h3 {
            font-size: 1.7rem;
        }
    }

    :root {--ghost-accent-color: #5dc669;}
    </style>

    <style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
    <script async src="https://cdn.ampproject.org/v0.js"></script>



</head>

<body class="amp-template">
    <header class="page-header">
        <a href="<?=root?>">
          <amp-img class="site-icon" src="<?=root?>uploads/global/favicon.png" width="50" height="50" layout="fixed"></amp-img>
        </a>
    </header>

    <main class="content" role="main">
        <article class="post">
            <header class="post-header">
                <h1 class="post-title"><?=$d['title']?></h1>
                <section class="post-meta">
                    <?php $user = $mysqli->query('SELECT * FROM users WHERE id = "'.$d['user_id'].'"')->fetch_object(); echo $user->full_name ?> -
                    <time class="post-date" datetime=" <?=$d['created_at']?>"> <?=$d['created_at']?></time>
                </section>
            </header>
            <figure class="post-image">
            <amp-img src="<?=$img?>" width="600" height="340" layout="responsive"></amp-img>
            </figure>
            <section class="post-content">
             <?=$d['content']?>
            </section>

        </article>
    </main>
    <?php } } else { include "404.php"; } ?>
    <footer class="page-footer">
         <amp-img class="site-icon" src="<?=root?>uploads/global/favicon.png" width="50" height="50" layout="fixed"></amp-img>
        <h3><?=$app->app_name?></h3>
            <p><?=$app->description?></p>
        <p><a href="<?=root?>">Read more posts ?</a></p>
        <a class="powered" href="https://phpblogscript.com" target="_blank" rel="noopener"> Published with PHP Blog Script</a>
    </footer>
</body>
</html>