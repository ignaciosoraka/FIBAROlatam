<?php
$destinatario = 'ignaciosoraka@gmail.com';

// Validar la dirección de correo electrónico
$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
if (!$email) {
    echo "La dirección de correo electrónico no es válida.";
    exit();
}

$asunto = $_POST['asunto'];
$mensaje = $_POST['mensaje'];


$mensajeCompleto = "Mensaje de contacto:\n\n";
$mensajeCompleto .= "Nombre: " . $nombre . "\n";
$mensajeCompleto .= "Correo Electrónico: " . $email . "\n";
$mensajeCompleto .= "Asunto: " . $asunto . "\n";
$mensajeCompleto .= "Mensaje: " . $mensaje . "\n";


$asuntoCorreo = "Consulta de " . $nombre;

$header = "From: Fibaro " . $email . ">\r\n";
$header .= "Reply-To: " . $email . "\r\n";
$header .= "MIME-Version: 1.0\r\n";
$header .= "Content-Type: text/plain; charset=UTF-8\r\n";

if (mail($destinatario, $asuntoCorreo, $mensajeCompleto, $header)) {
    // Redirigir a la página de agradecimiento
    header("Location: gracias.html");
    exit();
} else {
    ?>
    <h3 class="error">Ocurrió un error, por favor vuelve a intentarlo</h3>
    <?php
}
?>
