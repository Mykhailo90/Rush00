<?php
  session_start();

    if (isset($_POST['login']))
    {
      $login = $_POST['login'];
      if ($login == '')
        unset($login);
    }
    if (isset($_POST['pass1']))
    {
      $password = $_POST['pass1'];
      if ($password =='')
        unset($password);
    }
      if (isset($_POST['pass2']))
      {
        $password2 = $_POST['pass2'];
        if ($password2 =='')
          unset($password2);
      }
    if (isset($_POST['email']))
    {
      $email = $_POST['email'];
      if ($email == '')
        unset($email);
    }
    if (isset($_POST['phone_number']))
    {
      $phone_number = $_POST['phone_number'];
      if ($phone_number == '')
        unset($phone_number);
    }
    if (empty($login) or empty($password) or empty($email) or empty($phone_number))
      exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    elseif ($password !== $password2)
      exit ("Проверьте корректность ввода пароля!");
    $login = stripslashes($login);
    $login = htmlspecialchars($login);

    $password = stripslashes($password);
    $password = htmlspecialchars($password);

    $email = stripslashes($email);
    $email = htmlspecialchars($email);

    $phone_number = stripslashes($phone_number);
    $phone_number = htmlspecialchars($phone_number);

    $login = trim($login);
    $password = trim($password);
    $password = password_hash($password, PASSWORD_DEFAULT);
    $email = trim($email);
    $phone_number = trim($phone_number);

    require_once 'db_connect.php';

    $sql = "SELECT id FROM users WHERE name='$login'";
    $result = mysqli_query($db, $sql);

    $myrow = mysqli_fetch_assoc($result);


    if (!empty($myrow['id']))
    {
       exit ("Данное имя уже используется в системе.");
    }
    $sql = "INSERT INTO users (name, password, email, phone) VALUES ('$login','$password', '$email', '$phone_number')";
    $result2 = mysqli_query ($db, $sql);


    if ($result2=='TRUE')
    {
      $_SESSION['name'] = $login;
      setcookie('name', $_SESSION[name], time() + (86400 * 30), "/");
      header('Location: index.php');
    }
    else {
      echo "Ошибка! Вы не зарегистрированы.";
   }
    ?>
