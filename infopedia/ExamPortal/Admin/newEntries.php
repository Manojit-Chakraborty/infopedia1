<?php
include("dbconnect.php");
session_start();
if($_SESSION['aname'])
{
if(isset($_POST['done']))
{
  $sql="";
  if(isset($_POST['orga_name']))
  {
    $org=$_POST['orga_name'];
    echo "$org";
    $sql="INSERT INTO `organizations`(`orga`) VALUES ('$org')";
  }
  else {
    $mail=$_POST['email'];
    $pass=$_POST['pass'];
    $sql="INSERT INTO `admin_login`(`email`, `password`) VALUES ('$mail','$pass')";
  }
  if(mysqli_query($connect,$sql))
  {
    header('Location:adminControlCenter.php');
  }
}
else {
  header('Location:adminControlCenter.php');
}
}
else
{
  header('Location:adminLogin.php');
}
?>

