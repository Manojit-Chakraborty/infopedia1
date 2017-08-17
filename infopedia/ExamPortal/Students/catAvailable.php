<?php
include_once("dbconnect.php");

$sql="select a.`catName` from `$email` as a, `category` as b where a.`catName`=b.`catName` and b.`status`='1' and a.`given`='0'";

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
