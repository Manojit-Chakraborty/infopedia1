<?php
include("dbconnect.php");
session_start();
$name="";
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
  $diff=floor(((strtotime(date("m/d/Y")))-(strtotime($dob)))/(60*60*24*365));

	if(empty($name)){
		array_push($errors,"Name is required");
	}
  if(empty($email)){
    array_push($errors,"Email is required");
  }
  if(empty($dob)){
		array_push($errors,"Birthday is required");
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
		$sql="INSERT INTO `student_login`(`fname`, `dob`, `phone`, `gender`, `organization`, `qualification`, `email`, `password`) VALUES ('$name','$dob','$phone','$gender','$orga','$qual','$email','$pass')";
		if(mysqli_query($connect,$sql))
    {
      $sql="CREATE TABLE `db_examportal`.`$email`(`catName` VARCHAR(100) NOT NULL, `given` INT(1) NOT NULL, `marksObtained` INT(255) NULL DEFAULT '0', PRIMARY KEY(`catName`)) ENGINE MyISAM";
      if(mysqli_query($connect,$sql))
      {
        $flag=0;
        $sql="SELECT `catName` FROM `category` WHERE `organization`='$orga' OR `organization`='ADMIN'";
        $rslt=mysqli_query($connect,$sql);
        while($rows=mysqli_fetch_assoc($rslt))
        {
          $xzy=$rows["catName"];
          $sql="INSERT INTO `db_examportal`.`$email`(`catName`,`given`,`marksObtained`) VALUES('$xzy','0','0')";
          if(!mysqli_query($connect,$sql))
          {
          }
        }
        if($flag==0)
        {
          header('Location:studLogin.php');
        }
        else {
          header('Location:dashstu.php');
        }
      }
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
	  $sql="SELECT `fname` from `student_login` WHERE `email`='$mail' AND `password`='$password'";
	  $rslt=mysqli_query($connect,$sql);
    $rows=mysqli_fetch_assoc($rslt);
    if(mysqli_num_rows($rslt)==1)
    {
      $_SESSION['fname'] = $rows["fname"];
	    $_SESSION['mail'] = $mail;
		  //header('Location:giveExam.php');
    }
    else
    {
      array_push($errors,"Incorrect username or password");
	  }
  }
}
if(isset($_GET['logout']))
{
	session_destroy();
	unset($_SESSION['fname']);
  unset($_SESSION['mail']);
	header('Location:studLogin.php');
}
else {
  # code...
}
?>
