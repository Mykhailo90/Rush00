<?php
session_start();
date_default_timezone_set('Europe/Kiev');
include 'db_connect.php';

$obj['user_id'] = $_SESSION['name'];
$obj['time'] = date('j  F  Y    G:i');
$obj['time'] = $obj['time']."      ";

$sql = "
        SELECT phone, email FROM users WHERE name LIKE '%{$_SESSION['name']}%'
        ;";
$result = mysqli_query($db, $sql);
$rows = mysqli_num_rows($result);

for ($i = 0 ; $i < $rows ; ++$i)
{
  $row = mysqli_fetch_assoc($result);
  $obj['email'] = $row['email'];
  $obj['phone'] = $row['phone'];

}

$str = "-----------------------------------------------------\n".$obj['time'].$obj['user_id']." ".$obj['email']." ".$obj['phone']."\n";

$sql = "
        SELECT * FROM basket WHERE sid LIKE '%{$_SESSION['sid']}%'
        ;";
$result = mysqli_query($db, $sql);
$rows = mysqli_num_rows($result);

for ($i = 0 ; $i < $rows ; ++$i)
{
  $row = mysqli_fetch_assoc($result);
  $str .= $row['monufact'];
  $str .= " ";
  $str .= $row['position'];
  $str .= " ";
  $str .= $row['amount'];
  $str .= " ";
  $str .= $row['price'];
  $str .= "\n";
  }
  $str .= "\n";

mysqli_free_result($result);

$fp = fopen('my_orders', 'a+');
flock($fp, LOCK_EX);
$test = fwrite($fp, $str);
flock($fp, LOCK_UN);
fclose($fp);

$str = serialize($str);

require_once 'db_connect.php';

$sql = "
        INSERT INTO orders (time_z, zakaz, aktive)
        VALUES ('{$obj['time']}', '{$str}', 1)
        ;";
$result2 = mysqli_query($db, $sql);


echo "Ваш заказ успешно доставлен и в ближайшее время будет обработан. В течении 15 минут с Вами свяжется наш менеджер!\n".$obj['time'];
?>
