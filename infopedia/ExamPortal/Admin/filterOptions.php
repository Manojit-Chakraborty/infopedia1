<?php
include_once("dbconnect.php");
$sql1="SELECT * FROM `organizations`";
$rslt1=mysqli_query($connect,$sql1);
?>
<br/><br/><br/>
<hr>
<table cellspacing="10">
  <tr>
    <th rowspan="2">
      <b style="font-size:px;">Filters:</b>
    </td>
    <th>
      Gender
    </th>
    <th>
      Organization
    </th>
    <th>
      Qualification
    </th>
  </tr>
  <tr>
    <td align="center">
      <select name="gender">
        <option selected>All</option>
        <option>Male</option>
        <option>Female</option>
      </select>
    </td>
    <td align="center">
      <select name="orga">
        <option selected>All</option>
        <?php
          while($row1=mysqli_fetch_assoc($rslt1))
          {?>
            <option><?php echo $row1["orga"];?></option>
          <?php
          }
         ?>
    </td>
    <td align="center">
      <select name="qual">
        <option selected>All</option>
        <option value="10th">10th standard</option>
        <option value="12th">12th standard</option>
        <option value="graduate">Graduate</option>
        <option value="masters">Masters</option>
        <option value="php">PHD</option>
      </select>
    </td>
  </tr>
</table>
<hr>
<br/><br/><br/>
