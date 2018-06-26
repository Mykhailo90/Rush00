<head>
  <style>
    .left{
      float: left;
    }
  </style>
</head>
<?php
  require_once 'admin_main.php';
?>
<div class="left">

<?php
include 'db_connect.php';


$sql = "SELECT * FROM orders WHERE aktive = 1;";
$result = mysqli_query($db, $sql);
$rows = mysqli_num_rows($result);

for ($i = 0 ; $i < $rows ; ++$i)
{

  $row = mysqli_fetch_assoc($result);
  echo '<div class="data">'.$row['time_z'].'">
        </div><p>'.unserialize($row['zakaz']).'
        </p>';
}
mysqli_free_result($result);
$sql ="
      UPDATE orders
      SET aktive = 0
      WHERE aktive = 1
      ;";
$result = mysqli_query($db, $sql);


?>
</div>
