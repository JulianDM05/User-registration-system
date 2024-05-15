<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="./styles/index.css">
  
  <title>Registro</title>
</head>
<body>
  <!-- Formulario usado para autorizar el ingreso al sistema (ingreso del administrador) -->
  <form method="get">
    <p>Admin: JulianDM</p>
    <p role="heading">Identifíquese</p>

    <input type="password" name="password" placeholder="Contraseña" required>

    <?php
    include("./validateAdminLogin.php"); // Importación del archivo utilizado para validar el ingreso del administrador
    ?>

    <input class="btn" type="submit" name="register" value="Enviar">

  </form>
</body>
</html>