<!DOCTYPE HTML>
<html lang="en">

<head>
<title>Admin Login</title>
<link rel="shortcut icon" href="<?=root;?>uploads/global/favicon.png">
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="X-UA-Compatible" content="ie=edge" />
<link rel="stylesheet" href="https://necolas.github.io/normalize.css/latest/normalize.css" />
<link rel="stylesheet" href="<?=root?>assets/admin/css/style.css" />
</head>

<body>
<div class="contain">
<form class="group" action="<?=root?>admin_login" method="post" style="width: 400px; margin: 0 auto; padding-top: 200px;">
<p><strong>Administrator Login</strong></p>
<input type="email" placeholder="Admin email" />
<input type="password" placeholder="Admin password" />
<button type="submit" class="btn b">login</button>
</form>
</div>
</body>
</html>