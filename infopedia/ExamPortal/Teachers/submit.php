<?php
include("dbconnect.php");
session_start();
$email="";
$errors=array();

if(isset($_POST['register'])){
  $phone="";$gender="";$qual="";$orga="";
  $name=mysqli_real_escape_string($connect,$_POST['fname']);
	$email=mysqli_real_escape_string($connect,$_POST['email']);
  $dob=mysqli_real_escape_string($connect,$_POST['dob']);
  if(isset($_POST['orga'])){$orga=$_POST['orga'];};
	$password_1=mysqli_real_escape_string($connect,$_POST['password_1']);
	$password_2=mysqli_real_escape_string($connect,$_POST['password_2']);
  $diff=floor(((strtotime(date("Y/m/d")))-(strtotime($dob)))/(60*60*24*365));
	if(empty($name)){
		array_push($errors,"Name is required");
	}
  if(empty($email)){
    array_push($errors,"Email is required");
  }
  if(empty($dob)){
		array_push($errors,"Birthday is required");
	}
  else{
    if($diff<25 || $diff>100)
    {
      array_push($errors,"Age is not elligible!");
    }
  }
  if($orga==""){
		array_push($errors,"Organization is required");
	}
	if(empty($password_1)){
		array_push($errors,"Password is required");
	}
	if($password_1 != $password_2){
		array_push($errors,"two passwords do not match!!");
	}
  if(isset($_POST['phone']) && $_POST['phone']!=""){
    $phone=$_POST['phone'];
    if(strlen($phone)<10){
      array_push($errors,"Invalid phone number");
    }
  }
  if(isset($_POST['gender'])){
    $gender=$_POST['gender'];
  }
  if(isset($_POST['qual'])){
    $qual=$_POST['qual'];
  }

	if(count($errors)==0){
		$pass=($password_1);
		$sql="INSERT INTO `temp_teacher`(`fname`, `dob`, `phone`, `gender`, `organization`, `qualification`, `email`, `password`) VALUES ('$name','$dob','$phone','$gender','$orga','$qual','$email','$pass')";
		if(mysqli_query($connect,$sql))
    {?>
      <script>
      alert("Your registration details have been submitted for verification.");
      </script>
      <?php
      header('Location:teacherLogin.php');
    }
    else {
      ?>
      <script>
      alert("E-mail already registered!\nLog In using the same.");
      </script>
      <?php
    }

	}
}
if(isset($_POST['login']))
{
  $mail=$_POST['mail'];
	$password=$_POST['password'];
  if(empty($mail))
  {
	   array_push($errors,"E-mail is required");
  }
  if(empty($password))
  {
	    array_push($errors,"Password is required");
  }
  if(count($errors)==0)
  {
    $password=($password);
	  $sql="SELECT `fname`,`organization` from `teacher_login` WHERE `email`='$mail' AND `password`='$password'";
	  $rslt=mysqli_query($connect,$sql);
    $rows=mysqli_fetch_assoc($rslt);
    if(mysqli_num_rows($rslt)==1)
    {
      $_SESSION['name'] = $rows["fname"];
      $_SESSION['Organization']=$rows["organization"];
		  header('Location:dashteacher.php');
    }
    else
    {
      $sql="SELECT `fname`,`organization` from `temp_teacher` WHERE `email`='$mail' AND `password`='$password'";
      $rslt=mysqli_query($connect,$sql);
      $rows=mysqli_fetch_assoc($rslt);
      if(mysqli_num_rows($rslt)==1)
      {?>
        <script>
        alert("Registration details are still under verification.\nYou can log in after the process completes.");
        </script>
        <?php
      }
      else
      {
        array_push($errors,"Incorrect username or password");
  	  }
    }
  }
}
if(isset($_GET['logout']))
{
	session_destroy();
	unset($_SESSION['name']);
  unset($_SESSION['Organization']);
	header('Location:teacherLogin.php');
}
else {
  # code...
}
?>
