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
  <title>Página 1</title>
</head>
<body>

<h1>P&aacute;gina 1</h1>

<p>
  Llevas visitadas <strong><?php echo $_SESSION["paginas_visitadas"]; ?></strong>
  p&aacute;gina(s) durante esta sesi&oacute;n.
</p>

<p>
  <a href="pagina2.php">Ir a P&aacute;gina 2</a> |
  <a href="pagina3.php">Ir a P&aacute;gina 3</a>
</p>

</body>
</html>
