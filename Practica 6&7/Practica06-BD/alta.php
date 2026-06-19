<?php
/* ============================================================
   ALTA de un registro en la tabla ciudades.

   Este archivo cumple doble función:
   1) Si llega por GET (primera carga), muestra el formulario vacío.
   2) Si llega por POST (el formulario fue enviado), procesa el
      alta: arma y ejecuta el INSERT, y redirige al listado.

   Es un patrón común en PHP "clásico": un mismo script maneja
   tanto la presentación del formulario como su procesamiento,
   diferenciando según el método de la petición ($_SERVER["REQUEST_METHOD"]).
   ============================================================ */

include "conexion.php";

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recupera y sanitiza los datos del formulario
    $ciudad     = mysqli_real_escape_string($link, trim($_POST["ciudad"]));
    $pais       = mysqli_real_escape_string($link, trim($_POST["pais"]));
    $habitantes = (int) $_POST["habitantes"];
    $superficie = (float) str_replace(",", ".", $_POST["superficie"]);
    $tieneMetro = isset($_POST["tieneMetro"]) ? 1 : 0;

    // Validación básica: ciudad y país son obligatorios
    if ($ciudad === "" || $pais === "") {
        $mensaje = "Por favor completá al menos los campos Ciudad y País.";
    } else {
        $sql = "INSERT INTO ciudades (ciudad, pais, habitantes, superficie, tieneMetro)
                VALUES ('$ciudad', '$pais', $habitantes, $superficie, $tieneMetro)";

        if (mysqli_query($link, $sql)) {
            // Alta exitosa: redirige al listado para ver el resultado
            header("Location: listado.php");
            exit;
        } else {
            $mensaje = "Error al insertar el registro: " . mysqli_error($link);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <title>Alta de Ciudad</title>
</head>
<body>

<h1>Alta de Ciudad</h1>
<p><a href="index.html">Volver al men&uacute;</a></p>

<?php if ($mensaje !== "") { ?>
  <p style="color:red;"><?php echo $mensaje; ?></p>
<?php } ?>

<form action="alta.php" method="post">

  <p>
    <label for="ciudad">Ciudad:</label><br />
    <input type="text" id="ciudad" name="ciudad" required="required" />
  </p>

  <p>
    <label for="pais">Pa&iacute;s:</label><br />
    <input type="text" id="pais" name="pais" required="required" />
  </p>

  <p>
    <label for="habitantes">Habitantes:</label><br />
    <input type="number" id="habitantes" name="habitantes" min="0" required="required" />
  </p>

  <p>
    <label for="superficie">Superficie (km&sup2;):</label><br />
    <input type="text" id="superficie" name="superficie" required="required" />
  </p>

  <p>
    <label for="tieneMetro">
      <input type="checkbox" id="tieneMetro" name="tieneMetro" value="1" />
      &iquest;Tiene Metro?
    </label>
  </p>

  <p>
    <input type="submit" value="Dar de alta" />
  </p>

</form>

</body>
</html>
