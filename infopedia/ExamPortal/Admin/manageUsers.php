<?php
include_once("dbconnect.php");
session_start();
if($_SESSION['aname'])
{
 ?>
<html>
<head>
  <title>Users Manager</title>
  <script>
  function ask()
  {
    if(confirm("Are you sure?\nThe user will have to register again!")==true)
    {
      var x=prompt("Please type 'CONFIRM' to proceed");
      if(x=="CONFIRM")
      {
        alert("User will be removed.")
        return true;
      }
      else {
        return false;
      }
    }
    else {
      return false;
    }
  }
  </script>
  <style>
  #cat_field{
  margin-top: 5px;
  width: 90%;
  border: 4px solid;
  }
  #cat_tab{
    width: 90%;
  }
  #students,#teachers{
    float: left;
    width: 50%;
    height: 50%;
    overflow: scroll;
  }
  #overlay1,#overlay2{
    position: fixed;
    width: 300px;
    height: 150px;
    left: 30%;
    background-color: rgba(253, 254, 254,1);
    box-shadow: 10px 10px 50px 20px black;
    border-radius:10% 0px 10% 0px;
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
  option,select{
    width: 100px;
    font-size:15px;
  }
  legend{
    font-size: 20px;
    font-style: italic;
    font-weight: bold;
  }
  body{
    height: 90%;
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
      width: 50%;
  }
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

    <!-- Navigation -->
<!--    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">-->
<!--        <div class="navbar-header">-->
<!--            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">-->
<!--                <span class="sr-only">Toggle navigation</span>-->
<!--                <span class="icon-bar"></span>-->
<!--                <span class="icon-bar"></span>-->
<!--                <span class="icon-bar"></span>-->
<!--            </button>-->
<!--        </div>-->
        <a href="dashadmin.php">
            <div class="panel-footer">
                <span class="pull-right"></span>
                <span class="pull-left"><i class="fa fa-arrow-circle-left fa-3x"></i></span>
                <div class="clearfix"></div>
            </div>
        </a>


  <div style="width:100%; height:20px; background-color:white;"></div>
  <hr style="width:200px">
  <p><b>Manage Users</b></p>
  <hr style="width:200px">
  <br/><br/>
<!--  <div align="center">-->
<!--    <form action="" method="post">-->
<!--      <input type="text" name="searchBar" placeholder="Enter search keyword" style="width:50%; height:30px;"/><br/><br/>-->
<!--      <button type="submit" class="btn btn-primary btn-lg" name="search">Search</button>-->
<!--      --><?php
//      include_once("filterOptions.php");
//       ?>
<!--     </form>-->
      <div align="center">
          <form action="" method="post">
      <form>
          <input type="text" name="searchBar" placeholder="Search.." onkeyup = "showResult(this.value)">
          <div id="livesearch" style="background-color:transparent;width: 130px;"> </div><br>
          <button type="submit" class="btn btn-primary btn-lg" name="search">Search</button>
          <?php
          include_once("filterOptions.php");
          ?>
      </form>

   </div>
   <div id="students">
     <fieldset id="cat_field">
       <legend>Students</legend>
        <?php
        include_once("dispStudentUsers.php"); ?>
      </fieldset>
    </div>
    <div id="teachers">
     <fieldset id="cat_field">
       <legend>Teachers</legend>
       <?php
       include_once("dispTeacherUsers.php"); ?>
     </fieldset>
    </div> 
    <?php
    include_once("overlays.php"); ?>
  </body>
</html>
<?php
}
else
{
  header('Location:adminLogin.php');
}
 ?>
