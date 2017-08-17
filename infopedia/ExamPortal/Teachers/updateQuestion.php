<?php
include_once("dbconnect.php");
 ?>
<?php
session_start();
if(isset($_SESSION['name']))
{
$Catname="";
$questno="";
$temp="";
if(isset($_POST['updateBut']))
{
  $Catname=$_POST['categoryname'];
  $questno=$_POST['questno'];
  $q=trim($_POST['quest']);
  $op1=trim($_POST['opt1']);
  $op2=trim($_POST['opt2']);
  $op3=trim($_POST['opt3']);
  $op4=trim($_POST['opt4']);
  $cop=$_POST['option'];
  $sql="UPDATE `$Catname` SET `quest`='$q',`opt1`='$op1',`opt2`='$op2',`opt3`='$op3',`opt4`='$op4',`optCorrect`='$cop' WHERE `questno`='$questno'";
  if(!mysqli_query($connect,$sql)){
    echo "Error in update";
  }
  header('Location:cat_ques.php?name='.$Catname);
}}
else {
  header('Location:teacherLogin');
}
?>
