<script>
function off()
{
  document.getElementById("overlay").style.display="none";
}
function on()
{
  document.getElementById("overlay").style.display="table";
}
</script>
<style>
#overlay{
  position:fixed;
  width: 30%;
  height: 60%;
  left: 30%;
  bottom: 30%;
  background-color: rgba(253, 254, 254,1);
  box-shadow: 10px 10px 50px 20px black;
  border-radius:10px;
}
#viewTab{
  width: 90%;
  height: 92%;
  background-color: #005FFF;
  color: #FFFFFF;
}
</style>

<div id="overlay" align="center">
  <br/>
  <?php
  $tb="";
  $mail="";
  if(isset($_POST['showTeach']))
  {
    $tb="teacher_login";
    $mail=$_POST['showTeach'];

  }
  elseif (isset($_POST['showStud']))
  {
    $tb="student_login";
    $mail=$_POST['showStud'];
  }
  if(strcmp($tb,"")>0 && strcmp($mail,"")>0){
  $sqlV="SELECT * FROM `$tb` WHERE `email`='$mail'";
  $tb="";
  $mail="";
  $rsltV=mysqli_query($connect,$sqlV);
  if(mysqli_num_rows($rsltV)>0){
  $row=mysqli_fetch_assoc($rsltV);
  ?>
  <table border="2" id="viewTab">
    <tr>
      <td align="center" style="background-color:#1F2B6F;" colspan="7">
        <b>Name</b>
      </td>
    </tr>
    <tr>
      <td align="center" colspan="7">
        <?php echo $row["fname"]; ?>
      </td>
    </tr>
    <tr>
      <td align="center" style="background-color:#1F2B6F;" colspan="7">
        <b>E-mail</b>
      </td>
    </tr>
    <tr>
      <td align="center" colspan="7">
        <?php echo $row["email"]; ?>
      </td>
    </tr>
    <tr>
      <td align="center" style="background-color:#1F2B6F;" colspan="7">
        <b>Organization</b>
      </td>
    </tr>
    <tr>
      <td align="center" colspan="7">
        <?php echo $row["organization"]; ?>
      </td>
    </tr>
    <tr>
      <td align="center" style="background-color:#1F2B6F;" colspan="7">
        <b>Qualification</b>
      </td>
    </tr>
    <tr>
      <td align="center" colspan="7">
        <?php echo $row["qualification"]; ?>
      </td>
    </tr>
    <tr>
      <td align="center" style="background-color:#1F2B6F;" colspan="7">
        <b>Phone</b>
      </td>
    </tr>
    <tr>
      <td align="center" colspan="7">
        <?php echo (int)$row["phone"]; ?>
      </td>
    </tr>
    <tr>
      <td align="center" style="background-color:#1F2B6F;" colspan="7">
        <b>D.O.B.</b>
      </td>
    </tr>
    <tr>
      <td align="center" colspan="7">
        <?php echo $row["dob"]; ?>
      </td>
    </tr>
    <tr>
      <td align="center" style="background-color:#1F2B6F;" colspan="7">
        <b>Gender</b>
      </td>
    </tr>
    <tr>
      <td align="center" colspan="7">
        <?php echo $row["gender"]; ?>
      </td>
    </tr>
    <tr>
      <td align="center" colspan="7" style="background-color:#02898A;">
        <button type="button" onclick="off();" style="width:50%; color:green;" autofocus>OK</buton>
     </td>
    </tr>
  </table>
  <?php
}
$row="";
}
else {
  ?>
  <script>
  off();
  </script>
  <?php
} ?>
</div>
