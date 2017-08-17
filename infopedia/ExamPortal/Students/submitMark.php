<?php
include_once("dbconnect.php");
session_start();

if(isset($_GET['val']))
{
  $val=(int)$_GET['val'];
  $questno=$_GET['q'];
  $email=$_SESSION['mail'];
  $CAT=($_SESSION['CATEGORY']);
  $t=$email.$CAT;
  $sql="SELECT * FROM `$t` WHERE `questno`='$questno'";
  $rslt=mysqli_query($connect,$sql);
  $row=mysqli_fetch_assoc($rslt);
  $corr=(int)$row["correct"];
  $p=0;
  if($val!=0)
  {
    if($val==$corr)
    {
      $p=1;
    }
    else {
      $p=-1;
    }
  }
  else {
    $p=0;
  }
  $sql="UPDATE `$t` SET `marked`='$val', `point`='$p' WHERE `questno`='$questno'";
  mysqli_query($connect,$sql);
}
?>
