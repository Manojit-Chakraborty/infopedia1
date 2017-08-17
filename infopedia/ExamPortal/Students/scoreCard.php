<?php
if(isset($_GET['cat']))
{
 ?>
<div id="scoreTable">
  <div id="legend" style="position:fixed; margin-left:-100px;">
    <table align="left" rules="rows">
      <tr>
        <td colspan="3" style="background-color:inherit;">
          Score for every correct
        </td>
        <td style="background-color:inherit;">
          :
        </td>
        <td style="background-color:inherit;">
          <?php echo $markOnCorrect; ?>
        </td>
      </tr>
      <tr>
        <td colspan="3" style="background-color:inherit;">
          Score for every incorrect
        </td>
        <td style="background-color:inherit;">
          :
        </td>
        <td style="background-color:inherit;">
          <?php echo $markOnIncorrect; ?>
        </td>
      </tr>
    </table>
  </div>
  <table id="ScoreTable" cellpadding="10" cellspacing="3">
    <tr>
      <th colspan="8">
        Test Duration(in mins)
      </th>
      <td colspan="5" align="center">
        <?php echo $duration/60; ?>
      </td>
    </tr>
    <tr>
      <th colspan="8">
        Total Number of Questions
      </th>
      <td colspan="5" align="center">
        <?php echo $totQuest; ?>
      </td>
    </tr>
    <tr>
      <th colspan="8">
        Correct Entries
      </th>
      <td colspan="5" align="center">
        <?php echo $corr; ?>
      </td>
    </tr><tr>
      <th colspan="8">
        Incorrect Entries
      </th>
      <td colspan="5" align="center">
        <?php echo $incorr; ?>
      </td>
    </tr>
    <tr>
      <th colspan="8">
        Unattempted
      </th>
      <td colspan="5" align="center">
        <?php echo $unattempt; ?>
      </td>
    </tr>
    <tr>
      <th colspan="8">
        Attempted
      </th>
      <td colspan="5" align="center">
        <?php echo $attempt; ?>
      </td>
    </tr>
    <tr>
      <th colspan="8">
        % Accuracy
      </th>
      <td colspan="5" align="center">
        <?php printf("%0.2d",$accuracy); ?>
      </td>
    </tr>
    <tr>
      <th colspan="8" style="color:black; font-size:20px;">
        Overall Score
      </th>
      <td colspan="5" align="center" style="font-size:20px;">
        <b><?php echo $overallScore; ?></b>
      </td>
    </tr>
  </table>
</div>
<?php
}
 ?>
