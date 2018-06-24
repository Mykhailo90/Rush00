<?php
if (!$_SERVER['REQUEST_METHOD'] === 'POST')
{
	echo ("Внимание! Попытка взлома приложения!!!\n");
	exit ();
}
if (!$_POST['login'] || !$_POST['oldpw'] || !$_POST['newpw'] || $_POST['submit'] !== "Изменить")
{
	echo ("ERROR\n");
	exit ();
}

echo "string";
$login = htmlspecialchars(trim($_POST['login']));
$oldpw = htmlspecialchars(trim($_POST['oldpw']));
$newpw = htmlspecialchars(trim($_POST['newpw']));

require_once 'db_connect.php';

$sql = "SELECT * FROM users WHERE name='$_POST[login]'";
$result = mysqli_query($db, $sql);
mysqli_close($db);

$myrow = mysqli_fetch_assoc($result);
if (empty($myrow['id']))
{
    echo "Логин или пароль введены неверно!";
    header('Location: modif.html');
}
mysqli_free_result($result);
if (password_verify($oldpw, $myrow['password']))
{
    include 'db_connect.php';
    $pw = password_hash($newpw, PASSWORD_DEFAULT);
    //Вносим в базу новый пароль
    $sql = "UPDATE users SET password='$pw' WHERE name='$login'";
    $result = mysqli_query($db, $sql);
    mysqli_close($db);
    echo "OK\n";
    header('Location: index.html');
}
else {
  echo "Возникла ошибка, попробуйте снова";
}
header('Location: index.php');
?>
