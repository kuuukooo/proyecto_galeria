<?php
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'proyecto_galeria';

try{
    $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password); 
}catch(PDOException $e){
    die('Conexion Fallida' . $e->getMessage());
}
?>