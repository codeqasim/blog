<html>
<head>
  <title>Installation</title>
  <link rel="shortcut icon" href="../assets/img/favicon.png">
  <style type="text/css">
    progress.active .progress-bar, .progress-bar.active { padding: 10px; }
   .blocks {width: 470px; margin: 0 auto; padding: 50px 0;}
    body{font-family:calibri }
   .admin { display: flex; }
    img {width: 60px; height: 60px; border-radius: 5px; margin-right:10px}
    button { margin-top:26px; cursor:pointer; width: 100%; border: transparent; background: #4f00ff; color: #fff; border-radius: 4px; height: 60px; }
    button:hover {background: #4100CC; }
    form{ margin-bottom: 0; }
    hr{margin: 20px 0; border: 1px solid #e6e6e6;}
    a{text-decoration:none;color:#000}
    h2{ margin: 0; }
    p{ margin: 5px 0; }

  </style>
</head>
<body style="background:#ffffff;margin:0px">
<div class="progress" style="height:100vh !important">
  <div class="progress-bar progress-bar-striped active" id="progress" style="min-width: 10%; background: #4f00ff; height: 60px; text-align: center; display: flex; justify-content: center; align-items: center;">
    <span style="color: #fff; padding: 8px; border-radius: 6px;width:120px" id="information"></span>
  </div>
</div>

<?php
  $total = 100;
  $arrayTimings = array("5000","10000","30000","400000","3000");
  for($i=1; $i<=$total; $i++){
  $keys = array_rand($arrayTimings);
  $val = $arrayTimings[$keys];
  $percent = intval($i/$total * 100);
  $percentage = $percent."%";
  if($percent == 100){
    $processed = "99%";
  }else{
    $processed = $percentage;
  }
  header( 'Content-type: text/html; charset=utf-8' );
  echo '<script language="javascript">
  document.getElementById("progress").style.width ="'.$processed.'";
  document.getElementById("information").innerHTML="'.$processed.' Processed.";
  </script>';
  echo str_repeat(' ',1024*64);
  flush();
  usleep($val);
  }
  echo '<style>body{padding:45px}.progress{display: none;-webkit-transition: opacity 3s ease-in-out; -moz-transition: opacity 3s ease-in-out; -ms-transition: opacity 3s ease-in-out; -o-transition: opacity 3s ease-in-out;}</style><script language="javascript">document.getElementById("information").innerHTML="Process Completed"</script>';
?>

<div class="blocks">

<div class="panel panel-default">
  <h2><strong>Installation Completed</strong></h2>
  <div class="panel-body">
  <p>Your blog has been installed successfully and ready to get started.</p>
  <form action="<?php echo @$_POST['domain']; ?>" target="_blank" method="get">
     <button class="btn btn-default btn-lg btn-block">
      <h4 class="text-center"><strong>Homepage</strong></h4>
     </button>
     </form>
  <hr>
  <div class="admin">
      <img src="includes/assets/img/admin.png" alt="Admin Credentials">
    <div>
      <a href="<?php echo @$_POST['domain']; ?>admin" target="_blank"><strong>Admin URL :</strong> <?php echo @$_POST['domain']; ?>admin </a>
      <br>
      <strong>Email :</strong> <?php echo @$_POST['admin_email']; ?><br>
      <strong>Password :</strong> <?php echo @$_POST['admin_password']; ?>
    </div>
  </div>
<div class="clearfix"></div>
<hr>
<div class="clearfix"></div>
<p class="bold"><strong>Your website's XML Sitemap</strong><br>
<a target="_blank" class="target" href="<?php echo @$_POST['domain']; ?>sitemap.xml"><?php echo @$_POST['domain']; ?>sitemap.xml </a>
</p>
<hr>
<p>To get started and setup the blog please visit here <a target="_blank" class="target" href="//docs.phpblogscript.com"><strong>docs.phpblogscript.com</strong></a><br>
<br>
Looking forward to hearing from you.
</p>
<hr>
<p><span class="bold"><strong>Regards</strong></span><br>
 Team PHP Blog
</p>
</div>
</div>
</div>
</body>
</html>