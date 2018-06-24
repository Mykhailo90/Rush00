<?php
session_start();
  foreach ($_POST as $key => $value) {
    "$key--->>>$value";
  }
  $_SESSION['v'] = $value;
  $_SESSION['k'] = $key;
?>
<head>
<link rel="stylesheet" href="header.css">
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
  function make_content($key, $value)
  {
      session_start();
      if ($key == "" || $value == "")
        header('Location: index.php');
      else {
        include 'db_connect.php';

// Получить ид продуктов для финальной выборки или сделать тройной запрос

        $sql = "
              SELECT id_food FROM foods_categ
              WHERE foods_categ.id_categ = $key
              ;";
        $result = mysqli_query($db, $sql);
        $sql = "
                SELECT * FROM goods
                WHERE";
        $row = mysqli_fetch_all($result);
  
        for ($i=0; $i < count($row); $i++) {
          $sql .= " id = " . $row[$i][0];
          if ($i < count($row) - 1)
            $sql .= " OR";
        }
        $sql .= ";";
        $result = mysqli_query($db, $sql);
        $rows = mysqli_num_rows($result);
          // Получаем количество элементов
        for ($i = 0 ; $i < $rows ; ++$i)
        {
            mysqli_close($db);
            $row = mysqli_fetch_assoc($result);
            if ($row[id] )
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
}
  require_once 'header.php';
  make_content($_SESSION['k'], $_SESSION['v']);
  require_once 'footer.php';
 ?>
