<?php
/* ============================================================
   MODIFICACIÓN de un registro en la tabla ciudades.

   Flujo:
   1) Llega por GET con ?id=N (clic en "Modificar" desde el listado):
      busca esa ciudad y precarga el formulario con sus datos actuales.
   2) Llega por POST (el formulario fue enviado): ejecuta el UPDATE
      con los nuevos valores y redirige al listado.
   ============================================================ */

include "conexion.php";

$mensaje = "";
$fila = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Se envió el formulario con los nuevos datos: ejecutar el UPDATE
    $id         = (int) $_POST["id"];
    $ciudad     = mysqli_real_escape_string($link, trim($_POST["ciudad"]));
    $pais       = mysqli_real_escape_string($link, trim($_POST["pais"]));
    $habitantes = (int) $_POST["habitantes"];
    $superficie = (float) str_replace(",", ".", $_POST["superficie"]);
    $tieneMetro = isset($_POST["tieneMetro"]) ? 1 : 0;

    if ($ciudad === "" || $pais === "") {
        $mensaje = "Por favor completá al menos los campos Ciudad y País.";
        // Volvemos a armar $fila con lo que el usuario tipeó, para no
        // perder los datos ya cargados si hay que corregir algo.
        $fila = array(
            "id" => $id, "ciudad" => $_POST["ciudad"], "pais" => $_POST["pais"],
            "habitantes" => $_POST["habitantes"], "superficie" => $_POST["superficie"],
            "tieneMetro" => $tieneMetro
        );
    } else {
        $sql = "UPDATE ciudades
                SET ciudad = '$ciudad',
                    pais = '$pais',
                    habitantes = $habitantes,
                    superficie = $superficie,
                    tieneMetro = $tieneMetro
                WHERE id = $id";

        if (mysqli_query($link, $sql)) {
            header("Location: listado.php");
            exit;
        } else {
            $mensaje = "Error al modificar el registro: " . mysqli_error($link);
        }
    }

} else {

    // Llegó por GET: hay que buscar la ciudad para precargar el formulario
    if (!isset($_GET["id"])) {
        $mensaje = "No se especificó qué ciudad modificar.";
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
  <title>Modificación de Ciudad</title>
</head>
<body>

<h1>Modificaci&oacute;n de Ciudad</h1>
<p><a href="index.html">Volver al men&uacute;</a> | <a href="listado.php">Volver al listado</a></p>

<?php if ($mensaje !== "") { ?>
  <p style="color:red;"><?php echo $mensaje; ?></p>
<?php } ?>

<?php if ($fila) { ?>

  <form action="modificar.php" method="post">
    <input type="hidden" name="id" value="<?php echo $fila["id"]; ?>" />

    <p>
      <label for="ciudad">Ciudad:</label><br />
      <input type="text" id="ciudad" name="ciudad" value="<?php echo htmlspecialchars($fila["ciudad"]); ?>" required="required" />
    </p>

    <p>
      <label for="pais">Pa&iacute;s:</label><br />
      <input type="text" id="pais" name="pais" value="<?php echo htmlspecialchars($fila["pais"]); ?>" required="required" />
    </p>

    <p>
      <label for="habitantes">Habitantes:</label><br />
      <input type="number" id="habitantes" name="habitantes" min="0" value="<?php echo $fila["habitantes"]; ?>" required="required" />
    </p>

    <p>
      <label for="superficie">Superficie (km&sup2;):</label><br />
      <input type="text" id="superficie" name="superficie" value="<?php echo $fila["superficie"]; ?>" required="required" />
    </p>

    <p>
      <label for="tieneMetro">
        <input type="checkbox" id="tieneMetro" name="tieneMetro" value="1" <?php echo ($fila["tieneMetro"] == 1) ? "checked=\"checked\"" : ""; ?> />
        &iquest;Tiene Metro?
      </label>
    </p>

    <p>
      <input type="submit" value="Guardar cambios" />
    </p>
  </form>

<?php } ?>

</body>
</html>
