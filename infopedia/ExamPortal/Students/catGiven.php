<?php
include_once("dbconnect.php");
session_start();
$email=$_SESSION['mail'];
$sql="select `catName` from `$email` where `given`='1'";

$rslt=mysqli_query($connect,$sql);
if(mysqli_num_rows($rslt)>0)
{
  ?><option selected disabled>Select Category</option><?php
  while ($row=mysqli_fetch_assoc($rslt))
  {
    ?>
    <option>
      <?php echo $row["catName"]; ?></option>
    <?php
  }
}
else {
  ?>
  <option selected disabled>No Category Available</option>
  <?php
}
mysqli_close($connect);
?>
