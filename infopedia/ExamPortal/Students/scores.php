<?php
include("dbconnect.php");
session_start();
if(!isset($_SESSION['mail']))
{
  header('Location:studLogin.php');
}
else
{
  include_once("retrieveData.php");
 ?>
<html>
<head>
  <title>Scores</title>
  <script>
  function scoreOn()
  {
    document.getElementById("scoreTable").style.display="table";
    document.getElementById("analysisTable").style.display="none";
  }
  function analysisOn()
  {
    document.getElementById("scoreTable").style.display="none";
    document.getElementById("analysisTable").style.display="table";
  }
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
  </script>
  <style>
  #title{
    width: 100%;
    height: 40px;
    margin-top:100px;
    border-radius: 10px 10px 0px 0px;
    background:linear-gradient(to bottom,rgba(125, 60, 152, 0.2),rgba(125, 60, 152, 1));
  }
  #inner{
    width: 100px;
    height: 35px;
    margin-top: -13px;
    background-color: #FFFDFD;
    margin-left: 30px;
    border: 1px #7D3C98;
    border-style: solid solid none solid;
    border-radius: 8px 8px 0px 0px;
    text-align: center;
    font-size: 22px;
    font-family: Franklin Gothic Book;
    }
    #selectionArea{
      width: 99.8%;
      height: 180px;
      background: linear-gradient(to bottom,rgba(242, 215, 213, 0.2),rgba(242, 215, 213, 1));
      border-radius: 6px;
      border: 1px #F5B7B1;
      border-style: none solid solid solid;
    }
    #selection{
      width: 400px;
      height: 40px;
      background-color: white;
      border-radius: 8px;
    }
    #buttonSet{
      margin-top: 30px;
      margin-left: 30px;
      float: left;
    }
    .selectButs{
      font-size: 15px;
      width: 250px;
      height: 60px;
      border-radius: 50px;
      transition:0.8s;
      background:linear-gradient(to bottom,rgba(169, 204, 227, 0.1),rgba(169, 204, 227, 0.8));
    }
    .selectButs:hover{
      background: linear-gradient(to bottom,rgba(26, 0, 234, 0.2),rgba(26, 0, 234, 0.5));
      color: white;
      font-size: 20px;
    }
    #displaySection{
      width: 99.8%;
      margin-top: 1px;
      background: linear-gradient(to top,rgba(242, 215, 213, 0.2),rgba(242, 215, 213, 1));
      border-radius: 6px;
      border: 1px #F5B7B1;
      border-style: solid solid solid solid;
    }
    #scoreTable{
      display: table;
    }
    #analysisTable{
      display: none;
    }
    #QuestTable,#ScoreTable{
      margin-top: 30px;
      width: 80%;
      margin-bottom: 30px;
    }
    #catDet{
      font-size: 20px;
      padding: 7px 7px;
      border-top-right-radius: 8px;
      border-bottom-right-radius: 8px;
    }
    input:hover,button:hover{
      cursor: pointer;
    }
    td{
      background-color: white;
    }
    th{
      background:linear-gradient(to bottom,rgba(0, 18, 255, 0.2),rgba(0, 18, 255, 0.4));
      color: #C10000;
      font-family: Calibri;
      font-size: 18px;
    }
    select{
      font-size: 20px;
      width: 350px;
      height: 40px;
      border-bottom-left-radius: 8px;
      border-top-left-radius: 8px;
    }
  </style>
</head>
<body>
  <div id="title"><br/>
    <div id="inner">
      <b>SCORES</b>
    </div>
  </div>
  <div style="width:100%;" align="center">
  <div id="selectionArea" align="center">
    <br/><br/>
    <div id="selection">
      <div id="cat_select" align="center">
        <form action="" method="get">
          <select name="cat" id="categorySelect">
            <?php include_once("catGiven.php"); ?>
          </select>
        <input type="submit" name="catDet" id="catDet" value="Go" onclick="JavaScript:return validate();"/>
       </form>
      </div>
    </div>
    <div id="buttonSet">
      <button type="button" class="selectButs" id="scoreCard" onclick="scoreOn();">Score Card</button>
      <button type="button" class="selectButs" id="questionAnalysis" onclick="analysisOn();">Question-Wise Analysis</button>
    </div>
  </div>
  </div>

  <div style="width:100%;" align="center">
  <div id="displaySection">
    <?php
    include_once("analyzeQuest.php");
    include_once("scoreCard.php");
     ?>
  </div>
  </div>
</body>
</html>
<?php
}
 ?>
