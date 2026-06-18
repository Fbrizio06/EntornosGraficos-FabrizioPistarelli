<?php


session_start();


$_SESSION = array();


session_destroy();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <title>Sesión reiniciada</title>
</head>
<body>

<h1>Sesi&oacute;n reiniciada</h1>
<p>El contador de p&aacute;ginas visitadas volvi&oacute; a cero.</p>
<p><a href="pagina1.php">Volver a la P&aacute;gina 1</a></p>

</body>
</html>
