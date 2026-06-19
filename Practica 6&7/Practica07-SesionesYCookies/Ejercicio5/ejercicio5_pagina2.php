<?php
session_start();

$_SESSION["usuario"] = isset($_POST["usuario"]) ? $_POST["usuario"] : "";
$_SESSION["clave"]   = isset($_POST["clave"])   ? $_POST["clave"]   : "";
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <title>Ejercicio 5 - Página 2: Sesión creada</title>
</head>
<body>

<h1>Sesi&oacute;n iniciada</h1>
<p>Se guardaron las variables de sesi&oacute;n <code>usuario</code> y <code>clave</code>.</p>
<p><a href="ejercicio5_pagina3.php">Ir a la P&aacute;gina 3</a></p>

</body>
</html>
