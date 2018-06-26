<?php
session_start();

if ($_SESSION['name'] == 'admin')
{
  $username = "msarapii";
  $psw = "Inn3315400371";
}
else {
  $username = "user1";
  $psw = "TesT12345!Br!!";
}
$servername = "localhost";

//Изменить имя на указанное в файле php.install
$dbname = "rush00";


$db = mysqli_connect($servername, $username, $psw, $dbname);

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}
 ?>
