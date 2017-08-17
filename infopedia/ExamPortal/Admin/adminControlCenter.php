<?php
include("dbconnect.php");
session_start();
if($_SESSION['aname'])
{
$sql="SELECT * FROM `temp_teacher`";
$rslt=mysqli_query($connect,$sql);
$pending=mysqli_num_rows($rslt);
 ?>
 <html>
 <head>
   <meta http-equiv="refresh" content="600"/>
   <title>Control Center</title>
   <script>
   function onOrga() {
     document.getElementById("overlayOrga").style.display = "block";
   }
   function on() {
     document.getElementById("overlay").style.display = "block";
   }
   function off(){
     document.getElementById("overlay").style.display = "none";
     document.getElementById("overlayOrga").style.display = "none";
   }
   function validate(){
     var email=document.getElementById('email').value;
     var pass=document.getElementById('pass').value;
     if(email=="" || pass==""){
       alert("Field(s) missing!");
       return false;
     }
     else {
       off();
       return true;
     }
   }
   function validateorga(){
     var orga=document.getElementById('orga_name').value;
     if (orga=="") {
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
   #title{
     background:linear-gradient(to left,rgba(26, 82, 118, 0.3),rgba(26, 82, 118, 1),rgba(26, 82, 118, 0.3));
     position: fixed;
     width: 100%;
     font-size: 50px;
     padding: 20px;
     font-family: AR DESTINE;
     float: left;
     color: white;
   }
   #welcome{
     float: right;
     border: 1px solid #E8DAEF;
     border-radius: 10px;
     width: 200px;
     height: 80px;
     text-align: center;
     background-color: rgba(99, 57, 116, 1);
     color: #FDFEFE;
     font-family: AR ESSENCE;
     font-size: 25px;
     transition-duration: 0.5s;
   }
   #actionDivs{
     width: 100%;
     height: 50%;
     padding-top: 100px;
     display: table;
   }
   #actionTab{
     padding-top: 10px;
     display: table-cell;
     height: 100%;
     width: 100%;
     vertical-align: middle;
   }
   #overlay{
     position: fixed;
     display: none;
     width: 300px;
     height: 200px;
     top: 50%;
     left: 40%;
     background-color: rgba(253, 254, 254,1);
     box-shadow: 10px 10px 50px 20px black;
     border-radius:10% 0px 10% 0px;
   }
   #overlayOrga{
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
   .actionButs{
     width: 500px;
     height: 250px;
     padding: 15px 32px;
     border: 5px solid #2980B9;
     border-radius: 30px;
     color: #671965;
     font-size: 25px;
     background-color: #2980B9;
     transition-duration: 0.7s;
   }
   .actionButs:hover{
     color: white;
     background-color: #0005B9;
   }
   body{
     width: 100%;
     margin: 0px;
     background: linear-gradient(to bottom left,rgba(255,0,0,0), rgba(255,0,0,1));
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

 <a href="dashadmin.php">
   <div class="panel-footer">
     <span class="pull-right"></span>
     <span class="pull-left"><i class="fa fa-arrow-circle-left fa-3x"></i></span>
     <div class="clearfix"></div>
   </div>
 </a>

   <br/><br/>

   <div id="overlay" align="center">
     <br/><br/>
     <form id="ov_form" action="newEntries.php" method="post">
     New ADMIN's email<span style="color:#FB0000">*</span>&nbsp;
     <input type="email" id="email" name="email" autocomplete="off" autofocus/>
     <br/><br/>
     New ADMIN's password<span style="color:#FB0000">*</span>&nbsp;
     <input type="password" id="pass" name="pass" autocomplete="off"/>
     <br/><br/>
     <button type="submit" form="ov_form" name="done" onclick="JavaScript:return validate();">Done</button>
     <button type="reset" form="ov_form" onclick="off();">Cancel</button>
     </form>
     </div>
     <div id="overlayOrga" align="center">
       <br/><br/>
       <form id="ovform" action="newEntries.php" method="post">
       Enter Organization Name <span style="color:#FB0000">*</span>&nbsp;
       <input type="text" id="orga_name" name="orga_name" autocomplete="off" autofocus/>
       <br/><br/>
       <button type="submit" form="ovform" name="done" onclick="JavaScript:return validateorga();">Done</button>
       <button type="reset" form="ovform" onclick="off();">Cancel</button>
       </form>
     </div>

   <div id="actionDivs">
     <br/><br/><br/><br/><br/><br/>
     <div style="vertical-align: middle; display: table-cell; height: 100%; padding-top: 20px;">
     <table align="center" cellspacing="50" style="width:80%;">
       <tr>
<!--         <td align="center" colspan="50%">-->
<!--           <a href="pending.php"><button type="button" class="actionButs a" name="pending">-->
<!--             Pending<sup style="color:red;">--><?php //echo $pending; ?><!--</sup><br/>Registrations-->
<!--           </button></a>-->
<!--         </td>-->
         <td align="center" colspan="50%">
           <button type="button" class="btn btn-primary btn-lg" class="actionButs b" name="newADMIN" onclick="on();">Add New ADMIN</button>
         </td>
       </tr>
       <tr><br><br>
<!--         <td align="center" colspan="50%">-->
<!--           <a href="cat_page.php"><button type="button" class="actionButs c" name="catEdit">Category<br/>Manager</button></a>-->
<!--         </td>-->
         <td align="center" colspan="50%"><br>
           <button type="button" class="btn btn-primary btn-lg" class="actionButs d" name="newOrga" onclick="onOrga();">Add New Organization<br/>(Needs more features)<sup style="color:red;">*</sup></button>
         </td>
       </tr>
       <tr>
<!--         <td colspan="100%" align="center">-->
<!--           <a href="manageUsers.php"><button type="button" class="actionButs e" style="width:1000px;" name="userEdit">Manage Users</button></a>-->
<!--         </td>-->
       </tr>
     </table>
   </div>
   </div>
 </body>
 </html>
 <?php
 }
 else {
   header('Location:adminLogin.php');
 } ?>
