<?php
if(isset($_GET['success']))
{
  $okVal=$_GET['success'];
  if($okVal)
  {
    ?>
    <script type="text/javascript">
    alert("Category Created");
    </script>
    <?php
  }
  else {
    ?>
    <script type="text/javascript">
    alert("Duplicate Entry!\nError!!");
    </script>
    <?php
  }
}
if(isset($_GET['stat']))
{
  $okVal=$_GET['stat'];
  if($okVal=="2")
  {
    ?>
    <script type="text/javascript">
    alert("Insert some questions before activation!");
    </script>
    <?php
  }
}
?>
