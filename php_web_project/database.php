<?php
$server = 'localhost';
$username = 'Mulaser';
$password = 'notsosecret';
$database = 'php_web_project';

try{
	$conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch(PDOException $e){
	die( "connection failed: " . $e->getMessage());
	}
?>