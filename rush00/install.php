<?php

$conn = mysqli_connect("localhost", "msarapii", "Inn3315400371");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "DROP DATABASE `rush00`";
    if (mysqli_query($conn, $sql)) {
        echo "Database dropped successfully" . "<br>";
    } else {
        echo "Error dropping database: " . mysqli_error($conn) . "<br>";
    }
    mysqli_close($conn);

function ft_create_db()
{
    $conn = mysqli_connect("localhost", "msarapii", "Inn3315400371");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "CREATE DATABASE IF NOT EXISTS `rush00`";
    if (mysqli_query($conn, $sql)) {
        echo "Database created successfully" . "<br>";
    } else {
        echo "Error creating database: " . mysqli_error($conn) . "<br>";
    }
    mysqli_close($conn);
}

ft_create_db();

$filename = 'rush00.sql';
$mysql_host = 'localhost';
$mysql_username = 'msarapii';
$mysql_password = 'Inn3315400371';
$mysql_database = 'rush00';
$connection = mysqli_connect($mysql_host, $mysql_username, $mysql_password, $mysql_database);
if (mysqli_connect_errno())
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
$templine = '';
$fp = fopen($filename, 'r');
while (($line = fgets($fp)) !== false) {
	if (substr($line, 0, 2) == '--' || $line == '')
		continue;
	$templine .= $line;
	if (substr(trim($line), -1, 1) == ';') {
		if(!mysqli_query($connection, $templine)){
			print('Error performing query \'<strong>' . $templine . '\': ' . mysqli_error($connection) . '<br /><br />');
		}
		$templine = '';
	}
}
mysqli_close($connection);
fclose($fp);
