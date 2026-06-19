<?php


include "conexion.php";

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $id = (int) $_POST["id"];

    $sql = "DELETE FROM ciudades WHERE id = $id";

    if (mysqli_query($link, $sql)) {
        header("Location: listado.php");
        exit;
    } else {
        $mensaje = "Error al eliminar el registro: " . mysqli_error($link);
    }

} else {


    if (!isset($_GET["id"])) {
        $mensaje = "No se especificó qué ciudad eliminar.";
    } else {
        $id = (int) $_GET["id"];

        $sql = "SELECT id, ciudad, pais, habitantes, superficie, tieneMetro
                FROM ciudades WHERE id = $id";

        $resultado = mysqli_query($link, $sql)
                     or die("Error en la consulta: " . mysqli_error($link));

        $fila = mysqli_fetch_array($resultado);

        if (!$fila) {
            $mensaje = "No se encontró ninguna ciudad con ese ID.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <title>Baja de Ciudad</title>
</head>
<body>

<h1>Baja de Ciudad</h1>
<p><a href="index.html">Volver al men&uacute;</a> | <a href="listado.php">Volver al listado</a></p>

<?php if ($mensaje !== "") { ?>
  <p style="color:red;"><?php echo $mensaje; ?></p>
<?php } ?>

<?php if (isset($fila) && $fila) { ?>

  <p>&iquest;Est&aacute;s seguro de que quer&eacute;s eliminar la siguiente ciudad?</p>

  <table border="1" cellpadding="5">
    <tr><th>ID</th><td><?php echo $fila["id"]; ?></td></tr>
    <tr><th>Ciudad</th><td><?php echo $fila["ciudad"]; ?></td></tr>
    <tr><th>Pa&iacute;s</th><td><?php echo $fila["pais"]; ?></td></tr>
    <tr><th>Habitantes</th><td><?php echo $fila["habitantes"]; ?></td></tr>
    <tr><th>Superficie</th><td><?php echo $fila["superficie"]; ?></td></tr>
    <tr><th>Tiene Metro</th><td><?php echo ($fila["tieneMetro"] == 1) ? "Sí" : "No"; ?></td></tr>
  </table>

  <form action="baja.php" method="post">
    <input type="hidden" name="id" value="<?php echo $fila["id"]; ?>" />
    <p>
      <input type="submit" value="Sí, eliminar" />
      <a href="listado.php">Cancelar</a>
    </p>
  </form>

<?php } ?>

</body>
</html>
