<!DOCTYPE html>
<html>
<head>
	<title>LOGIN | NURSE PANEL</title>
	<link rel="stylesheet" type="text/css" href="./css/login.css">
</head>
<body>
     <form action="login.php" method="post">
     	<h2>NURSE LOGIN</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>Username:</label>
     	<input type="text" name="uname" placeholder="Username"><br>

     	<label>Password:</label>
     	<input type="password" name="password" placeholder="Password"><br>

     	<button type="submit" name="login_btn">LOGIN</button>
     </form>
</body>
</html>