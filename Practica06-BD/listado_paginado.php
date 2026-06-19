<?php include "conexion.php"; ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <title>Listado de Ciudades (paginado)</title>
</head>
<body>

<h1>Listado de Ciudades (con paginaci&oacute;n)</h1>
<p><a href="index.html">Volver al men&uacute;</a></p>

<?php

$registros_por_pagina = 3;

$pagina_actual = isset($_GET["pagina"]) ? (int) $_GET["pagina"] : 1;
if ($pagina_actual < 1) {
    $pagina_actual = 1;
}

$offset = ($pagina_actual - 1) * $registros_por_pagina;

$sql_total = "SELECT COUNT(*) AS total FROM ciudades";
$resultado_total = mysqli_query($link, $sql_total)
                    or die("Error en la consulta: " . mysqli_error($link));
$fila_total = mysqli_fetch_array($resultado_total);
$total_registros = $fila_total["total"];
$total_paginas = ceil($total_registros / $registros_por_pagina);

$sql = "SELECT id, ciudad, pais, habitantes, superficie, tieneMetro
        FROM ciudades
        ORDER BY id
        LIMIT $offset, $registros_por_pagina";

$vResultado = mysqli_query($link, $sql)
              or die("Error en la consulta: " . mysqli_error($link));
?>

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

  <?php while ($fila = mysqli_fetch_array($vResultado)) { ?>
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

<p>
  P&aacute;gina:
  <?php for ($i = 1; $i <= $total_paginas; $i++) { ?>
    <?php if ($i == $pagina_actual) { ?>
      <strong><?php echo $i; ?></strong>
    <?php } else { ?>
      <a href="listado_paginado.php?pagina=<?php echo $i; ?>"><?php echo $i; ?></a>
    <?php } ?>
  <?php } ?>
</p>

<p>Mostrando <?php echo $registros_por_pagina; ?> registros por p&aacute;gina &mdash;
   Total de registros: <?php echo $total_registros; ?> &mdash;
   Total de p&aacute;ginas: <?php echo $total_paginas; ?></p>

</body>
</html>
