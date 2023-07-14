<?php 
$host = "localhost";
$bd = "CIISGYM";
$usuario = "root";
$contrasena = "";

try {
    $conexion = new PDO("mysql:host=$host;port=PUERTO;dbname=$bd", $usuario, $contrasena);
    if($conexion) { 
    }
} catch (Exception $ex) {
    echo $ex->getMessage();
}
?>