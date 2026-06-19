<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <title>Ejercicio 5 - Página 1: Login</title>
</head>
<body>

<h1>Ingreso de usuario</h1>

<form action="ejercicio5_pagina2.php" method="post">
  <p>
    <label for="usuario">Usuario:</label><br />
    <input type="text" id="usuario" name="usuario" required="required" />
  </p>
  <p>
    <label for="clave">Clave:</label><br />
    <input type="password" id="clave" name="clave" required="required" />
  </p>
  <p><input type="submit" value="Ingresar" /></p>
</form>

</body>
</html>
