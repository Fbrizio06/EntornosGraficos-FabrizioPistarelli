<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'Capitales';

$mysqli = new mysqli($host, $user, $pass);
if ($mysqli->connect_errno) {
  echo "<p>Error de conexión: {$mysqli->connect_error}</p>";
} else {
  $mysqli->set_charset('utf8mb4');

  $sql = "CREATE DATABASE IF NOT EXISTS `$dbname`
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_spanish_ci";
  if (!$mysqli->query($sql)) {
    echo "<p>Error al crear la base de datos: {$mysqli->error}</p>";
  }

  $mysqli->select_db($dbname);

  $sql = "DROP TABLE IF EXISTS ciudades";
  if (!$mysqli->query($sql)) {
    echo "<p>Error al borrar la tabla vieja: {$mysqli->error}</p>";
  }

  $sql = "CREATE TABLE ciudades (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ciudad VARCHAR(100) NOT NULL,
    pais VARCHAR(100) NOT NULL,
    habitantes INT NOT NULL,
    superficie DECIMAL(10,2) NOT NULL,
    tieneMetro TINYINT(1) NOT NULL DEFAULT 0
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci";
  if (!$mysqli->query($sql)) {
    echo "<p>Error al crear la tabla: {$mysqli->error}</p>";
  }

  $mysqli->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <title>ABML de Ciudades - Menú</title>
</head>
<body>

<h1>Gesti&oacute;n de Ciudades &mdash; Base de Datos "Capitales"</h1>



<ul>
  <li><a href="listado.php">Listado completo (sin paginaci&oacute;n)</a></li>
  <li><a href="listado_paginado.php">Listado con paginaci&oacute;n</a></li>
  <li><a href="alta.php">Alta de ciudad</a></li>
  <li><a href="baja.php">Baja de ciudad</a></li>
  <li><a href="modificar.php">Modificaci&oacute;n de ciudad</a></li>
</ul>

</body>
</html>
