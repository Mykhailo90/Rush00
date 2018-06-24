<?php
  session_start();
  foreach ($_POST as $key => $value) {
    $id_good = $key;
  }

  if (!isset($i))
    $i = 0;
  $sid = session_id();
  $_SESSION['goods'] = $id_good;
  $_SESSION['goods_count'] += 1;

  $usr["sid"] = $sid = session_id();

  include 'db_connect.php';
  $sql = "SELECT * FROM goods WHERE id = $id_good;";
  $result = mysqli_query($db, $sql);
  $us_basket = array();
  if($result)
  {
      $rows = mysqli_num_rows($result);
      for ($i = 0 ; $i < $rows ; ++$i)
      {
        $row = mysqli_fetch_assoc($result);
        $us_basket['id'] = $id_good;
        $us_basket['price'] = $row['price'];
        $us_basket['position'] = $row['position'];
        $us_basket['monufact'] = $row['monufact'];
        $us_basket['img'] = $row['img'];
        $us_basket['amount'] = $row['amount'];
      }
      $_SESSION['all_check'] += $us_basket['price'];
      $sql = "
      INSERT INTO basket (`sid`, `id_good`, `price`, `position`, `monufact`, `amount`, `img`)
      VALUES
      ('$sid', $us_basket[id], $us_basket[price], '$us_basket[position]', '$us_basket[monufact]', '$us_basket[amount]', '$us_basket[img]')
      ;";
      $z = mysqli_query($db, $sql);
    }
mysqli_close($db);
header('Location: index.php');
?>
