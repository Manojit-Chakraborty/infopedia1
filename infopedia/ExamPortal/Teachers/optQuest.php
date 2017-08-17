<?php
include_once("dbconnect.php");
 ?>
 <?php
 session_start();
 if(isset($_SESSION['name']))
 {
$temp="";
$temp1="";
$Catname="";
$questno="";
$num=1;
while(1)
{
  if(isset($_POST[$num]))
  {
    break;
  }
  $num=$num+1;
}
$questno=$num;
$Catname=$_POST['categoryname'];
  $sql="DELETE FROM `$Catname` WHERE `questno`='$questno'";
  if(mysqli_query($connect,$sql))
  {
    $sqlt="SELECT `quest` FROM `$Catname`";
    $rslt=mysqli_query($connect,$sqlt);
    $x=1;
    while($row=mysqli_fetch_assoc($rslt))
    {
      $t=$row["quest"];
      $sqlT="UPDATE `$Catname` SET `questno`='$x' WHERE `quest`='$t'";
      if(!mysqli_query($connect,$sqlT))
      {
        break;
      }
      $x=$x+1;
    }
    header('Location:cat_ques.php?name='.$Catname);
  }
}
else {
  header('Location:teacherLogin');
}
?>
