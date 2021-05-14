<section class="hero">
<div class="">
<h1>Hero Section</h1>
<p>some params about he blog</p>
</div>
</section>

<section class="contain ptb25 featured">
<a href="<?=root?>post">
<div class="row">
<div class="c8"><img src="<?=root?>assets/front/img/item.jpg" alt="" /></div>
<div class="c4">
<p class="tag">Tag or Category</p>
<h2>How to Install Gitea on Ubuntu 20.04</h2>
<p>Pakistan stands at 4th place in the world for providing freelancing services according to the Online Labor Index published for the year 2017 by Oxford Internet Institute. Since the IT sector in Pakistan is emerging with every passing day, it is estimated that by the end of 2022, Pakistan will</p>

<div class="author">
<img src="https://technewspakistan.com/content/images/size/w100/2021/05/22.jpg" alt="" />
<p>Qasim Hussain</p>
<p class="date_time">May 13, 2021 - 1 min read</p>
</div>
</div>
</div>
</a>
</section>


<section class="articles">
 <div class="contain">
 <div class="row">

<?php

// Create connection
$conn = new mysqli(server, username, password, dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM posts ORDER BY id DESC LIMIT 27";
$result = $conn->query($sql);


if ($result->num_rows > 0) {


    // output data of each row
    while($row = $result->fetch_assoc()) {   ?>

 <div class="c4 mb25">
 <a href="<?=root?><?=$row['title_slug']?>">
  <img src="https://phptravels.com/blog/<?=$row['image_big']?>" alt="" />
   <p class="tag"><?=$row['id']?></p>
   <h2><?=$row['title']?></h2>
   <p><?=strip_tags($row['content'])?></p>
    <div class="author">
    <img src="https://technewspakistan.com/content/images/size/w100/2021/05/22.jpg" alt="" />
    <p>Qasim Hussain</p>
    <p class="date_time"><?=$row['created_at']?></p>
    </div>
 </a>
 </div>

<?php } } else {
echo "0 results";
}
$conn->close();

?>

 </div>
 </div>
</section>