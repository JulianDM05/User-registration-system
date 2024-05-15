<?php

include("./connection.php");

// Iniciar sesión para almacenar variables que serán usadas en múltiples archivos .php
session_start();

// El administrador quiere volver a la página de inicio
if (isset($_GET['back'])) {
  header("Location: ./index.php"); // Se envía a la página de inicio
}

// El administrador quiere buscar un usuario
if (isset($_GET['search'])) {
  $_SESSION['typedoc'] = (int)$_GET['typeofdoc']; // Tipo de documento
  $_SESSION['numdoc'] = (int)$_GET['numofdoc']; // Número de documento

  $consulta = " SELECT nombres, apellidos, idTipoDoc as \"tipo de documento\", numDoc as \"número de documento\", telefono, direccion, correo
                FROM usuarios
                WHERE numDoc = " . $_SESSION['numdoc'];

  $resultado = mysqli_query($conexion, $consulta);

  if (mysqli_num_rows($resultado) > 0) {
    // El usuario está registrado
    $row = $resultado->fetch_assoc();
    $_SESSION['name'] = $row['nombres'];
    $_SESSION['lastname'] = $row['apellidos'];
    $_SESSION['typedoc'] = $row['tipo de documento'];
    $_SESSION['numdoc'] = $row['número de documento'];
    $_SESSION['phone'] = $row['telefono'];
    $_SESSION['address'] = $row['direccion'];
    $_SESSION['email'] = $row['correo'];

    header("Location: ./userData.php"); // Se envía al administrador a la página con los datos del usuario encontrado
  } else {
    // El usuario no está registrado
    header("Location: ./termsAndConditions.php"); // Se envía al administrador a la página de términos y condiciones antes de registrar a un nuevo usuario
  }
}

// Se cierra la conexión
mysqli_close($conexion);