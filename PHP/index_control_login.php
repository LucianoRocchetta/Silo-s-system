<?php
require 'conexion.php';
session_start();

$usuario = $_POST['usuario'];
$clave = $_POST['password'];

$query = "SELECT COUNT(*) as contar from usuarios where nombre = '$usuario' and pass = '$clave'";
$consulta = mysqli_query($conexion, $query);
$array = mysqli_fetch_array($consulta);


$query2 = "SELECT tipo_usuario from usuarios where nombre = '$usuario' and pass = '$clave'";
$ejecutar = mysqli_query($conexion, $query2);
$row = mysqli_fetch_array($ejecutar);


if($array['contar']>0){
    
    $_SESSION['username'] = $usuario;
    $_SESSION['rol'] = $row['tipo_usuario'];
    $_SESSION['true'] = "true";
    header("location: ../index.php");
}
else{
    header("location: ../login.php");
}

?>