<?php
include_once("dbconnect.php");
 ?>
<?php
session_start();
if(isset($_SESSION['name']))
{
$Catname="";
$flag=0;
if(isset($_POST['doneBut']))
{
  $Catname=$_POST['doneBut'];
  $q=$_POST['quest'];
  $op1=$_POST['opt1'];
  $op2=$_POST['opt2'];
  $op3=$_POST['opt3'];
  $op4=$_POST['opt4'];
  $cop=$_POST['option'];
    $sql="SELECT * FROM `$Catname`";
    $rslt=mysqli_query($connect,$sql);
    $no=mysqli_num_rows($rslt)+1;
    $sqlt="SELECT `quest` FROM `$Catname`";
    $rsltt=mysqli_query($connect,$sql);
    if(mysqli_num_rows($rsltt)>0)
    {
      while($row=mysqli_fetch_assoc($rsltt))
      {
        if($q==$row["quest"])
        {
          $flag=1;
          break;
        }
      }
    }
    if($flag==0)
    {
      $sql="INSERT INTO `$Catname`(`questno`, `quest`, `opt1`, `opt2`, `opt3`, `opt4`, `optCorrect`) VALUES ('$no','$q','$op1','$op2','$op3','$op4','$cop')";
      if(mysqli_query($connect,$sql))
      {
        header('Location:cat_ques.php?name='.$Catname);
      }
      else {
        echo $Catname;
      }
    }
    else {
      header('Location:cat_ques.php?name='.$Catname);
    }
}
}
else {
  header('Location:teacherLogin.php');
}
?>
