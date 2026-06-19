<?php

$servidor = "localhost";
$usuario  = "root";
$clave    = "";
$basedatos = "Capitales";


$link = mysqli_connect($servidor, $usuario, $clave, $basedatos)
        or die("No se pudo conectar a la base de datos: " . mysqli_connect_error());

mysqli_set_charset($link, "utf8mb4");
?>
