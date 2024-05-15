<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="./styles/index.css">
  <link rel="stylesheet" href="./styles/search.css">

  <script defer src="./js/search.js"></script>
  
  <title>Bienvenido!</title>
</head>
<body>
  <!-- Formulario usado para buscar un usuario en el sistema -->
  <form method="get">
    <p role="heading">¡Bienvenido de nuevo JulianDM!</p>
    <p>Buscar un usuario:</p>

    <!-- Selección de tipo de documento -->
    <select name="typeofdoc" class="typeofdoc" id="" required>
      <option value="">Seleccionar tipo de documento...</option>
      <option value="1">RC: Registro civil de nacimiento</option>
      <option value="2">TI: Tarjeta de identidad</option>
      <option value="3">CC: Cedula de ciudadanía</option>
      <option value="4">TE: Tarjeta de extranjería</option>
      <option value="5">CE: Cedula de extranjería</option>
      <option value="6">NIT: Número de identificación tributaria</option>
      <option value="7">PAS: Pasaporte</option>
    </select>

    <!-- Ingreso del número de documento -->
    <input type="number" name="numofdoc" class="numofdoc" placeholder="Número de documento" required>

    <p class="error-alert" role="error-alert"></p>

    <input class="btn" type="submit" name="search" value="Buscar">
    <input class="btn go-back" type="submit" name="back" value="Volver">

  </form>
</body>
</html>

<?php
include("./searchUser.php");
?>