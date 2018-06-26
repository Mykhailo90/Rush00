<?php
  session_start();

  if (isset($_SESSION['name']) && $_SESSION['name'] != "admin")
  {
    echo "Для доступа на страницу необходимо пройти регистрацию!";
    header("Location: index.php");
    exit;
  }
?>
<!DOCTYPE html>
<html>
  <head>
  <style media="screen">
  body{
    text-align: center;
    align-content: center;
  }
  ul li{
    list-style: none;
    background-color: lightblue;
  }
  .nav_menu{
    margin: 0px;
    padding: 0px;
  }
  header{
    margin-top: 100px;
    width: 80%;
    font-family: sans-serif;
    margin: auto;
  }
  .nav_menu ul{
    display: flex;
    justify-content: center;

  }
  .fav{
    width: 16px;
    margin-bottom: 0px;
    vertical-align: bottom;
  }
  .nav_menu ul li a{
    display: block;
    background: white;
    padding: 10px 30px 10px 40px;
    font-size: 14px;
    color: black;
    text-decoration: none;
    text-transform: uppercase;
    transition: all 0.3s ease;
    background-color: lightblue;
    vertical-align: center;
  }
  .nav_menu ul li:first-child{
    border-left: 3px solid grey;
  }
  .nav_menu ul li:last-child{
    border-right: 3px solid grey;
  }
  .nav_menu >ul li{
    position: relative;
    border-right: 1px solid grey;
  }
  .nav_menu li a:hover{
    background: lightblue;
    box-shadow: 3px 5px 10px 5px black;
    transition: all 0.3s ease;
  }
  .nav_menu li ul{
    position: absolute;
    align-content: center;
    text-align: center;
    width: 100%;
    left: -40px;
    display: none;
  }
  .nav_menu li ul li{
    border: 3px solid grey;
  }
  .nav_menu li ul li ul{
    position: absolute;
    top: -3px;
  }
  .nav_menu li:hover > ul{
    display: block;
  }
  #f1
  {
    vertical-align: center;
    margin-top: 150px;
  }
  </style>
  </head>
  <body>
    <div class="cont1">
      <h1>Административная панель магазина</h1>
      <?php
      require_once 'get_urls.php';
      echo  '<a href="index.php"><img id="log" src="'.$ar_url[pit4sport_logo]
      .'" alt="Logo_Pit4Sport"></a>';
      ?>
      </div>
      <header>
        <nav class="nav_menu">
          <ul>
              <li><a href="#">Управление категориями</a>
                <ul>
                    <li><a href="add_category.php">Добавить категорию</a></li>
                    <li><a href="remove_category.php">Удалить категорию</a></li>
                </ul>
              </li>
              <li><a href="#">Управление товарами</a>
                <ul>
                    <li><a href="add_product.php">Добавить товар</a></li>
                    <li><a href="dell_product.php">Удалить</a></li>
                    <li><a href="change_product.php">Редактировать</a></li>
                </ul>
              </li>
              <li><a href="#">Управление заказами</a>
                <ul>
                    <li><a href="all_orders.php">Все заказы</a></li>
                    <li><a href="new_orders.php">Новые заказы</a></li>
                    <li><a href="old_orders.php">Выполненные заказы</a></li>
                </ul>
              </li>
              <li><a href="modif.html">Изменить пароль</a></li>
              <li><a href="logout.php">Выход</a></li>
          </ul>
        </nav>
      </header>

      <!-- <img id="f1" src="http://www.pit4sport.com.ua/wp-content/uploads/2016/01/powerpro_whe_2kg.jpg" alt="krasivo"> -->

  </body>
</html>
