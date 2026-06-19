<?php
include "conexion_compras.php";
session_start();

if (!isset($_SESSION["carrito"])) {
    $_SESSION["carrito"] = array();
}

if (isset($_GET["agregar"])) {
    $id = (int) $_GET["agregar"];
    if (isset($_SESSION["carrito"][$id])) {
        $_SESSION["carrito"][$id]++;
    } else {
        $_SESSION["carrito"][$id] = 1;
    }
}

if (isset($_GET["quitar"])) {
    $id = (int) $_GET["quitar"];
    unset($_SESSION["carrito"][$id]);
}

$sql = "SELECT id, producto, precio FROM catalogo ORDER BY producto";
$resultado = mysqli_query($link, $sql) or die("Error: " . mysqli_error($link));

$total = 0;
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <title>Carrito de Compras</title>
</head>
<body>

<h1>Cat&aacute;logo</h1>

<table border="1" cellpadding="5">
  <tr>
    <th>Producto</th>
    <th>Precio</th>
    <th>Acci&oacute;n</th>
  </tr>
  <?php while ($fila = mysqli_fetch_array($resultado)) { ?>
    <tr>
      <td><?php echo $fila["producto"]; ?></td>
      <td>$<?php echo number_format($fila["precio"], 2, ",", "."); ?></td>
      <td><a href="carrito.php?agregar=<?php echo $fila["id"]; ?>">Agregar al carrito</a></td>
    </tr>
  <?php } ?>
</table>

<h1>Mi carrito</h1>

<?php if (count($_SESSION["carrito"]) == 0) { ?>
  <p>El carrito est&aacute; vac&iacute;o.</p>
<?php } else { ?>
  <table border="1" cellpadding="5">
    <tr>
      <th>Producto</th>
      <th>Precio unitario</th>
      <th>Cantidad</th>
      <th>Subtotal</th>
      <th>Acci&oacute;n</th>
    </tr>
    <?php foreach ($_SESSION["carrito"] as $id => $cantidad) {
        $sql_item = "SELECT producto, precio FROM catalogo WHERE id = $id";
        $res_item = mysqli_query($link, $sql_item);
        $item = mysqli_fetch_array($res_item);
        if ($item) {
            $subtotal = $item["precio"] * $cantidad;
            $total += $subtotal;
    ?>
      <tr>
        <td><?php echo $item["producto"]; ?></td>
        <td>$<?php echo number_format($item["precio"], 2, ",", "."); ?></td>
        <td><?php echo $cantidad; ?></td>
        <td>$<?php echo number_format($subtotal, 2, ",", "."); ?></td>
        <td><a href="carrito.php?quitar=<?php echo $id; ?>">Quitar</a></td>
      </tr>
    <?php }
    } ?>
  </table>
  <p>Total: <strong>$<?php echo number_format($total, 2, ",", "."); ?></strong></p>
<?php } ?>

<?php mysqli_close($link); ?>

</body>
</html>
