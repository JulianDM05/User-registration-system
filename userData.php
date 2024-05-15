<?php
include("./connection.php"); // Importación del archivo que realiza la conexión a la BD

session_start(); // Inicio de sesión para usar variables en múltiples archivos .php
$typedoc = $_SESSION['typedoc'];
$typeofdocs = array('', 'RC', 'TI', 'CC', 'TE', 'CE', 'NIT', 'PAS');
$typeofdoc = $typeofdocs[$typedoc];

// El administrador quiere volver a la página de búsqueda de usuarios
if (isset($_POST['goBack'])) {
  header("Location: ./search.php"); // Se envía a la página de búsqueda de usuarios
}

// El administrador quiere eliminar el usuario del sistema
if (isset($_POST['delete'])) {
  $consulta = "DELETE FROM usuarios WHERE numDoc = " . $_SESSION['numdoc'];

  $resultado = mysqli_query($conexion, $consulta);

  if($resultado) {
    header("Location: ./success.php");
  }
}

// El administrador quiere actualizar los datos del usuario
if (isset($_POST['updateUser'])) {
  $telefono = $_POST['phone'];
  $direccion = $_POST['address'];
  $email = $_POST['email'];

  $consulta = "UPDATE usuarios
                SET telefono = '" . $telefono . "', direccion = '" . $direccion . "', correo = '" . $email . "'
                WHERE numDoc = '" . $_SESSION['numdoc'] . "';";

  $resultado = mysqli_query($conexion, $consulta);

  if($resultado) {
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
  <link rel="stylesheet" href="./styles/userData.css">

  <script defer src="./js/userData.js"></script>
  
  <title>Datos del usuario</title>
</head>
<body>
  <!-- Formulario usado para ingresar los datos del usuario a registrar en el sistema -->
  <form method="post">
    <p role="heading">Datos de usuario</p>

    <table>
      <tr>
        <th>Nombres:</th>
        <?php
        echo "<td><input value=\"" . $_SESSION['name'] . "\"  class=\"name\"disabled></td>"
        ?>
      </tr>

      <tr>
        <th>Apellidos:</th>
        <?php
        echo "<td><input value=\"" . $_SESSION['lastname'] . "\"  class=\"lastname\"disabled></td>"
        ?>
      </tr>

      <tr>
        <th>Tipo de documento:</th>
        <?php
        echo "<td><input value=\"" . $typeofdoc . "\"  class=\"typedoc\"disabled></td>"
        ?>
      </tr>
      <tr>
        <th>Número de documento:</th>
        <?php
        echo "<td><input value=\"" . $_SESSION['numdoc'] . "\"  class=\"numdoc\"disabled></td>"
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
        <?php
        echo "<td><input value=\"" . $_SESSION['phone'] . "\"  class=\"phone\" name=\"phone\"disabled></td>"
        ?>
      </tr>

      <tr>
        <th>
          <svg xmlns="http://www.w3.org/2000/svg"  class="bi bi-exclamation-triangle address" viewBox="0 0 16 16">
            <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z"/>
            <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
          </svg>
          Dirección:
        </th>
        <?php
        echo "<td><input value=\"" . $_SESSION['address'] . "\"  class=\"address\" name=\"address\"disabled></td>"
        ?>
      </tr>

      <tr>
        <th>
          <svg xmlns="http://www.w3.org/2000/svg"  class="bi bi-exclamation-triangle email" viewBox="0 0 16 16">
            <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z"/>
            <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
          </svg>
          Correo electronico:
        </th>
        <?php
        echo "<td><input value=\"" . $_SESSION['email'] . "\"  class=\"email\" name=\"email\"disabled></td>"
        ?>
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
    
    <!-- Botones para interactuar con el formulario -->
    <input class="btn update" type="submit" name="update" value="Actualizar">
    <input class="btn open-pop-up" type="submit" name="openPopUp" value="Borrar">
    <input class="btn back" type="submit" name="goBack" value="Volver">
    <input class="btn cancel-update" type="submit" name="cancelUpdate" value="Cancelar">

    <!-- Sección utilizada para que el usuario confirme la eliminación de usuario -->
    <section class="warning-background delete-user">
      <div class="warning-popup">
        <p role="heading">Confirmación de eliminación de registro</p>
        <p>
          Estas apunto de eliminar al usuario del sistema
          ¿Deseas confirmar la acción?
        </p>
        <button class="cancel-delete">Cancelar</button>
        <input class="btn delete" type="submit" name="delete" value="Eliminar">
      </div>
    </section>

    <!-- Sección utilizada para que el usuario confirme la actualización de datos del usuario -->
    <section class="warning-background update-user">
      <div class="warning-popup">
        <p role="heading">Confirmación de actualización de datos</p>
        <p>
          Estas apunto de actualizar los datos del usuario
          ¿Deseas confirmar la acción?
        </p>
        <button class="cancel-update">Cancelar</button>
        <input class="btn update" type="submit" name="updateUser" value="Actualizar">
      </div>
    </section>
  </form>
</body>
</html>