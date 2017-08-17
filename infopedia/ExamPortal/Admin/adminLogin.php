<!DOCTYPE html>
<?php
include_once("submit.php");
if(!isset($_SESSION['aname']))
{ ?>
<html>
<head>
  <title>ADMIN Login</title>
</head>
<body>
  <?php include_once("style.php"); ?>
	<div class="header">
		<h2>ADMIN Login</h2>
	</div>
	<form method="post" action="adminLogin.php">
		<div class="input-group">
      <?php include_once("errors.php");?>
			<label>Mail Id</label>
			<input type="text" name="entry" autocomplete="off" autofocus/>
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password"/>
		</div>
    <div class="input-group">
			<label>Organization</label>
			<input type="password" name="organization"/>
		</div>
		<div class="input-group">
			<button type="submit" name="login" class="btn">Login</button>
			</div>
	</form>
</body>
</html>
<?php
}
else {
  header('Location:dashadmin.php');
}
 ?>
