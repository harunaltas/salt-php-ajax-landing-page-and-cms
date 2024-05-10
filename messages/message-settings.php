<?php

$host="localhost";
$dbname = "messages";
$username = "root";
$password = "";

try {
$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8","$username","$password");
	
}catch (PDOException $message) {
	echo $message->getmessage();
}


?>