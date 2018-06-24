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
$sid = session_id();
foreach ($_SESSION[$id] as $key => $value) {
  echo "$value";
}

include 'db_connect.php';
$xaaa = session_id();


$sql = "SELECT * FROM basket WHERE sid = $xaaa";
$result = mysqli_query($db, $sql);

if ($result)
{
  echo "YRA";
  $rows = mysqli_num_rows($result);
  echo "$rows";
  foreach ($variable as $key => $value) {
    # code...
  }
}
while ($row = mysqli_fetch_array('$result')) {
  $sql = "SELECT * FROM goods WHERE id = $row['id']";
  $result2 = mysqli_query($db, $sql);
              while ($row = mysqli_fetch_array($result2)) {
                echo '<div class="element">
                      <div class="img">
                      <img class="el" src="'.$row['img'].'">
                      </div><p>'.$row['monufact'].'
                      </br>'.$row['position'].'
                      </br>'.$row['amount'].'
                      </br><strong>'.$row['price'].'</strong>
                      </p><form class="" action="basket.php" method="post"><input type="submit"
                      onClick="parent.location.reload(); 2000"
                      value="Купить" class="sale" name="'.$row['id'].'"></form>
                      </div>' ;
                }
echo "GOOD";
              }
mysqli_close($db);
mysqli_free_result($result);
mysqli_free_result($result2);
?>


</form>
</div>
</div>
