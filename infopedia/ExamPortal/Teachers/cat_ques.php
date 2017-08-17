<?php
session_start();
if(isset($_SESSION['name']))
{
  $organization=$_SESSION['Organization'];
include_once("dbconnect.php");
if(isset($_GET['name']))
{
  $name=$_GET['name'];
}
else {
  header('Location:cat_page.php');
}
$sqlT="SELECT `organization`,`markQuestCorrect`,`markQuestIncorrect`,`totTime` FROM `category` WHERE `catName`='$name'";
$rslT=mysqli_query($connect,$sqlT);
if($rowT=mysqli_fetch_assoc($rslT))
{
 ?>
<html>
<head>
  <title><?php echo $name;?> Page</title>
<script type="text/javascript">
function on()
{
  document.getElementById("overlay").style.display = "block";
}
function off()
{
  document.getElementById("overlay").style.display = "none";
}
function catDetOn()
{
  document.getElementById("catDetOV").style.display = "block";
}
function catDetOff()
{
  document.getElementById("catDetOV").style.display = "none";
}
function isValid()
{
  var nam=(document.getElementById('catname').value).trim();
  var cor=(document.getElementById('markCor').value).trim();
  var incor=(document.getElementById('markIncor').value).trim();
  var time=(document.getElementById('totTime').value).trim();
  if(nam=="" || cor=="" || incor=="" || time=="")
  {
    alert("Field(s) missing!");
    return false;
  }
  else {
    catDetOff();
    return true;
  }
}
function validate()
{
  var q=(document.getElementById('quest').value).trim();
  var op1=(document.getElementById('opt1').value).trim();
  var op2=(document.getElementById('opt2').value).trim();
  var op3=(document.getElementById('opt3').value).trim();
  var op4=(document.getElementById('opt4').value).trim();
  var cop=(document.getElementById('copt').value).trim();
  if(q=="" || op1=="" || op2=="" || op3=="" || op4=="" || cop=="--select--")
  {
    alert("Field(s) missing!");
    return false;
  }
  else {
    off();
    return true;
  }
}

</script>
<style>
button{
  cursor: pointer;
}
#top{
  width: 100%;
}
.cat_but{
  border-radius: 10px;
  font-size: 16px;
  border: none;
  text-align: center;
   text-decoration: none;
   color: white;
   display: inline-block;
   transition-duration: 0.4s;
}
.cat_but:hover{
  opacity: 0.8;
}
#cat_field{
margin-left: 10%;
margin-top: 5px;
width: 80%;
max-width: 1322px;
height: 80%
border: 2px solid;
}
#cat_tab{
  width: 80%;
}
#cat_name{
  margin-top: 20px;
}
#questions,#detailCat{
  margin-left: 10%;
  margin-top: 20px;
  width: 80%;
  height: 80%
  border: 2px solid;
}
#quest{
  margin: 20px;
}
textarea{
  overflow: hidden;
}
legend{
  font-size: 25px;
}
#overlay {
    position: fixed;
    display: none;
    width: 80%;
    height: 80%;
    top: 10%;
    left: 10%;
    right: 0;
    bottom: 0;
    background-color: rgba(253, 254, 254,1);
    box-shadow: 10px 10px 50px 20px black;
    border-radius:10% 0px 10% 0px;
    transition-duration: 0.4s;
}
#catDetOV{
  position: fixed;
  display: none;
  width: 50%;
  height: 39%;
  top: 10%;
  left: 10%;
  right: 0;
  bottom: 0;
  background-color: rgba(253, 254, 254,1);
  box-shadow: 10px 10px 50px 20px black;
  border-radius:10% 0px 10% 0px;
}
</style>
</head>
<title>Edit Cat& add quest</title>
<!--<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">-->
<!---->
<!--<!-- MetisMenu CSS -->
<!--<link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">-->
<!---->
<!--<!-- Social Buttons CSS -->
<!--<link href="vendor/bootstrap-social/bootstrap-social.css" rel="stylesheet">-->
<!---->
<!--<!-- Custom CSS -->
<link href="dist/css/sb-admin-2.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<body>
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
<div class="navbar-header">
<!--    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">-->
    <!--      <span class="icon-bar"></span>-->
    <!--      <span class="icon-bar"></span>-->
    <!--      <span class="icon-bar"></span>-->
    </button>
  </div>
  <a href="cat_page.php">
    <div class="panel-footer">
      <span class="pull-right"></span>
      <span class="pull-left"><i class="fa fa-arrow-circle-left fa-3x"></i></span></a>
  <h1 style="text-align: center">NOTES WILL GO HERE</h1>
  <div class="clearfix"></div>
  </div>

<!--  <div <a id ="user" style="text-align: center">--><?php //echo "Welcome, $fname<br/>$organization"; ?><!--</a></div><br/>-->
<!--  <form action="submit.php" method="post">-->
<!--    <button type="submit" name="logout" style="float: right; color: #2b542c">Logout</button>-->
<!--  </form>-->

