<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="./styles/index.css">
  <link rel="stylesheet" href="./styles/success.css">
  
  <title>Operación exitosa!</title>
</head>
<body>
  <section class="success-window">
    <p role="heading">Operación realizada con éxito</p>
    <p>Para volver al panel de búsqueda de usuarios presione el boton:</p>
    <a href="./search.php">
      <button>Volver</button>
    </a>
  </section>
</body>
</html>
<?php
session_start();
session_destroy(); // Inicio y cierre de sessión para borrar los datos usados en los archivos previos
?>