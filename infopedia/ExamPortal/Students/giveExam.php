<?php
session_start();
if(isset($_SESSION['fname']))
{
  $fname=$_SESSION['fname'];
  $email=$_SESSION['mail'];
  ?>
<html>
<head>
  <title>
    Exam Options
  </title>
  <script>
  function validate()
  {
    var opt=document.getElementById('categorySelect').value;
    if(opt=="Select Category" || opt=="No Category Available")
    {
      alert("Request cannot be processed");
      off();
      return false;
    }
    else {
      on();
      return true;
    }
  }
  function start()
  {
    if(confirm("The exam will end only when user prompts or time ends.")==true)
    {
      return true;
    }
    else {
      return false;
    }
  }
  function on() {
    document.getElementById("dispCatDet").style.display = "table";
  }
  function off(){
    document.getElementById("dispCatDet").style.display = "none";
  }
  </script>
  <style>
  #cat_select{
    margin-top: 5%;
  }
  #dispCatDet{
    position: relative;
    width:500px;
    height: 400px;
    top: 10%;
    left: 35%;
    background-color: rgba(253, 254, 254,1);
    box-shadow: 20px 15px 50px 10px #AAB7B8;
    border-radius:10% 10% 0px 0px;
  }
  #start{
    position: relative;
    font-size: 25px;
    border-radius: 5px;
    color: white;
    background-color: #3498DB;
    width: 100%;
    padding:15px;
    transition-duration: 1s;
  }
  #start:hover{
    background-color: #002DFF;
  }
  #catDet{
    font-size: 20px;
    padding: 10px 15px;
  }
  td,th{
    font-size: 30px;
  }
  select{
    font-size: 20px;
    width: 400px;
    height: 50px;
  }
  body{
    background-color: #D5F5E3;
  }
  </style>
</head>
<body>
  <div id="user"><?php echo "Welcome, $fname<br/>$email"; ?></div>
  <form action="submit.php" method="get">
    <input type="submit" name="logout" value="Logout"/>
  </form>
  <a href="scores.php">Score Page</a>
<div id="cat_select" align="center">
  <form id="catDetailsShow" action="" method="post">
<select name="categorySelect" id="categorySelect">
  <?php
  include_once("catAvailable.php");
   ?>
 </select>
 <input type="submit" name="catDet" id="catDet" value="Go" onclick="JavaScript:return validate();"/>
 </form>
</div>
<br/><br/>

<?php
$host="localhost";
$username="root";
$password="";
$dbname="db_examportal";
$connect=mysqli_connect($host,$username,$password,$dbname);

$Catname="";$markPos="";$markNeg="";$totTime="";$totQuest="";
if(isset($_POST['categorySelect']))
{
  $Catname=$_POST['categorySelect'];
  $_SESSION['CATEGORY']=$Catname;
  $sql="SELECT * FROM `category` WHERE `catName`='$Catname'";
  $rslt=mysqli_query($connect,$sql);
  $row=mysqli_fetch_assoc($rslt);
  $markPos=$row["markQuestCorrect"];
  $markNeg=$row["markQuestIncorrect"];
  $totTime=$row["totTime"];

  $sql="SELECT `questno` FROM `$Catname`";
  $rslt=mysqli_query($connect,$sql);
  $totQuest=mysqli_num_rows($rslt);
?>
<input type="hidden" value="<?php echo $Catname;?>" name="cateGory"/>
<div id="dispCatDet" align="center"><br/><br/>
  <table cellspacing="10" cellpadding="10" align="center" rules="all">
    <th colspan="4" align="center"><?php echo $Catname;?></th>
    <tr>
      <td colspan="3">Total Questions :</td>
      <td>
        <?php
        echo $totQuest;
        ?>
      </td>
    </tr>
    <tr>
      <td colspan="3">
        Marks for each correct :
      </td>
      <td>
        <?php
        echo $markPos; ?>
      </td>
    </tr>
    <tr>
      <td colspan="3">
        Marks for each incorrect :
      </td>
      <td>
        <?php
        echo "-".$markNeg; ?>
      </td>
    </tr>
    <tr>
      <td colspan="3">
        Total Time (in mins) :
      </td>
      <td>
        <?php
        echo ((float)$totTime)/60; ?>
      </td>
    </tr>
</table>
<br/><br/>
<div align="center">
<form action="prepareData.php" method="post">
<input type="hidden" value="<?php echo $totQuest; ?>" name="total"/>
<button type="submit" name="start" value="<?php echo $Catname;?>" id="start" onclick="JavaScript:return start();">START</button>
</form>
<?php
}
?>
</br>
</div>
</div>
</body>
</html>
<?php
}
else {
  header('Location:studLogin.php');
} ?>
