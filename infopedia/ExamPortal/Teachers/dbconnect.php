<?php
$host="localhost";
$username="root";
$password="";
$dbname="db_examportal";

$connect=mysqli_connect($host,$username,$password,$dbname);
if(!$connect){
  echo "Connection Error";
}
 ?>
