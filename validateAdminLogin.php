<style>
  <?php include("./styles/index.css"); // Importación de estilos CSS ?>
</style>

<?php
// Importación del archivo de conexión a la BD
include("./connection.php");

if (isset($_GET['register'])) {
  // Traer el valor registrado en el input con name="password"
  $password = trim($_GET['password']);

  // Definición de la consulta
  $consulta = "SELECT password FROM administradores WHERE nombres = 'Julián Arturo' AND apellidos = 'Díaz Moreno'";

  // Ejeución de la consulta
  $resultado = mysqli_query($conexion, $consulta);

  // Validación de errores en la consulta
  if (!$resultado) {
    echo "Error al ejecutar la consulta: " . mysqli_error($conexion);
  } else {

    // Se verifica si alguna fila fue encontrada
    if (mysqli_num_rows($resultado) > 0) {
      $row = mysqli_fetch_assoc($resultado);
      
      // Se valida la contraseña en la base de datos con la contraseña ingresada
      if (password_verify($password, $row['password'])) {
        header("Location: ./search.php"); // Se envía al administrador a la página de búsqueda de usuarios en el sistema
        exit();
      } else { 
        echo "<p role=\"error-alert\">Contraseña incorrecta</p>"; // Se indica al administrador que la contraseña es incorrecta
      }
    } else { // No se encontró el registro
      echo "No se encontró el usuario";
    }
  }
}

// Se cierra la conexión
mysqli_close($conexion);