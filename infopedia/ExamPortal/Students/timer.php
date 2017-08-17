<html>
<head>
<?php
session_start();
$timerM;$timerS;
$currentTime=strtotime(date("h:i:sa"));
$timerM=floor(($_SESSION['TIMER']-$currentTime)/60);
$timerS=floor(($_SESSION['TIMER']-$currentTime)%60);
echo "Timer:- $timerM:";printf("%02d",$timerS );echo "mins";

if(($timerM==0 && $timerS==0))
{
  ?>
  <meta http-equiv="refresh" content = "1; url=prepareData.php?given=1" />
  <?php
}
 ?>
 </head>
</html>
