<?php
session_start();
if($_SESSION['aname'])
{
  include_once ("dbconnect.php");
  if(isset($_POST['done']))
  {
    $orga="";
    $name=$_POST['cat_name'];
    $orga=$_POST['done'];
    if($orga!=""){
      $sqlT="SELECT `email` FROM `student_login`";
    $sql="INSERT INTO `category`(`catName`, `status`,`organization`) VALUES ('$name','0','$orga')";}
    if(mysqli_query($connect,$sql))
    {
      $flag=0;
      $sql="CREATE TABLE `db_examportal`.`$name`(`questno` INT(255) NOT NULL, `quest`VARCHAR(255) NOT NULL, `opt1` VARCHAR(150) NOT NULL, `opt2` VARCHAR(150) NOT NULL, `opt3` VARCHAR(150) NOT NULL, `opt4` VARCHAR(150) NOT NULL, `optCorrect` INT(1) NOT NULL, PRIMARY KEY(`questno`)) ENGINE = MyISAM";
      if(mysqli_query($connect,$sql))
      {
        $rslt=mysqli_query($connect,$sqlT);
        while($rows=mysqli_fetch_assoc($rslt))
        {
          $xyz=$rows["email"];
          echo $xyz;
          $sql="INSERT INTO `$xyz`(`catName`,`given`,`marksObtained`) VALUES('$name','0','0')";
          if(!mysqli_query($connect,$sql))
          {
            $flag=1;
            break;
          }
        }
        if($flag==0)
        {
          header('Location:cat_page.php?success=1');
        }
        else
        {
          header('Location:cat_page.php?success=0');
        }
      }
    }
    else {
      header('Location:cat_page.php?success=0');
    }
  }
  else {
    header('Location:cat_page.php');
  }
}
else
{
  header('Location:adminLogin.php');
}
 ?>
