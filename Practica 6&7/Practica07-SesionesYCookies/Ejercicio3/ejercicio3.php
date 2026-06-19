<?php
if (isset($_POST["usuario"]) && trim($_POST["usuario"]) !== "") {
    setcookie("usuario", $_POST["usuario"], time() + (86400 * 30), "/");
    $usuarioActual = $_POST["usuario"];
}

$ultimoUsuario = isset($_COOKIE["usuario"]) ? $_COOKIE["usuario"] : "";
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <title>Ejercicio 3 - Recordar usuario</title>
</head>
<body>

<h1>Ingreso de usuario</h1>

<?php if ($ultimoUsuario !== "") { ?>
  <p>&Uacute;ltimo usuario ingresado: <strong><?php echo htmlspecialchars($ultimoUsuario); ?></strong></p>
<?php } ?>

<form action="ejercicio3.php" method="post">
  <p>
    <label for="usuario">Usuario:</label><br />
    <input type="text" id="usuario" name="usuario" value="<?php echo htmlspecialchars($ultimoUsuario); ?>" required="required" />
  </p>
  <p><input type="submit" value="Guardar" /></p>
</form>

</body>
</html>
