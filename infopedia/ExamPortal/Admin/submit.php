<?php
include("dbconnect.php");
session_start();
$errors=array();

if(isset($_POST['login']))
{
  $entry=$_POST['entry'];
	$password=$_POST['password'];
  $orga=$_POST['organization'];
  if(empty($entry))
  {
	   array_push($errors,"Mail Id required");
  }
  if(empty($password))
  {
	    array_push($errors,"Password is required");
  }
  if(empty($orga))
  {
	    array_push($errors,"Organization is required");
  }
  if(count($errors)==0)
  {
    $password=($password);
	  $sql="SELECT * from `admin_login` WHERE `email`='$entry' AND `password`='$password' AND `organization`='$orga'";
	  $rslt=mysqli_query($connect,$sql);
    $rows=mysqli_fetch_assoc($rslt);
    if(mysqli_num_rows($rslt)==1)
    {
      $_SESSION['aname'] = "ADMIN";
      $_SESSION['Organization']=$rows["organization"];
		  header('Location:dashadmin.php');
    }
    else
    {
      array_push($errors,"NOT AN ADMIN");
	  }
  }
}
if(isset($_POST['logout']))
{
	session_destroy();
	unset($_SESSION['aname']);
  unset($_SESSION['Organization']);
	header('Location:adminLogin.php');
}
else {
  
}
?>
