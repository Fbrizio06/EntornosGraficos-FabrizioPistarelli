<?php
include "conexion_base2.php";
session_start();

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mail = mysqli_real_escape_string($link, trim($_POST["mail"]));

    $sql = "SELECT nombre FROM alumnos WHERE mail = '$mail'";
    $resultado = mysqli_query($link, $sql) or die("Error: " . mysqli_error($link));
    $fila = mysqli_fetch_array($resultado);

    if ($fila) {
        $_SESSION["nombre"] = $fila["nombre"];
        $mensaje = "¡Encontrado! Ahora podés ir a la página de bienvenida.";
    } else {
        unset($_SESSION["nombre"]);
        $mensaje = "No se encontró ningún alumno con ese mail.";
    }
}

mysqli_close($link);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <title>Ejercicio 6 - Buscar alumno por mail</title>
</head>
<body>

<h1>Buscar alumno por mail</h1>

<?php if ($mensaje !== "") { ?>
  <p><?php echo $mensaje; ?></p>
<?php } ?>

<form action="ejercicio6_pagina1.php" method="post">
  <p>
    <label for="mail">Mail:</label><br />
    <input type="email" id="mail" name="mail" required="required" />
  </p>
  <p><input type="submit" value="Buscar" /></p>
</form>

<p><a href="ejercicio6_pagina2.php">Ir a la p&aacute;gina de bienvenida</a></p>

</body>
</html>
