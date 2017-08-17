<?php
include_once("dbconnect.php");

if($_SESSION['aname'])
{
if(isset($_POST['search']))
{
  $srch=$_POST['searchBar'];
  $sql="SELECT * FROM `temp_teacher` WHERE `fname` LIKE '%$srch%'";

  $g="";
  $o="";
  $q="";
  $gender=$_POST['gender'];
  $orga=$_POST['orga'];
  $qual=$_POST['qual'];
  if(strcmp($gender,"All")==0)
  {
    $gender="";
  }
  else {
    $g=$gender;
  }
  if(strcmp($orga,"All")==0)
  {
    $orga="";
  }
  else {
    $o=$orga;
  }
  if(strcmp($qual,"All")==0)
  {
    $qual="";
  }
  else {
    $q=$qual;
  }
  $sql="SELECT * FROM `temp_teacher` WHERE `fname` LIKE '%$srch%' AND (`gender`LIKE '%$gender%' AND `organization` LIKE '%$orga%' AND `qualification` LIKE '%$qual%')";
}
else
{
  $sql="SELECT * FROM `temp_teacher`";
}
$rslt=mysqli_query($connect,$sql);
if(mysqli_num_rows($rslt)>0)
{?>
  <table cellspacing="10" cellpadding="10" border="2" id="cat_tab" align="center" rules="all">
    <tr>
      <th align="center">Name</th>
      <th align="center">Email</th>
      <th align="center">Age</th>
      <th align="center">Organization</th>
      <th align="center">Qualification</th>
      <th align="center">Gender</th>
      <th align="center">Phone</th>
      <th align="center" colspan="2">Options</th>
    </tr>
    <?php
    $n=1;
    while ($row=mysqli_fetch_assoc($rslt))
    {?>
      <tr>
        <form action="decide.php" method="post" id="decide">
        <td>
          <input type="hidden" value="<?php echo $row["fname"]; ?>"/>
          <?php echo $row["fname"]; ?>
        </td>
        <td>
          <input type="hidden" value="<?php echo $row["email"]; ?>"/>
          <?php echo $row["email"]; ?>
        </td>
        <td>
          <input type="hidden" value="<?php echo $row["dob"]; ?>"/>
          <?php $dob= strtotime($row["dob"]);
                $now= strtotime(date("Y-m-d"));
                $age= floor(($now-$dob)/(60*60*24*365));
                echo $age;?>
        </td>
        <td>
          <input type="hidden" value="<?php echo $row["organization"]; ?>"/>
          <?php echo $row["organization"]; ?>
        </td>
        <td>
          <input type="hidden" value="<?php echo $row["qualification"]; ?>"/>
          <?php echo $row["qualification"]; ?>
        </td>
        <td>
          <input type="hidden" value="<?php echo $row["gender"]; ?>"/>
          <?php echo $row["gender"]; ?>
        </td>
        <td>
          <input type="hidden" value="<?php echo $row["phone"]; ?>"/>
          <?php echo $row["phone"]; ?>
        </td>
        <td>
          <button type="submit" name="approve" form="decide" value="<?php echo $row["email"]; ?>" style="color:#1FFF00;">APPROVE</button>
        </td>
        <td>
          <button type="submit" name="deny" form="decide" value="<?php echo $row["email"]; ?>" style="color:#FF0000;">DENY</button>
        </td>
      </form>
      </tr>
    <?php
    }
    ?>
  </table>
  <?php
}
else {
  echo "No Pending Registrations!";
}
}
else
{
  header('Location:adminLogin.php');
}
?>
