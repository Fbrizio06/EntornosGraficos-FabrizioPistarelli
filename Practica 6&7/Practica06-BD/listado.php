<?php include "conexion.php"; ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <title>Listado de Ciudades</title>
</head>
<body>

<h1>Listado de Ciudades (sin paginaci&oacute;n)</h1>
<p><a href="index.html">Volver al men&uacute;</a></p>

<table border="1" cellpadding="5">
  <tr>
    <th>ID</th>
    <th>Ciudad</th>
    <th>Pa&iacute;s</th>
    <th>Habitantes</th>
    <th>Superficie (km&sup2;)</th>
    <th>Tiene Metro</th>
    <th>Acciones</th>
  </tr>

  <?php
  $sql = "SELECT id, ciudad, pais, habitantes, superficie, tieneMetro FROM ciudades ORDER BY id";

  $vResultado = mysqli_query($link, $sql)
                or die("Error en la consulta: " . mysqli_error($link));

  while ($fila = mysqli_fetch_array($vResultado)) {
  ?>
    <tr>
      <td><?php echo $fila["id"]; ?></td>
      <td><?php echo $fila["ciudad"]; ?></td>
      <td><?php echo $fila["pais"]; ?></td>
      <td><?php echo $fila["habitantes"]; ?></td>
      <td><?php echo $fila["superficie"]; ?></td>
      <td><?php echo ($fila["tieneMetro"] == 1) ? "S&iacute;" : "No"; ?></td>
      <td>
        <a href="modificar.php?id=<?php echo $fila["id"]; ?>">Modificar</a> |
        <a href="baja.php?id=<?php echo $fila["id"]; ?>">Eliminar</a>
      </td>
    </tr>
  <?php
  }

  mysqli_free_result($vResultado);
  mysqli_close($link);
  ?>

</table>

</body>
</html>
