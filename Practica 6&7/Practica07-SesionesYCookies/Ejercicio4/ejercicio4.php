<?php
if (isset($_POST["titular"])) {
    setcookie("titular", $_POST["titular"], time() + (86400 * 30), "/");
    $titular = $_POST["titular"];
} else {
    $titular = isset($_COOKIE["titular"]) ? $_COOKIE["titular"] : "";
}

$noticias = array(
    "politica"   => "El Congreso debate una nueva ley de presupuesto",
    "economica"  => "El dólar cerró estable tras el anuncio del Banco Central",
    "deportiva"  => "El equipo local ganó el clásico en el último minuto"
);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <title>El Diario - Periódico</title>
</head>
<body>

<h1>El Diario</h1>

<?php if ($titular === "" || !isset($noticias[$titular])) { ?>
  <h2>Pol&iacute;tica</h2>
  <p><?php echo $noticias["politica"]; ?></p>
  <h2>Econom&iacute;a</h2>
  <p><?php echo $noticias["economica"]; ?></p>
  <h2>Deportes</h2>
  <p><?php echo $noticias["deportiva"]; ?></p>
<?php } else { ?>
  <h2><?php echo ucfirst($titular); ?></h2>
  <p><?php echo $noticias[$titular]; ?></p>
<?php } ?>

<hr />

<form action="ejercicio4.php" method="post">
  <p>Eleg&iacute; qu&eacute; tipo de titular quer&eacute;s ver:</p>
  <p>
    <label><input type="radio" name="titular" value="politica" <?php echo ($titular == "politica") ? "checked" : ""; ?> /> Noticia pol&iacute;tica</label><br />
    <label><input type="radio" name="titular" value="economica" <?php echo ($titular == "economica") ? "checked" : ""; ?> /> Noticia econ&oacute;mica</label><br />
    <label><input type="radio" name="titular" value="deportiva" <?php echo ($titular == "deportiva") ? "checked" : ""; ?> /> Noticia deportiva</label>
  </p>
  <p><input type="submit" value="Guardar preferencia" /></p>
</form>

<p><a href="ejercicio4_borrar.php">Borrar mi preferencia de titular</a></p>

</body>
</html>
