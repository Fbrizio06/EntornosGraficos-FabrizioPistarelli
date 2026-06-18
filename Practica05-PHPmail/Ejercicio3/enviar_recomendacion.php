<?php

$url_sitio = "http://www.misitio.com";

// Recuperar los datos del formulario
$tu_nombre   = isset($_POST["tu_nombre"])   ? htmlspecialchars(trim($_POST["tu_nombre"]))   : "";
$tu_email    = isset($_POST["tu_email"])    ? trim($_POST["tu_email"])                       : "";
$email_amigo = isset($_POST["email_amigo"]) ? trim($_POST["email_amigo"])                    : "";
$mensaje     = isset($_POST["mensaje"])     ? htmlspecialchars(trim($_POST["mensaje"]))      : "";

// Validación básica: nombre, tu email y el email del amigo son obligatorios
if ($tu_nombre === "" || $tu_email === "" || $email_amigo === "") {
    echo "Por favor completá tu nombre, tu email y el email de tu amigo.";
    exit;
}

// Validación del formato de ambos emails
if (!filter_var($tu_email, FILTER_VALIDATE_EMAIL)) {
    echo "Tu email no tiene un formato válido.";
    exit;
}
if (!filter_var($email_amigo, FILTER_VALIDATE_EMAIL)) {
    echo "El email de tu amigo no tiene un formato válido.";
    exit;
}

// Armado del asunto y cuerpo del correo
$asunto = $tu_nombre . " te recomienda visitar este sitio";

$cuerpo = "Hola!\n\n";
$cuerpo .= $tu_nombre . " (" . $tu_email . ") cree que te puede interesar este sitio:\n";
$cuerpo .= $url_sitio . "\n\n";

if ($mensaje !== "") {
    $cuerpo .= "Mensaje de " . $tu_nombre . ":\n" . $mensaje . "\n\n";
}

$cuerpo .= "Saludos!";


$cabeceras = "From: recomendaciones@misitio.com" . "\r\n";
$cabeceras .= "Reply-To: " . $tu_email . "\r\n";


$enviado = mail($email_amigo, $asunto, $cuerpo, $cabeceras);

if ($enviado) {
    echo "¡Listo! Le enviamos la recomendación a tu amigo.";
} else {
    echo "Hubo un error al enviar la recomendación. Probá nuevamente más tarde.";
}
?>
