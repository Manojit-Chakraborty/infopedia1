<?php
session_start();
if(isset($_SESSION['name']))
{
include_once("dbconnect.php");
 ?>
 <?php
$temp1="";
$Catname="";
$questno="";
$num=1;
while(1)
{
  if(isset($_POST[$num]))
  {
    break;
  }
  $num=$num+1;
}
$questno=$num;
$Catname=$_POST['categoryname'];
    $sql="SELECT * FROM `$Catname` WHERE `questno`='$questno'";
  $rslt=mysqli_query($connect,$sql);
  while($row=mysqli_fetch_assoc($rslt))
  {
?>
<script type="text/javascript">
function validate()
{
  var q=document.getElementById('quest').value;
  var op1=document.getElementById('opt1').value;
  var op2=document.getElementById('opt2').value;
  var op3=document.getElementById('opt3').value;
  var op4=document.getElementById('opt4').value;
  var cop=document.getElementById('copt').value;
  if(q=="" || op1=="" || op2=="" || op3=="" || op4=="")
  {
    alert("Field(s) missing!");
    return false;
  }
  else {
    return true;
  }
}
</script>
<style>
#editQuestions {
    position: fixed;
    width: 80%;
    height: 80%;
    top: 10%;
    left: 10%;
    right: 0;
    bottom: 0;
    border-radius:10px;
    max-height: 600px;
}
textarea{
  overflow: hidden;
}
legend{
  font-size: 25px;
}
</style>
<div id="editQuestions">
  <fieldset id="EDITquestions">
    <legend>Update Question</legend>
    <form id="updateQuest" action="updateQuestion.php" method="post">
  <div align="center">
    <br/>
    Question <span style="color:#FB0000">*</span><br/>
    <textarea id="quest" name="quest" wrap="soft" rows="5" cols="150" maxlength="255" autofocus><?php
    echo $row["quest"];
     ?></textarea><br/>
    Option 1 <span style="color:#FB0000">*</span><br/>
  </br><textarea id="opt1" name="opt1" wrap="soft" rows="2" cols="50" maxlength="100" placeholder="Choice One"><?php
    echo $row["opt1"];
     ?>
   </textarea><br/>
    Option 2 <span style="color:#FB0000">*</span><br/>
  </br><textarea id="opt2" name="opt2" wrap="soft" rows="2" cols="50" maxlength="100" placeholder="Choice Two"><?php
    echo $row["opt2"];
     ?>
   </textarea><br/>
    Option 3 <span style="color:#FB0000">*</span><br/>
  </br><textarea id="opt3" name="opt3" wrap="soft" rows="2" cols="50" maxlength="100" placeholder="Choice Three"><?php
    echo $row["opt3"];
     ?>
   </textarea><br/>
    Option 4 <span style="color:#FB0000">*</span><br/>
  </br><textarea id="opt4" name="opt4" wrap="soft" rows="2" cols="50" maxlength="100" placeholder="Choice Four"><?php
    echo $row["opt4"];
     ?>
   </textarea><br/><br/>
  Select the correct option <span style="color:#FB0000">*</span><br/>
  <select name="option" id="copt">
  <option <?php if($row["optCorrect"]=="1")echo "selected=\"selected\"";?>>1</option>
  <option <?php if($row["optCorrect"]=="2")echo "selected=\"selected\"";  ?>>2</option>
  <option <?php if($row["optCorrect"]=="3")echo "selected=\"selected\"";  ?>>3</option>
  <option <?php if($row["optCorrect"]=="4")echo "selected=\"selected\"";  ?>>4</option>
  </select>
  <br/>
  <br/>
  <input type="hidden" name="categoryname" value="<?php echo $Catname; ?>"/>
  <input type="hidden" name="questno" value="<?php echo $questno ?>"/>
    <button id="ov_done" form="updateQuest" type="submit" name="updateBut" value="<?php echo $questno ?>" onclick="JavaScript:return validate();">Update</button>
    </form>
</div>
</fieldset>
</div><?php
  }
}
else {
  header('Location:teacherLogin.php');
}
?>
