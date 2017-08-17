<?php
include("dbconnect.php");
$email=$_SESSION["mail"];
if(isset($_GET['cat'])){
$CAT=$_GET['cat'];
$examData=$email.$CAT;

$sql="SELECT * FROM `category` WHERE `catName`='$CAT'";
$rslt=mysqli_query($connect,$sql);
$row=mysqli_fetch_assoc($rslt);
$markOnCorrect=$row["markQuestCorrect"];
$markOnIncorrect=$row["markQuestIncorrect"];
$duration=$row["totTime"];    //DURATION

$sql="SELECT `marksObtained` FROM `$email` WHERE `catName`='$CAT'";
$rslt=mysqli_query($connect,$sql);
$row=mysqli_fetch_assoc($rslt);
$overallScore=$row["marksObtained"];    //OVERALL SCORE

$sql="SELECT * FROM `$examData`";
$rslt=mysqli_query($connect,$sql);
$totQuest=mysqli_num_rows($rslt);   //NUMBER OF QUESTIONS

$sql="SELECT * FROM `$examData` WHERE `point`='0'";
$rslt=mysqli_query($connect,$sql);
$unattempt=mysqli_num_rows($rslt);    //UNATTEMPTED
$attempt=$totQuest-$unattempt;         //ATTEMPTED

$sql="SELECT * FROM `$examData` WHERE `marked`=`correct`";
$rslt=mysqli_query($connect,$sql);
$corr=mysqli_num_rows($rslt);         //CORRECT
$incorr=$attempt-$corr;               //INCORRECT

if($attempt!=0)
{
  $accuracy=($corr*100)/$attempt;
}
else {
  $attempt=0.00;
}
}
else {
  # code...
}
?>
