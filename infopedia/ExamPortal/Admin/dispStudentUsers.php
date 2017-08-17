
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
  $sqlS="SELECT * FROM `student_login` WHERE `fname` LIKE '%$srch%' AND (".$gender." AND `organization` LIKE '%$orga%' AND `qualification` LIKE '%$qual%') ORDER BY `fname`";
}
else
{
  $sqlS="SELECT * FROM `student_login` ORDER BY `fname`";
}
$rsltS=mysqli_query($connect,$sqlS);
if(mysqli_num_rows($rsltS)>0)
{?>
   <html>
   <head></head>
   <title>IP Admin 1.0</title>

   <!-- Bootstrap Core CSS -->
   <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

   <!-- MetisMenu CSS -->
   <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

   <!-- Custom CSS -->
   <link href="dist/css/sb-admin-2.css" rel="stylesheet">

   <!-- Morris Charts CSS -->
   <link href="vendor/morrisjs/morris.css" rel="stylesheet">

   <!-- Custom Fonts -->
   <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <body>

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
    while ($rowS=mysqli_fetch_assoc($rsltS))
    {?>
      <tr>
        <td colspan="8" align="center">
          <?php echo $rowS["fname"];?>
        </td>
        <td align="center">
          <form action="manageUsers.php" method="post" id="view"><br>
          <button type="submit" name="showStud" class="btn btn-primary" value="<?php echo $rowS["email"]; ?>">View</button>
          </form>
        </td>
        <td align="center">
          <form action="deleteUser.php" method="post" id="del"><br>
          <button type="submit" form="del" class="btn btn-outline btn-danger" name="removeStud" value="<?php echo $rowS["email"]; ?>" onclick="JavaScript:return ask();">Remove</button>
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
  echo "No Results found!";
}
}
else
{
  header('Location:adminLogin.php');
}
 ?>
</body>
   </html>