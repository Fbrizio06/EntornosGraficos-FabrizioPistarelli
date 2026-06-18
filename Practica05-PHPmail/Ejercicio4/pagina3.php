<?php


session_start();

if (!isset($_SESSION["paginas_visitadas"])) {
    $_SESSION["paginas_visitadas"] = 0;
}
$_SESSION["paginas_visitadas"]++;
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <title>Página 3</title>
</head>
<body>

<h1>P&aacute;gina 3</h1>

<p>
  Llevas visitadas <strong><?php echo $_SESSION["paginas_visitadas"]; ?></strong>
  p&aacute;gina(s) durante esta sesi&oacute;n.
</p>

<p>
  <a href="pagina1.php">Ir a P&aacute;gina 1</a> |
  <a href="pagina2.php">Ir a P&aacute;gina 2</a> |
  <a href="reiniciar_sesion.php">Reiniciar sesi&oacute;n (volver a contar desde 0)</a>
</p>

</body>
</html>
