<?php
include("./connection.php"); // Importación del archivo que realiza la conexión a la BD

session_start(); // Inicio de sesión para usar variables en múltiples archivos .php
$typedoc = $_SESSION['typedoc'];
$typeofdocs = array('', 'RC', 'TI', 'CC', 'TE', 'CE', 'NIT', 'PAS');
$typeofdoc = $typeofdocs[$typedoc];

// El administrador quiere volver a la página de búsqueda de usuarios
if (isset($_POST['cancel'])) {
  header("Location: ./search.php"); // Se envía a la página de búsqueda de usuarios
}

// El administrador quiere registrar al usuario en el sistema
if (isset($_POST['register'])) {
  $nombres = $_POST['name'];
  $apellidos = $_POST['lastname'];
  $idTipoDoc = $_SESSION['typedoc'];
  $numDoc = $_SESSION['numdoc'];
  $telefono = $_POST['phone'];
  $direccion = $_POST['address'];
  $correo = $_POST['email'];
  
  $consulta = "INSERT INTO usuarios (nombres, apellidos, idTipoDoc, numDoc, telefono, direccion, correo)
                VALUES ('" . $nombres ."', '" . $apellidos ."'," . $idTipoDoc .", '" . $numDoc ."', '" . $telefono ."', '" . $direccion ."', '" . $correo ."');";
                
  $resultado = mysqli_query($conexion, $consulta);

  if ($resultado) {
    header("Location: ./success.php");
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="./styles/index.css">
  <link rel="stylesheet" href="./styles/registerUser.css">

  <script defer src="./js/registerUser.js"></script>
  
  <title>Registrar usuario</title>
</head>
<body>
  <!-- Formulario usado para ingresar los datos del usuario a registrar en el sistema -->
  <form method="post">
    <p role="heading">Registro de usuario</p>

    <p>
      Ingrese los siguientes datos para registrar al usuario en el sistema:
    </p>

    <table>
      <tr>
        <th>
          <svg xmlns="http://www.w3.org/2000/svg"  class="bi bi-exclamation-triangle name" viewBox="0 0 16 16">
            <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z"/>
            <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
          </svg>
          Nombres:
        </th>
        <td>
          <input type="text" class="name" name="name" required>
        </td>
      </tr>

      <tr>
        <th>
          <svg xmlns="http://www.w3.org/2000/svg"  class="bi bi-exclamation-triangle lastname" viewBox="0 0 16 16">
            <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z"/>
            <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
          </svg>
          Apellidos:
        </th>
        <td>
          <input type="text" class="lastname" name="lastname" required>
        </td>
      </tr>

      <tr>
        <th>Tipo de documento:</th>
        <?php
        echo "<td><input value=\"" . $typeofdoc . "\" disabled></td>"
        ?>
      </tr>
      <tr>
        <th>Número de documento:</th>
        <?php
        echo "<td><input value=\"" . $_SESSION['numdoc'] . "\" disabled></td>"
        ?>
      </tr>

      <tr>
        <th>
          <svg xmlns="http://www.w3.org/2000/svg"  class="bi bi-exclamation-triangle phone" viewBox="0 0 16 16">
            <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z"/>
            <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
          </svg>
          Telefono:
        </th>
        <td>
          <input type="number" class="phone" name="phone" required>
        </td>
      </tr>

      <tr>
        <th>
          <svg xmlns="http://www.w3.org/2000/svg"  class="bi bi-exclamation-triangle address" viewBox="0 0 16 16">
            <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z"/>
            <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
          </svg>
          Dirección:
        </th>
        <td>
          <input type="text" class="address" name="address" required>
        </td>
      </tr>

      <tr>
        <th>
          <svg xmlns="http://www.w3.org/2000/svg"  class="bi bi-exclamation-triangle email" viewBox="0 0 16 16">
            <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z"/>
            <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
          </svg>
          Correo electronico:
        </th>
        <td>
          <input type="email" class="email" name="email" required>
        </td>
      </tr>

    </table>
    
    <!-- Sección utilizada para indicar al usuario notaciones de errores en el formulario -->
    <section class="error-notation section">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
        <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z"/>
        <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
      </svg>
      
      <p>→ Longitud máxima excedida</p>
    </section>
    
    <!-- Texto usado para indicar errores en el formulario -->
    <p class="error-alert" role="error-alert"></p>

    <input class="btn open-pop-up" type="submit" name="openPopUp" value="Registrar">
    <input class="btn go-back" type="submit" name="cancel" value="Cancelar">
    
    <!-- Sección utilizada para que el usuario confirme la acción -->
    <section class="warning-background">
      <div class="warning-popup">
        <p role="heading">Confirmación de registro</p>
        <p>
          Estas apunto de registrar al usuario en el sistema
          ¿Deseas confirmar la acción?
        </p>
        <button class="cancel-register">Cancelar</button>
        <input class="btn register" type="submit" name="register" value="Registrar">
      </div>
    </section>
  </form>
</body>
</html>