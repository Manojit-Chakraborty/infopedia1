<?php
if(isset($_SESSION['name']))
{
include_once("dbconnect.php");
$sqlt="SELECT `organization` FROM `category` WHERE `catName`='$name'";
$rsltt=mysqli_query($connect,$sqlt);
$rows=mysqli_fetch_assoc($rsltt);
$sql="SELECT * FROM `$name` ORDER BY `questno`";
$rslt=mysqli_query($connect,$sql);
$totalRows=mysqli_num_rows($rslt);
if(mysqli_num_rows($rslt)>0)
{
  echo "Total Questions: $totalRows<br/>";
?>
<table cellspacing="10" cellpadding="10" border="2" id="cat_tab" align="center" rules="all">
  <tr>
    <th colspan="7" align="center" style="font-size:20px;">Questions</th>
  </tr>
<?php
$n=1;
while ($row=mysqli_fetch_assoc($rslt)) {
  ?>
  <script>
  function ask(){
    if(confirm("Are you sure?")==true){
      return true;
    }
    else {
      return false;
    }
  }
  </script>
  <tr>
    <td colspan="1" align="center">
      <?php echo $n."." ?>
    </td>
    <td colspan="4" align="center">
      <?php echo $row["quest"]?>
    </td>
    <td colspan="1" align="center">
      <form id="opt_butEdit" action="editQuest.php" method="post">
        <input type="hidden" name="categoryname" value="<?php echo $name; ?>"/>
      <?php
      if(($rows["organization"]==$organization) || ($organization=="ADMIN"))
      {?>
        <button type="submit" class="opt_but" form="opt_butEdit" id="editQuest" name="<?php echo $row["questno"]; ?>" style="background-color:#3663A6; color:white; border-radius:20%; font-size:16px;">Edit</button>
        <?php
      }
      else {?>
        <button type="submit" class="opt_but" form="opt_butEdit" id="editQuest" name="<?php echo $row["questno"]; ?>" style="background-color:#3663A6; color:white; border-radius:20%; font-size:16px; cursor:not-allowed;" disabled>Edit</button>
        <?php
      }?>
      </form>
    </td>
    <td colspan="1" align="center">
      <form id="opt_butDelete" action="optQuest.php" method="post">
        <input type="hidden" name="categoryname" value="<?php echo $name; ?>"/>
      <?php
        if(($rows["organization"]==$organization) || ($organization=="ADMIN"))
        {?>
          <button type="submit" form="opt_butDelete" name="<?php echo $row["questno"]; ?>" id="delete" class="opt_but" style="background-color:#F71D16; color:white; border-radius:20%; font-size:16px;"onclick="JavaScript:return ask();">Delete</button>          <?php
        }
        else {?>
          <button type="submit" form="opt_butDelete" name="<?php echo $row["questno"]; ?>" id="delete" class="opt_but" style="cursor:not-allowed; background-color:#F71D16; color:white; border-radius:20%; font-size:16px;" disabled>Delete</button>
        <?php
        }?>
      </form>
    </td>
    <tr>
    <?php
      $n=$n+1;
  }?>
</table><?php
}
else {
  echo "No Questions Available";
}
}
else {
  header('Location:teacherLogin.php');
}
 ?>
