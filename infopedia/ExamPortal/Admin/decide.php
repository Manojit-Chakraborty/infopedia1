<?php
include_once("dbconnect.php");
session_start();
if($_SESSION['aname'])
{
if(isset($_POST['approve']))
{
  $email=$_POST['approve'];
  $sql="SELECT * FROM `temp_teacher` WHERE `email`='$email'";
  $rslt=mysqli_query($connect,$sql);
  $row=mysqli_fetch_assoc($rslt);
  $fname=$row["fname"];
  $dob=$row["dob"];
  $phone=$row["phone"];
  $gender=$row["gender"];
  $organization=$row["organization"];
  $qualification=$row["qualification"];
  $email=$row["email"];
  $password=$row["password"];
  $sqlT="INSERT INTO `teacher_login` (`fname`, `dob`, `phone`, `gender`, `organization`, `qualification`, `email`, `password`) VALUES ('$fname','$dob','$phone','$gender','$organization','$qualification','$email','$password')";
  if(mysqli_query($connect,$sqlT))
  {
    $sql="DELETE FROM `temp_teacher` WHERE `email`='$email'";
    if(mysqli_query($connect,$sql))
    {
      header('Location:pending.php');
    }
  }
}
else
{
  $email=$_POST['deny'];
  $sql="DELETE FROM `temp_teacher` WHERE `email`='$email'";
  if(mysqli_query($connect,$sql))
  {
    header('Location:pending.php');
  }
}
}
else
{
  header('Location:adminLogin.php');
}
?>
