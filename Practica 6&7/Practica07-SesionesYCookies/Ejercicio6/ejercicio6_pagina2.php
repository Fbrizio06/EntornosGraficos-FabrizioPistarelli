<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <title>Ejercicio 6 - Bienvenida</title>
</head>
<body>

<?php if (isset($_SESSION["nombre"])) { ?>
  <h1>&iexcl;Bienvenido, <?php echo htmlspecialchars($_SESSION["nombre"]); ?>!</h1>
<?php } else { ?>
  <h1>Acceso denegado</h1>
  <p>No pod&eacute;s visitar esta p&aacute;gina. Primero busc&aacute; tu mail en el formulario.</p>
<?php } ?>

<p><a href="ejercicio6_pagina1.php">Volver al buscador</a></p>

</body>
</html>
