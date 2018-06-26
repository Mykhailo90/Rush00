<?php
session_start();

$_SESSION["name"] = "";
$_SESSION["goods"] = "";
$_SESSION['goods'] = NULL;
$_SESSION['goods_count'] = NULL;
$_SESSION['all_check'] = NULL;
$_SESSION['name'] = NULL;
$_SESSION['v'] = NULL;
$_SESSION['k'] = NULL;
setcookie('name', "", time() -1, "/");

$sid= session_id();

include 'db_connect.php';

$sql = "
        DELETE FROM basket WHERE sid LIKE '%{$sid}%'
        ;";
$result = mysqli_query($db, $sql);
header('Location: index.php');
?>
