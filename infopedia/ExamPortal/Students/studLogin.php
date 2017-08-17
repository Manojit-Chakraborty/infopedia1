<!DOCTYPE html>
<?php
include_once("submit.php");
if(!isset($_SESSION['fname']))
{ ?>
<html>
<head>
  <title> Student Login</title>
</head>
<body>
  <?php include_once("style.php"); ?>
	<div class="header">
		<h2>Login</h2>
	</div>
	<form method="post" action="studLogin.php">
		<div class="input-group">
      <?php include_once("errors.php");?>
			<label>E-mail</label>
			<input type="email" name="mail" autocomplete="off" autofocus/>
		</div>

		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password"/>
		</div>
		<div class="input-group">
			<button type="submit" name="login" class="btn">Login</button>
			</div>
		<p>
			Not yet a member?<a href="register.php">Sign up</a>
		</p>
	</form>
</body>
</html>
<?php
}
else {
  header('Location:dashstu.php');
}
 ?>
