 <!DOCTYPE html>
 <?php
 include_once("dbconnect.php");
 include_once("submit.php");

   $sql="SELECT `orga` FROM `organizations`";
   $rslt=mysqli_query($connect,$sql);
?>
<html>
	<head>
		<title>Student Registration</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<?php include_once("style.php"); ?>
	<div class="header">
		<h2>Register</h2>
	</div>
	<form method="post" action="register.php">
	<?php
		include('errors.php');
	?>
		<div class="input-group">
			<label>Name<span style="color:#FB0000">*</span></label>
			<input autocomplete="off" onkeypress='return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode>=97 && event.charCode<=122) || event.charCode==32' type="text" name="fname" value="<?php if(isset($_POST['register'])){echo $name;} ?>"/>
		</div>
		<div class="input-group">
			<label>Email<span style="color:#FB0000">*</span></label>
			<input autocomplete="off"  type="email" name="email">
		</div>
		<div class="input-group">
			<label>Birthday<span style="color:#FB0000">*</span></label>
			<input autocomplete="off"  type="date" name="dob"/>
		</div>
		<div class="input-group">
			<label>Phone</label>
			<input autocomplete="off"  value="<?php if(isset($_POST['register'])){echo $phone;} ?>" type="text" name="phone" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="10"/>
		</div>
		<div class="input-group">
			<label>Organization<span style="color:#FB0000">*</span></label>
      <select name="orga">
        <option selected disabled>Select Organization</option>
        <?php
        while ($rows=mysqli_fetch_assoc($rslt)) {
          ?>
          <option><?php echo $rows["orga"]; ?></option>
          <?php
        }
         ?>
       </select>
		</div>
		<div align="center">
			<label>Gender</label>
			<br/>
			<input autocomplete="off"  type="radio" name="gender" value="male"/> Male&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input autocomplete="off"  type="radio" name="gender" value="female"/> Female
		</div>
		<div class="input-group">
			<label>Qualification</label>
			<select name="qual" style="width:98%; height:50px; font-size:20px;">
				<option value="none" selected>--select--</option>
				<option value="10th">10th standard</option>
				<option value="12th">12th standard</option>
				<option value="graduate">Graduate</option>
				<option value="masters">Masters</option>
				<option value="php">PHD</option>
			</select>
		</div>
		<div class="input-group">
			<label>Password<span style="color:#FB0000">*</span></label>
			<input autocomplete="off"  type="password" name="password_1">
		</div>
		<div class="input-group">
			<label>Confirm Password</label>
			<input autocomplete="off"  type="password" name="password_2">
		</div>
		<div class="input-group">
			<button type="submit" name="register" class="btn">Register</button>
		</div>
		<p>
			Already a member?<a href="studLogin.php">Sign in</a>
		</p>
	</form>
	</body>
</html>
