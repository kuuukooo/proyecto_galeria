<?php

$server = '192.168.12.40';
$username = 'XDD';
$password = 'XDD';
$database = 'galeria';

try{
    $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);

}catch(PDOException $e){
    die('Connection failed: ' . $e->getMessage());
}


?>
