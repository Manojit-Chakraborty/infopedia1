<?php
include_once("dbconnect.php");
 ?>
 <?php
 session_start();
 if($_SESSION['aname'])
 {
$temp="";
$temp1="";
$name="";
$sql="SELECT * FROM `category`";
$rslt=mysqli_query($connect,$sql);
$x=1;
if(mysqli_num_rows($rslt)>0)
{
  while ($row=mysqli_fetch_assoc($rslt))
  {
    $temp="delete$x";
    $temp1="editCat$x";
    $t=$row["catName"];
    if(isset($_POST[$temp]) || isset($_POST[$temp1]))
    {
      $name=$t;
      break;
    }
    $x=$x+1;
  }
}
if(isset($_POST[$temp])){
$sql="DELETE FROM `category` WHERE `catName`='$name'";
if(mysqli_query($connect,$sql)){
$sql="DROP TABLE `$name`";
if(mysqli_query($connect,$sql)){
  $sql="SELECT `email` FROM `student_login`";
  $rslt=mysqli_query($connect,$sql);
  $flag=0;
  while($rows=mysqli_fetch_assoc($rslt))
  {
      $xyz=$rows["email"];
      $sqlT="DELETE FROM `$xyz` WHERE `catName`='$name'";
      if(!mysqli_query($connect,$sqlT))
      {
        $flag=1;
        break;
      }
      else {
        $tem=$xyz."".$name;
        $sqlD="DROP TABLE `$tem`";
        mysqli_query($connect,$sqlD);
      }
  }
  if($flag==0){
  header('Location:cat_page.php?delete=1');}
  else {
    header('Location:cat_page.php?delete=0');
  }
}
}
}
elseif (isset($_POST[$temp1])) {
  header('Location:cat_ques.php?name='.$name);
}
else {
  header('Location:cat_page.php?delete=0');
}
}
else
{
  header('Location:adminLogin.php');
}
?>
