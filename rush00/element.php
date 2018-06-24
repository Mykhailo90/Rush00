<?php
  session_start();
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
session_start();

include 'db_connect.php';

$sql = "SELECT * FROM goods";
$result = mysqli_query($db, $sql);
mysqli_close($db);

$ar_goods = array();
if($result)
{
  //Получаем количество элементов
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
            </p><form class="" action="basket.php" method="post"><input type="submit"
            onClick="parent.location.reload(); 2000"
            value="Купить" class="sale" name="'.$row[id].'"></form>
            </div>' ;
    }
    mysqli_free_result($result);
  }
?>


</form>
</div>
</div>
