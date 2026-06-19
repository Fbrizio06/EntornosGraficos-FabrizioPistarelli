<?php
if (!isset($_COOKIE["contador"])) {
    setcookie("contador", "1", time() + (86400 * 30), "/");
    $primeraVez = true;
    $visitas = 1;
} else {
    $visitas = (int) $_COOKIE["contador"] + 1;
    setcookie("contador", $visitas, time() + (86400 * 30), "/");
    $primeraVez = false;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <title>Contador de visitas</title>
</head>
<body>

<h1>contador.php</h1>

<?php if ($primeraVez) { ?>
  <p>&iexcl;Bienvenido! Esta es tu primera visita a esta p&aacute;gina.</p>
<?php } else { ?>
  <p>Ya visitaste esta p&aacute;gina <strong><?php echo $visitas; ?></strong> veces.</p>
<?php } ?>

</body>
</html>
