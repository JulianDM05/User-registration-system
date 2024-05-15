<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="./styles/index.css">
  <link rel="stylesheet" href="./styles/termsAndConditions.css">

  <script defer src="./js/termsAndConditions.js"></script>
  
  <title>Términos y condiciones</title>
</head>
<body>
  <!-- Formulario usado para aceptar términos y condiciones -->
  <form method="get">
    <p role="heading">Usuario no encontrado en el sistema</p>
    
    <?php
    session_start(); // Inicio de sesión para usar variables en múltiples archivos .php
    
    $typedoc = $_SESSION['typedoc'];
    $numdoc = $_SESSION['numdoc'];
    $typeofdocs = array('', 'RC', 'TI', 'CC', 'TE', 'CE', 'NIT', 'PAS');
    $typeofdoc = $typeofdocs[$typedoc];

    $msg = 'El usuario con ' . $typeofdoc . ' ' . $numdoc . ' no está registrado en el sistema';

    // Impresión de texto indicando la ausencia del usuario en el sistema
    echo '<p>' . $msg . ', acepte los términos y condiciones para el tratamiento de datos
    y asi continuar con el registro.</p>';
    ?>

    <p role="heading2">Términos y condiciones</p>

    <!-- Sección utilizada para mostrar los términos y condiciones -->
    <section class="terms-and-conditions">
      <p>
        Este sitio web recopila y procesa datos personales de sus usuarios de acuerdo con las leyes y regulaciones de protección de datos aplicables. Al utilizar este sitio web, usted acepta los siguientes términos y condiciones para el procesamiento de sus datos personales:
      </p>

      <b>Datos recopilados:</b>
      <p>El sitio web puede recopilar los siguientes datos personales de usted:</p>
      <ul>
        <li>Nombre.</li>
        <li>Documento de identificación.</li>
        <li>Dirección de correo electrónico.</li>
        <li>Información de contacto (número de teléfono, dirección).</li>
      </ul>

      <b>Propósito del procesamiento de datos:</b>
      <p>El sitio web utiliza sus datos personales para los siguientes propósitos:</p>
      <ul>
        <li>Responder a sus consultas y solicitudes</li>
      </ul>

      <b>Conservación de datos:</b>
      <ul>
        <li>Sus datos personales se conservarán durante el tiempo que sea necesario para cumplir con los fines para los que fueron recopilados.</li>
        <li>También podemos conservar sus datos durante un período más largo si así lo exige la ley o para fines comerciales legítimos.</li>
      </ul>

      <b>Seguridad de datos:</b>
      <ul>
        <li>Tomamos medidas razonables para proteger sus datos personales del acceso, la divulgación, la alteración o la destrucción no autorizados.</li>
        <li>Sin embargo, ningún sitio web puede garantizar una seguridad absoluta.</li>
      </ul>

      <b>Sus derechos:</b>
      <ul>
        <li>Tiene derecho a acceder, rectificar o borrar el procesamiento de sus datos personales.</li>
      </ul>

      <p>
        Podemos actualizar estos términos y condiciones de vez en cuando. Consulte esta página periódicamente para ver cualquier cambio.
      </p>
    </section>

    <!-- Sección utilizada para aceptar los términos y condiciones -->
    <section class="terms-and-conditions accept">
      <div>
        <input type="checkbox" class="checkbox" required>
        <span>Acepto términos y condiciones</span>
      </div>

      <div>
        <input type="checkbox" class="checkbox" required>
        <span>Acepto el tratamiento de mis datos personales</span>
      </div>
    </section>

    <input class="btn register" type="submit" name="register" value="Registrar">
    <input class="btn go-back" type="submit" name="back" value="Volver">

  </form>
</body>
</html>
<?php
// El administrador quiere volver a la página anterior
if (isset($_GET['back'])) {
  header("Location: ./search.php"); // Se envía a la página anterior
}

if (isset($_GET['register'])) {
  header("Location: ./registerUser.php"); // Se envía a la página de registro de usuario
}
?>