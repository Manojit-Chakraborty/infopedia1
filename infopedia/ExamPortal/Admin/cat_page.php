<?php
$organization="ADMIN";
session_start();
if(isset($_SESSION['aname']))
{
  ?>
<html>
<head>
  <title>Category Page</title>
  <script>
  var flag=1;
  function on() {
    document.getElementById("overlay").style.display = "block";
  }
  function off(){
    document.getElementById("overlay").style.display = "none";
  }
  function validate(){
    var name=document.getElementById('cat_name').value;
    if(name==""){
      alert("Category Name Required!");
      return false;
    }
    else {
      off();
      return true;
    }
  }
  </script>
  <style>
  #newCat{
    font-size: 20px;
    height: 50px;
    border-radius: 10px;
    border: none;
    transition-duration: 0.4s;
    color: white;
  }
  #newCat:hover{
    opacity: 0.8;
  }
  #overlay{
    position: fixed;
    display: none;
    width: 300px;
    height: 150px;
    top: 50%;
    left: 40%;
    background-color: rgba(253, 254, 254,1);
    box-shadow: 10px 10px 50px 20px black;
    border-radius:10% 0px 10% 0px;
  }
  #cat_field{
  margin-left: 10%;
  margin-top: 5px;
  width: 80%;
  height: 80%
  border: 2px solid;
  }
  #cat_tab{
    width: 80%;
  }
  #hints{
    width:80%;
    height:50px;
    background-color: #EC7063;
    color: #FDFEFE;
    text-align: left;
    margin-top: 5px;;
    margin-left: 10%;
    border-radius: 10px 10px 0px 0px;
  }
  .cat_disp{
    font-size: 20px;
    border: 0;
  }
  button{
    cursor: pointer;
  }
  th{
    font-size: 25px;
    text-align: center;
  }
  p{
    text-align: center;
    font-size: 30px;
  }
  input[type=text] {
    width: 130px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: transparent;
    background-image: url('#');
    background-position: 10px 10px;
    background-repeat: no-repeat;
    padding: 12px 20px 12px 40px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;

  }

  input[type=text]:focus {
    color: blue;
    width: 50%;}
  </style>

  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- MetisMenu CSS -->
  <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="dist/css/sb-admin-2.css" rel="stylesheet">

  <!-- Morris Charts CSS -->
  <link href="vendor/morrisjs/morris.css" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="wrapper">
<a href="dashadmin.php">
  <div class="panel-footer">
    <span class="pull-right"></span>
    <span class="pull-left"><i class="fa fa-arrow-circle-left fa-3x"></i></span>
    <div class="clearfix"></div>
  </div>
</a>
  <div id="overlay" align="center">
    <br/><br/>
    <form id="ov_form" action="new_cat.php" method="post">
    Enter Category Name <span style="color:#FB0000">*</span>&nbsp;
    <input type="text" id="cat_name" name="cat_name" autocomplete="off" autofocus/>
    <br/><br/>
    <button type="submit" form="ov_form" name="done" value="<?php echo $organization; ?>" onclick="JavaScript:return validate();">Done</button>
    <button type="reset" form="ov_form" onclick="off();">Cancel</button>
    </form>
  </div>

<!--  <div style="float:left; position:fixed; margin-top:40px;">-->
<!--    --><?php //include_once("backtoCC.php");?>
<!--  </div>-->
<div id="bod">
  <br/><br/>
  <hr style="width:200px">
  <p><b>Category Manager</b></p>
  <hr style="width:200px">
  <br/><br/>
  <div id="newCat" align="center">
    <button type="button" name="newCat" id="newCat" align="center" style="background-color:#37EA0A;" onclick="on();">Add New Category</button><br/><br/>
    <form action="" method="post">
      <input type="text" name="searchBar" placeholder="Search..">
      <div id="livesearch" style="background-color:transparent;width: 130px;"> </div><br>
      <button type="submit" class="btn btn-primary btn-lg" name="search">Search</button>
<!--    <input type="text" name="searchBar" placeholder="Enter search keyword" style="width:50%; height:30px;"/><br/><br/>-->
<!--    <button type="submit" name="search">Search</button>-->
    </form>
  </div>
<br/><br/><br/><br/><br/>
  <fieldset id="cat_field" style="margin-top: 100px">
    <legend>Category list</legend>
    <?php
    include_once("dispCatTable.php");
      ?>
  </fieldset>
</div>
</body>
</html>
<?php
}
else {
header('Location:adminLogin.php');
}
?>
