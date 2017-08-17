<?php
include_once("dbconnect.php");

$mailt=$_SESSION['mail'];
$CATt=$_SESSION['CATEGORY'];
$newTab=$mailt.$CATt;
$sql="SELECT * FROM `category` WHERE `catName`='$CAT'";
$rslt=mysqli_query($connect,$sql);
$row=mysqli_fetch_assoc($rslt);
$markCorr=(int)$row["markQuestCorrect"];
$markIncorr=(int)$row["markQuestIncorrect"];
$tot=0;
$sql="SELECT `point` FROM `$newTab` WHERE `point`='1'";
$rslt=mysqli_query($connect,$sql);
$x=mysqli_num_rows($rslt);
$tot=$tot+$markCorr*$x;
$sql="SELECT `point` FROM `$newTab` WHERE `point`='-1'";
$rslt=mysqli_query($connect,$sql);
$x=mysqli_num_rows($rslt);
$tot=$tot-$markIncorr*$x;

$sql="UPDATE `$mail` SET `marksObtained`='$tot' WHERE `catName`='$CAT'";
mysqli_query($connect,$sql);
 ?>
