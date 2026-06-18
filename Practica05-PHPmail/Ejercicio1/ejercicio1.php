<?php
/* ============================================================
   EJERCICIO 1: Script en PHP para enviar un correo electrónico
   con formato HTML a través del servidor.
=================================== */

// Datos del correo
$destinatario = "destino@ejemplo.com";
$asunto = "Prueba de envío con formato HTML";

// Cuerpo del mensaje en HTML
$cuerpo = "<html>
<head><title>Prueba</title></head>
<body>
  <h1 style='color:#006666;'>Entornos Gráficos</h1>
  <p>Este es un correo de prueba enviado con <strong>formato HTML</strong> desde PHP.</p>
</body>
</html>";

// Cabeceras adicionales: imprescindibles para que el cliente de correo
// interprete el cuerpo como HTML y no como texto plano
$cabeceras = "MIME-Version: 1.0" . "\r\n";
$cabeceras .= "Content-type: text/html; charset=UTF-8" . "\r\n";
$cabeceras .= "From: webmaster@misitio.com" . "\r\n";

// Envío del correo
$enviado = mail($destinatario, $asunto, $cuerpo, $cabeceras);

if ($enviado) {
    echo "El correo fue enviado correctamente.";
} else {
    echo "Hubo un error al enviar el correo (recordá que mail() requiere un servidor SMTP configurado, por ejemplo sendmail en XAMPP).";
}
?>
