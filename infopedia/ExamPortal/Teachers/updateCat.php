<?php
include_once("dbconnect.php");
session_start();
if(isset($_SESSION['name']))
{
$Catname="";
if(isset($_POST['update']))
{
  $Catname=$_POST['update'];
  $newCatname=$_POST['catname'];
  $corr=$_POST['markCor'];
  $incorr=$_POST['markIncor'];
  $t=(((float)($_POST['totTime']))*60);
  $totTime=sprintf($t);
  $sql="UPDATE `category` SET `totTime`='$totTime',`catName`='$newCatname',`markQuestCorrect`='$corr',`markQuestIncorrect`='$incorr' WHERE `catName`='$Catname'";
  if(!mysqli_query($connect,$sql))
  {
    echo "Category edit error";
  }
  else {
    $sqlT="RENAME TABLE `db_examportal`.`$Catname` TO `db_examportal`.`$newCatname`";
    if(!mysqli_query($connect,$sqlT))
    {
      echo "Category rename error";
      header('Location:cat_ques.php?name='.$newCatname);
    }
    else {
      $sql="SELECT `email` FROM `student_login`";
      $rslt=mysqli_query($connect,$sql);
      while($rows=mysqli_fetch_assoc($rslt))
      {
        $t=$rows["email"];
        $sqlT="UPDATE `$t` SET `catName`='$newCatname' WHERE `catName`='$Catname'";
        mysqli_query($connect,$sqlT);
      }
      header('Location:cat_ques.php?name='.$newCatname);
    }
  }
}
else {
  header('Location:cat_page.php');
}
}
else {
  header('Location:teacherLogin');
}
?>
