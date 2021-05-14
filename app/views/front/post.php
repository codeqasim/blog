<?php

// Create connection
$conn = new mysqli(server, username, password, dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_segments = explode('/', $uri_path);
$uri = $uri_segments[2];

$sql = "SELECT * FROM `posts` WHERE `title_slug` LIKE '".$uri."' ORDER BY `video_embed_code` ASC";
$result = $conn->query($sql);


if ($result->num_rows > 0) {


// output data of each row
while($row = $result->fetch_assoc()) {   ?>


<div class="post">
<p class="tag">Category name goes here</p>
<h1 class="title"><?=$row['title']?></h1>

<div class="author">
<img src="https://technewspakistan.com/content/images/size/w100/2021/05/22.jpg" alt="" />
<p>Qasim Hussain</p>
<p class="date_time">May 13, 2021 - 1 min read</p>
</div>

<img src="https://phptravels.com/blog/<?=$row['image_big']?>" class="img" alt="" />

<div class="content">
<?=$row['content']?>
</div>

</div>

<?php } } else {
echo "0 results";
}
$conn->close();

?>