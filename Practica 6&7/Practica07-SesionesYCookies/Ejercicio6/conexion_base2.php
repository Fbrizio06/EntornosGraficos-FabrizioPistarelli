<?php
$link = mysqli_connect("localhost", "root", "", "base2")
        or die("No se pudo conectar a la base de datos: " . mysqli_connect_error());

mysqli_set_charset($link, "utf8mb4");
?>
