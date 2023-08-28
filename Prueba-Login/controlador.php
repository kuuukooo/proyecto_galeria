<?php
session_start(); 

require "./conexion_bd.php";

if (!empty($_POST["btningresar"])) {
    if (empty($_POST["usuario"]) || empty($_POST["password"])) {
        $_SESSION["mensaje"] = 'Complete los campos';
    } else {
        $usuario = $_POST['usuario'];
        $clave = $_POST['password'];
        $sql = $conex->query("select * from usuarios where usuario='$usuario' and clave='$clave' ");
        if ($datos = $sql->fetch_object()) {
            header("location:galeria.php"); 
            exit(); 
        } else {
            $_SESSION["mensaje"] = 'Acceso Denegado';
        }
    }
    header("location:login.php");
    exit();
}

?>