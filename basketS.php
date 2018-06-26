<?php
session_start();

if (!isset($_SESSION['name']) || $_SESSION['name'] == "")
{
  echo "Необходимо зарегестрироваться!";
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
    .disp{
      display: none;
    }
    .mega_cont:last-child{
      margin-bottom: 100px;
    }
    .sale{
      padding: 10px 24px;
      border: solid 2px blue;
    }
    .buttom1{
      width: 300px;
      height: 40px;
      background-color: lightblue;
      color: blue;
      font-size: 120%;
      text-align: center;
      margin: auto;
    }
    </style>
</head>
<div class="mega_cont">
<div class="buttom1">
  <form class="buttom1" action="zakaz.php" method="post">
    <input type="submit" class="buttom1" name="send" value="Отправить!">
      <?php
        $sid = session_id();
        echo '<input type="hidden" name="'.$_SESSION['name'].'" value="'.$sid.'">';
       ?>
  </form>
</div>
<?php
$sid = session_id();
include 'db_connect.php';

$sql = "
        SELECT * FROM basket WHERE sid LIKE '%{$sid}%'
        ;";
$result = mysqli_query($db, $sql);
$rows = mysqli_num_rows($result);

for ($i = 0 ; $i < $rows ; ++$i)
{
  $row = mysqli_fetch_assoc($result);
  echo '<div class="element">
        <div class="img">
        <img class="el" src="'.$row['img'].'">
        </div><p>'.$row['monufact'].'
        </br>'.$row['position'].'
        </br>'.$row['amount'].'
        </br><strong>'.$row['price'].'</strong>
        </p><form class="" action="basket_del.php" method="post"><input type="submit"
        onClick="parent.location.reload(); 2000"
        value="Удалить" class="sale" name="'.$row[id].'"></form>
        </div>' ;
}
mysqli_free_result($result);
include 'footer.php';
?>
