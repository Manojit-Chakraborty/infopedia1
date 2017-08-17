<?php
include_once("dbconnect.php");
if($_SESSION['aname'])
{
if(isset($_POST['search']))
{
  $srch=$_POST['searchBar'];
  $gender=$_POST['gender'];
  $orga=$_POST['orga'];
  $qual=$_POST['qual'];
  if(strcmp($gender,"All")==0)
  {
    $gender="`gender` LIKE '%%'";
  }
  elseif (strcmp($gender,"Male")==0) {
    $gender="`gender`='Male'";
  }
  else {
    $gender="`gender`='Female'";
  }
  if(strcmp($orga,"All")==0)
  {
    $orga="";
  }
  if(strcmp($qual,"All")==0)
  {
    $qual="";
  }
  $sqlT="SELECT * FROM `teacher_login` WHERE `fname` LIKE '%$srch%' AND (".$gender." AND `organization` LIKE '%$orga%' AND `qualification` LIKE '%$qual%') ORDER BY `fname`";
}
else
{
  $sqlT="SELECT * FROM `teacher_login` ORDER BY `fname`";
}
$rsltT=mysqli_query($connect,$sqlT);
if(mysqli_num_rows($rsltT)>0)
{?>
  <table cellspacing="10" cellpadding="10" border="2" id="cat_tab" align="center" rules="all">
    <tr>
      <th colspan="8" align="center">
        Name
      </th>
      <th colspan="2" align="center">
        Options
      </th>
    </tr>
    <?php
    while ($rowT=mysqli_fetch_assoc($rsltT))
    {?>
      <tr>
        <td colspan="8" align="center">
          <?php echo $rowT["fname"];?>
        </td>
        <td align="center">
          <form action="manageUsers.php" method="post" id="view"><br>
          <button type="submit" form="view" name="showTeach" class="btn btn-primary" value="<?php echo $rowT["email"]; ?>" onclick="on();">View</button>
          </form>
        </td>
        <td align="center">
          <form action="deleteUser.php" method="post" id="del"><br>
          <button type="submit" class="btn btn-outline btn-danger" form="del" name="removeTeach" value="<?php echo $rowT["email"]; ?>" onclick="ask();">Remove</button>
          </form>
        </td>
      </tr>
    <?php
    }
     ?>
  </table>
<?php
}
else {
  echo "No Results Found!";
}
}
else
{
  header('Location:adminLogin.php');
}
?>
