<?php
if (isset($_POST["estilo"])) {
    setcookie("estilo", $_POST["estilo"], time() + (86400 * 30), "/");
    $estilo = $_POST["estilo"];
} else {
    $estilo = isset($_COOKIE["estilo"]) ? $_COOKIE["estilo"] : "claro";
}

$estilos = array(
    "claro"      => "estilo_claro.css",
    "oscuro"     => "estilo_oscuro.css",
    "contraste"  => "estilo_contraste.css"
);

$hoja = isset($estilos[$estilo]) ? $estilos[$estilo] : $estilos["claro"];
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <title>Ejercicio 1 - Estilo configurable</title>
  <link rel="stylesheet" type="text/css" href="<?php echo $hoja; ?>" />
</head>
<body>

<h1>P&aacute;gina con estilo configurable</h1>
<p>Estilo actual: <strong><?php echo ucfirst($estilo); ?></strong></p>

<form action="ejercicio1.php" method="post">
  <p>
    <label><input type="radio" name="estilo" value="claro" <?php echo ($estilo == "claro") ? "checked" : ""; ?> /> Claro</label><br />
    <label><input type="radio" name="estilo" value="oscuro" <?php echo ($estilo == "oscuro") ? "checked" : ""; ?> /> Oscuro</label><br />
    <label><input type="radio" name="estilo" value="contraste" <?php echo ($estilo == "contraste") ? "checked" : ""; ?> /> Alto contraste</label>
  </p>
  <p><input type="submit" value="Aplicar estilo" /></p>
</form>

<p>Este aspecto se va a recordar la pr&oacute;xima vez que visites esta p&aacute;gina.</p>

</body>
</html>
