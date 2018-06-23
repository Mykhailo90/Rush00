<?php
session_start();

$_SESSION["name"] = "";
setcookie('name', "", time() -1, "/");
header('Location: index.php');
?>
