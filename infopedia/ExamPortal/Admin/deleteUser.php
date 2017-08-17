<?php
include_once("dbconnect.php");
session_start();
if($_SESSION['aname'])
{
$tb="";
$mail="";
if(isset($_POST['removeTeach']))
{
  $tb="teacher_login";
  $mail=$_POST['removeTeach'];
}
elseif (isset($_POST['removeStud']))
{
  $tb="student_login";
  $mail=$_POST['removeStud'];
}
if(strcmp($tb,"")>0 && strcmp($mail,"")>0)
{
  $sql="DELETE FROM `$tb` WHERE `email`='$mail'";
  if(mysqli_query($connect,$sql))
  {
    if(isset($_POST['removeStud']))
    {
      $sqlT="SELECT `catName` FROM `$mail` WHERE `given`='1'";
      $rsltT=mysqli_query($onnect,$sqlT);
      while($rowsT=mysqli_fetch_assoc($rsltT)>0)
      {
        $temp=$mail.$rowsT["catName"];
        $sqlN="DROP TABLE `$temp`";
        mysqli_query($connect,$sqlN);
      }

      $sql="DROP TABLE `$mail`";
      if(!mysqli_query($connect,$sql))
      {
        echo "$mail delete error";
      }
      else {

        header('Location:manageUsers.php');
      }
    }
    header('Location:manageUsers.php');
  }
  else {
    echo "Error";
  }
  $tb="";
  $mail="";
  $sql="";
}
}
else
{
  header('Location:adminLogin.php');
}
?>
