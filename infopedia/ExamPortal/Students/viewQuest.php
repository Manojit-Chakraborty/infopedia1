<?php
$host="localhost";
$username="root";
$password="";
$dbname="db_examportal";
$connect=mysqli_connect($host,$username,$password,$dbname);
if(!$connect){
  echo "Connection Error";
}

session_start();
$CAT=$_SESSION['CATEGORY'];

  $questno=$_GET['ans1'];
  $sql="SELECT * FROM `$CAT` WHERE `questno`='$questno'";
  $rslt=mysqli_query($connect,$sql);
  $row=mysqli_fetch_assoc($rslt);
  echo "<b><u>Question:</u></b><br/>";
  echo $row["quest"]."</br><br/><hr>";
  echo "<b><u>Options:</u></b><br/>";
  echo  "<b>1. </b>".$row["opt1"].(((int)$row["optCorrect"]==1)?'<img src="Icons\correct.png" width="20px" height="20px"/><br/>':'<br/>');
  echo  '<b>2. </b>'.$row["opt2"].(((int)$row["optCorrect"]==2)?'<img src="Icons\correct.png" width="20px" height="20px"/><br/>':'<br/>');
  echo  '<b>3. </b>'.$row["opt3"].(((int)$row["optCorrect"]==3)?'<img src="Icons\correct.png" width="20px" height="20px"/><br/>':'<br/>');
  echo  '<b>4. </b>'.$row["opt4"].(((int)$row["optCorrect"]==4)?'<img src="Icons\correct.png" width="20px" height="20px"/><br/>':'<br/>');

?>
