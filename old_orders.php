<head>
  <style>
  .data{
    color: blue;
  }
  .data p{
      color: black;
      margin-left: 300px;
    }
  </style>
</head>
<?php
  require_once 'admin_main.php';
?>
<div class="left">
<?php
include 'db_connect.php';
$sql = "SELECT * FROM orders WHERE aktive = 0;";
$result = mysqli_query($db, $sql);
$rows = mysqli_num_rows($result);
for ($i = 0 ; $i < $rows ; ++$i)
{
  $row = mysqli_fetch_assoc($result);
  echo '<div class="data">'.$row['time_z'].'
        </div><p>'.unserialize($row['zakaz']).'
        </p>';
}
mysqli_free_result($result);

?>
</div>
