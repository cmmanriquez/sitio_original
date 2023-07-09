<?php
// Función para validar el formato de correo electrónico
function validar_email($email) {
  return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Recuperar los datos del formulario
  $nombre = $_POST['nombre'];
  $email = $_POST['email'];
  $mensaje = $_POST['mensaje'];

  // Validar los campos del formulario
  if (empty($nombre) || empty($email) || empty($mensaje)) {
    echo 'Por favor, complete todos los campos.';
    exit;
  }

  if (!validar_email($email)) {
    echo 'El correo electrónico no es válido.';
    exit;
  }


  $destinatario = 'hola@proyectospencer.com';
  $asunto = 'Nuevo mensaje del formulario de contacto';
  $cuerpo = "Nombre: $nombre\nCorreo electrónico: $email\nMensaje: $mensaje";
  $encabezados = "From: $email\r\n" .
                "Reply-To: $email\r\n" .
                "X-Mailer: PHP/" . phpversion();

  if (mail($destinatario, $asunto, $cuerpo, $encabezados)) {
  header('Location: ty.html');
  exit;
  } else {
  echo 'Error al enviar el mensaje. Por favor, inténtelo de nuevo más tarde.';
  }
  }
?>
