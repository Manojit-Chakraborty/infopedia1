<?php
include_once("dbconnect.php");
session_start();
$newTab;
$mail=$_SESSION['mail'];
if(isset($_POST['start']))
{
  $CAT=$_POST['start'];
  $sqlTime="SELECT `totTime` FROM `category` WHERE `catName`='$CAT'";
  $rsltTime=mysqli_query($connect,$sqlTime);
  $rowTime=mysqli_fetch_assoc($rsltTime);
  $currentTime=strtotime(date("h:i:sa"));
  $setTime=$rowTime["totTime"];
  $_SESSION['TIMER']=$setTime+$currentTime;

  $newTab=$mail.$CAT;
  $sqlT="CREATE TABLE `db_examportal`.`$newTab` ( `questno` INT(255) NOT NULL , `quest` VARCHAR(255) NOT NULL , `opt1` VARCHAR(255) NOT NULL , `opt2` VARCHAR(255) NOT NULL , `opt3` VARCHAR(255) NOT NULL , `opt4` VARCHAR(255) NOT NULL ,`correct` INT(255) NOT NULL, `marked` INT(255) DEFAULT '0' , `point` INT(255) DEFAULT '0'  DEFAULT '0' , PRIMARY KEY (`questno`)) ENGINE = MyISAM;";
  if(mysqli_query($connect,$sqlT))
  {
    $sql="SELECT * FROM `$CAT`";
    $rslt=mysqli_query($connect,$sql);
    while($rows=mysqli_fetch_assoc($rslt))
    {
      $questno=$rows["questno"];
      $quest=$rows["quest"];
      $opt1=$rows["opt1"];
      $opt2=$rows["opt2"];
      $opt3=$rows["opt3"];
      $opt4=$rows["opt4"];
      $corr=$rows["optCorrect"];
      $sqlT="INSERT INTO `$newTab`(`questno`, `quest`, `opt1`, `opt2`, `opt3`, `opt4`,`correct`) VALUES ('$questno','$quest','$opt1','$opt2','$opt3','$opt4','$corr')";
      mysqli_query($connect,$sqlT);
    }
    header('Location:start_exam.php');
  }
  else {
    header('Location:scores.php?cat='.$CAT);
  }
}
elseif (isset($_GET['given'])) {
  $CAT=$_SESSION['CATEGORY'];
  include_once("UpdateTotal.php");
  $sqlT="UPDATE `$mail` SET `given`='1' WHERE `catName`='$CAT'";
  if(mysqli_query($connect,$sqlT))
  {
    unset($_SESSION['TIMER']);
  }
  header('Location:scores.php?cat='.$CAT);
}

 ?>
