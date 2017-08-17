<?php
include_once("dbconnect.php");
 ?>
<?php
session_start();
if(isset($_SESSION['name']))
{
  $fname=$_SESSION['name'];
  $organization=$_SESSION['Organization'];
 $temp="";
 $name="";
 $stat="";
 $sql="SELECT * FROM `category`";
 $rslt=mysqli_query($connect,$sql);
 $x=1;
 if(mysqli_num_rows($rslt)>0)
 {
  while ($row=mysqli_fetch_assoc($rslt))
  {
    $temp="status$x";
    $t=$row["catName"];
    $s=$row["status"];
    echo $s." ".$t;
    if(isset($_POST[$temp]))
    {
      $name=$t;
      $stat=$s;
      break;
    }
    $x=$x+1;
  }
 }
 if(isset($_POST[$temp]))
 {
   if($s=="1" || (mysqli_num_rows($rslt)==0)){
     $sql="UPDATE `category` SET `status`=0 WHERE `catName`='$name'";
   }
   else {
     $sqlt="SELECT `questno`FROM `$name`";
     $rslt=mysqli_query($connect,$sqlt);
     if(mysqli_num_rows($rslt)>0){
     $sql="UPDATE `category` SET `status`=1 WHERE `catName`='$name'";}
     else {
       header('Location:cat_page.php?stat=2');
     }
   }
   if(mysqli_query($connect,$sql))
   {
     header('Location:cat_page.php?stat=1');
   }
   else {
     header('Location:cat_page.php?stat=0');
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