</nav>

<div id="overlay">
    <fieldset id="questions">
      <legend>New Question Entry</legend>
      <form id="new_quest" action="new_quest.php" method="post">
    <div align="center">
      <br/>
      Question <span style="color:#FB0000">*</span><br/>
      <textarea id="quest" name="quest" wrap="soft" rows="5" cols="150" maxlength="255" placeholder="Enter Question" autofocus></textarea><br/>
      Option 1 <span style="color:#FB0000">*</span><br/>
    </br><textarea id="opt1" name="opt1" wrap="soft" rows="2" cols="50" maxlength="100" placeholder="Choice One"></textarea><br/>
      Option 2 <span style="color:#FB0000">*</span><br/>
    </br><textarea id="opt2" name="opt2" wrap="soft" rows="2" cols="50" maxlength="100" placeholder="Choice Two"></textarea><br/>
      Option 3 <span style="color:#FB0000">*</span><br/>
    </br><textarea id="opt3" name="opt3" wrap="soft" rows="2" cols="50" maxlength="100" placeholder="Choice Three"></textarea><br/>
      Option 4 <span style="color:#FB0000">*</span><br/>
    </br><textarea id="opt4" name="opt4" wrap="soft" rows="2" cols="50" maxlength="100" placeholder="Choice Four"></textarea><br/><br/>
    Select the correct option <span style="color:#FB0000">*</span><br/>
    <select name="option" id="copt">
    <option>--select--</option>
    <option>1</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
    </select>
    <br/>
    <br/>
      <button id="ov_done" form="new_quest" type="submit" name="doneBut" value="<?php echo $name ?>" onclick="JavaScript:return validate();">Done</button>
      <button id="ov_cancel" type="reset" onclick="off();">Cancel</button>
  </div>
  </form>
  </fieldset>
  </div>

  <div id="catDetOV">
    <fieldset id="detailCat">
      <legend>Category Details</legend>
      <form id="catDetails" method="post" action="updateCat.php">
        <div align="center">
          <br/><br/>
          Category Name: <input type="text" name="catname" id="catname" value="<?php echo $name ?>" autofocus autocomplete="off"/>
          <br/><br/>
          Marks for each correct entry: <input type="text" name="markCor" id="markCor" autocomplete="off" value="<?php echo $rowT["markQuestCorrect"]; ?>" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/>
          <br/><br/>
          Marks for each incorrect entry: (-)<input type="text" name="markIncor" id="markIncor" autocomplete="off" value="<?php echo $rowT["markQuestIncorrect"]; ?>" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/>
          <br/><br/>
          Total Time: <input type="number" name="totTime" id="totTime" step="10" value="<?php echo ((float)$rowT["totTime"])/60; ?>" onkeypress='return event.charCode >= 48 && event.charCode <= 57' autocomplete="off"/>(in minutes)
          <br/><br/>
          <button form="catDetails" type="submit" name="update" id="update" value="<?php echo $name ?>" onclick="JavaScript:return isValid();">Update</button>
          <button type="reset" form="catDetails" onclick="catDetOff();">Cancel</button>
        </div>
      </form>
    </fieldset>
  </div>

<div id="bod">
<div id="top" align="center">
  <table id="cat_name" cellspacing="10" cellpadding="10">
    <tr>
      <td rowspan="3" colspan="5" align="center">
        <h2 id="setCat" style="cursor:not-allowed; text-align:" name="setCat"><br/>

          <br>
          <br>
          <?php
          echo $name;
           ?>
         </h2>
      </td>
      <td>
<!--        <div class="panel panel-default">-->
<!--        <div class="panel-body">-->
        <?php
        if(($rowT["organization"]==$organization) || ($organization=="ADMIN"))
        {?>
          <button type="button" onclick="catDetOn();" class="btn btn-outline btn-primary">Edit Category Details</button>
<!--          <button class="cat_but" onclick="catDetOn();" style="background-color:#F8FF0E;">Edit Category<br/>Details</button>-->
          <?php
        }
        else{?>
          <button class="cat_but" style="background-color:#F8FF0E; cursor:not-allowed;" disabled>Edit Category<br/>Details</button>
          <?php
        }?>
      </td>

      <td>
        <?php
        if(($rowT["organization"]==$organization) || ($organization=="ADMIN"))
        {?>
        <button class="btn btn-outline btn-primary" onclick="on();" >Add Question</button>
          <?php
        }
        else{?>
        <button class="cat_but" style="background-color:#37EA0A; cursor:not-allowed;" disabled>Add<br/>Question</button>          <?php
        }?>
      </td>
    </tr>
</div>
  </table>
</div>
  </div>
</div>

<fieldset id="questions">
  <legend>Questions</legend>
  <?php
  include_once("dispQuestTable.php");
    ?>
</fieldset>
</div>
</body>
</html>
<?php
}
}
else {
  header('Location:teacherLogin.php');
}
?>
