<?php
include("dbconnect.php");
$email=$_SESSION["mail"];;
if(isset($_GET['cat']))
{
  $_SESSION['CATEGORY']=$_GET['cat'];
  $CAT=$_SESSION['CATEGORY'];
  $t=$email.$CAT;
  $sql="SELECT * FROM `$t`";
  $rslt=mysqli_query($connect,$sql);
?>
  <style>
  #ans{
    border: none;
    background-color: inherit;
    font-size: 15px;
    font-weight: bold;
  }
  #ans:hover{
    color: #B54FEA;
    text-decoration: underline;
  }
  #viewAnswer{
      position: fixed;
      display: none;
      width: 100%;
      height: 100%;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: rgba(0,0,0,0.1);
      font-family: calibri;
  }
  #viewArea{
    position: absolute;
    width: 800px;
    height: 500px;
    margin-top: 10%;
    margin-left: 25%;
    font-size: 15px;
    background-color: #76D7C4;
    border-radius: 15px 15px 0px 0px;
    overflow: auto;
  }
  #BAR{
    width: 100%;
    height: 30px;
    background: linear-gradient(to bottom,rgba(0, 255, 14, 0.5),rgba(0, 255, 14, 0.8));
    border-radius: 15px 15px 0px 0px;
  }
  #exit{
    width: 40px;
    height: 25px;
    padding-top: 2px;
    transition: 0.3s;
    float: right;
    color: #809391;
    border-top-right-radius: 15px;
  }
  #exit:hover{
    background-color: #DE2323;
    color: white;
    cursor: pointer;
  }
  #displayRetrieve{
    font-size: 25px;
    float: left;
    margin-left: 20px;
    overflow: auto;
  }
  </style>
  <script>
  function showDetails(ques)
  {
    document.getElementById("viewAnswer").style.display="block";
    if(window.XMLHttpRequest)
    {
      xmlhttp2=new XMLHttpRequest();
    }
    else
    {
      xmlhttp2=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp2.onreadystatechange=function()
    {
      if(xmlhttp2.readyState==4)
      {
        document.getElementById("optAJAX").innerHTML=xmlhttp2.responseText;
      }
    }
    xmlhttp2.open("GET","viewQuest.php?ans1="+ques,true);
    xmlhttp2.send();
  }
  function off()
  {
    document.getElementById("viewAnswer").style.display="none";
  }
  </script>

<div id="analysisTable">
  <div style="font-size:15px; position:absolute; margin-left:-700px;">
    <b>Note:</b>Click on the question number to open it's solution
  </div>
  <table>
    <tr>
      <td style="background-color:inherit;">
        <img src="Icons\correct.png" width="24px" height="24px"/>
      </td>
      <td style="background-color:inherit;">
        Correct
      </td>
      <td style="background-color:inherit;">
        <img src="Icons\incorrect.png" width="25px" height="25px"/>
      </td>
      <td style="background-color:inherit;">
        Incorrect
      </td>
      <td style="background-color:inherit;">
        <img src="Icons\unattempted.png" width="20px" height="20px"/>
      </td>
      <td style="background-color:inherit;">
        Unattempted
      </td>
    </tr>
  </table>
  <table id="QuestTable" cellpadding="10" cellspacing="3">
    <tr>
      <th colspan="12">
        Question Number
      </th>
      <th colspan="4">
        Status
      </th>
    </tr>
    <?php
    while($rows=mysqli_fetch_assoc($rslt))
    {
      ?>
      <tr>
        <td colspan="12" align="center">
          <form>
          <input type="button" name="ans" id="ans" value="<?php echo $rows["questno"]; ?>" onclick="showDetails(this.value);"/>
          </form>
        </td>
        <td colspan="4" align="center">
          <?php
          $stat=(int)$rows["point"];
          if($stat==1)
          {?>
            <img src="Icons\correct.png" width="24px" height="24px"/>
            <?php
          }
          elseif ($stat==-1)
          {?>
            <img src="Icons\incorrect.png" width="25px" height="25px"/>
            <?php
          }
          else
          {?>
            <img src="Icons\unattempted.png" width="20px" height="20px"/>
            <?php
          }
           ?>
        </td>
      </tr>
      <?php
    }
    ?>
  </table>
</div>

<div id="viewAnswer" align="center">
  <div id="viewArea" align="left">
    <div id="BAR">
    <div id="exit" onclick="off();" align="center">
      <b>X</b>
    </div>
    </div>
    <br/>
    <div id="displayRetrieve">
    <div id="optAJAX"></div>
    </div>
  </div>
</div>

<?php
}
?>
