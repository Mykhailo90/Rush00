<?php
  session_start();
  //Позиция, которую необходимо удалить и вернуть управление обратно на basket sale
  foreach ($_POST as $key => $value) {
    $id_good = $key;
  }

  $_SESSION['goods_count'] -= 1;
  $sid = session_id();

  include 'db_connect.php';

  $sql = "
          SELECT * FROM basket WHERE id = $id_good
          ;";
  $result = mysqli_query($db, $sql);
  $us_basket = array();
  if($result)
  {
    //Получаем количество элементов
      $rows = mysqli_num_rows($result);

      for ($i = 0 ; $i < $rows ; ++$i)
      {
        $row = mysqli_fetch_assoc($result);
        $us_basket['price'] = $row['price'];
      }
      $_SESSION['all_check'] -= $us_basket['price'];

      $sql = "
              DELETE FROM basket
              WHERE id = $id_good
              ;";
      $result = mysqli_query($db, $sql);
    }
    mysqli_close($db);
  header('Location: basketS.php');
?>
