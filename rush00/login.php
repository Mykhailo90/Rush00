<?php
session_start();

require_once 'db_connect.php';

if(isset($_POST['submit']) && isset($_POST['login']) && $_POST['login'] != "")
{
  $login = $_POST['login'];
  $sql = "SELECT password FROM users WHERE name='$login'";
  $res = mysqli_query($db, $sql);
  if (!$res)
    echo "PROBLEM";
  $row = mysqli_fetch_assoc($res);
    if (password_verify($_POST['password'], $row['password']))
    {
        $_SESSION['name'] = $login;
        setcookie('name', $_SESSION['name'], time() + (86400 * 30), "/");
       if ($login == "admin")
            header("Location: admin_main.php");
        else
          header("Location: index.php");
    }
    else
        print "Вы ввели неправильный логин/пароль";
}
else
  print "Вы ничего не ввели!";
?>
