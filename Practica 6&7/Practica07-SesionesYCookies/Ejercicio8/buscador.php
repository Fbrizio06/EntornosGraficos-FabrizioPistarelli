<?php
include "conexion_prueba.php";

$resultados = array();
$buscado = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $buscado = trim($_POST["cancion"]);
    $cancion_segura = mysqli_real_escape_string($link, $buscado);

    $sql = "SELECT id, canciones FROM buscador WHERE canciones = '$cancion_segura'";
    $resultado = mysqli_query($link, $sql) or die("Error: " . mysqli_error($link));

    while ($fila = mysqli_fetch_array($resultado)) {
        $resultados[] = $fila["canciones"];
    }
}

mysqli_close($link);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <title>Buscador de Canciones</title>
</head>
<body>

<h1>Buscador de Canciones</h1>

<form action="buscador.php" method="post">
  <p>
    <label for="cancion">Nombre de la canci&oacute;n (b&uacute;squeda exacta):</label><br />
    <input type="text" id="cancion" name="cancion" value="<?php echo htmlspecialchars($buscado); ?>" required="required" />
  </p>
  <p><input type="submit" value="Buscar" /></p>
</form>

<?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
  <?php if (count($resultados) > 0) { ?>
    <p>Resultado:</p>
    <ul>
      <?php foreach ($resultados as $cancion) { ?>
        <li><?php echo htmlspecialchars($cancion); ?></li>
      <?php } ?>
    </ul>
  <?php } else { ?>
    <p>No se encontr&oacute; ninguna canci&oacute;n con ese nombre exacto.</p>
  <?php } ?>
<?php } ?>

</body>
</html>
