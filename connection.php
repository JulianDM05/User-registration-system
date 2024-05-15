<?php

$host = "localhost";
$username = "JulianDM";
$password = "super_contraseña123";
$dbname= "testingdb";

// Conexión con la base de datos
$conexion = mysqli_connect($host, $username, $password, $dbname);

if (!$conexion) { // Verificación del estado de conexión con la BD
  die("La conexión con la base de datos falló: " . mysqli_connect_error()); 
}