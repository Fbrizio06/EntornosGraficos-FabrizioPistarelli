<?php



$webmaster = "webmaster@misitio.com";


$nombre  = isset($_POST["nombre"])  ? htmlspecialchars(trim($_POST["nombre"]))  : "";
$email   = isset($_POST["email"])   ? trim($_POST["email"])                     : "";
$asunto  = isset($_POST["asunto"])  ? htmlspecialchars(trim($_POST["asunto"]))  : "";
$mensaje = isset($_POST["mensaje"]) ? htmlspecialchars(trim($_POST["mensaje"])) : "";

// Validación básica
if ($nombre === "" || $email === "" || $asunto === "" || $mensaje === "") {
    echo "Por favor completá todos los campos del formulario.";
    exit;
}


if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "El email ingresado no es válido.";
    exit;
}


$asunto_correo = "Consulta desde el sitio: " . $asunto;

$cuerpo = "Se recibió una nueva consulta a través del formulario de contacto.\n\n";
$cuerpo .= "Nombre: " . $nombre . "\n";
$cuerpo .= "Email: " . $email . "\n";
$cuerpo .= "Asunto: " . $asunto . "\n";
$cuerpo .= "Mensaje:\n" . $mensaje . "\n";


$cabeceras = "From: contacto@misitio.com" . "\r\n";
$cabeceras .= "Reply-To: " . $email . "\r\n";


$enviado = mail($webmaster, $asunto_correo, $cuerpo, $cabeceras);

if ($enviado) {
    echo "¡Gracias " . $nombre . "! Tu consulta fue enviada correctamente.";
} else {
    echo "Hubo un error al enviar la consulta. Probá nuevamente más tarde.";
}
?>
