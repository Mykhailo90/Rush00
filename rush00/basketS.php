<?php
session_start();

if (!isset($_SESSION['name']) || $_SESSION['name'] == "")
{
  echo "Необходимо зарегестрироваться!";
  exit();
}
if ($_SESSION['goods_count'] < 1){
  echo "Вы еще не добавили товары в корзину!";
  exit();
}
?>
<link rel="stylesheet" href="header.css">
<?php
include 'header.php';
?>
<head>
  <style media="screen">
    .element{
      border: solid 2px blue;
      text-align: center;
      width: 200px;
      height: 310px;
      float: left;
      margin: 30px;
      box-shadow: 5px 10px #888888;
    }
    .element:hover {
      -webkit-transform: scale(1.2);
      -ms-transform: scale(1.2);
      transform: scale(1.2);
      transition: 0.5s;
    }
    .el{
      width: 150px;
    }
    .mega_cont
    {
      margin: auto;
      display: inline;
    }
    .mega_cont:last-child{
      margin-bottom: 100px;
    }
    .sale{
      padding: 10px 24px;
      border: solid 2px blue;
    }
    </style>
</head>
<div class="mega_cont">
<?php
$sid = session_id();
include 'db_connect.php';
echo "$sid";
echo '$sql = "SELECT * FROM basket WHERE sid = $sid"';
$result = mysqli_query($db, $sql);
if ($result)
echo "GOOD";
include 'footer.php';
?>
