<?php
require_once '/Persona.php';
$eliminar= Persona::Buscar($_REQUEST['id']);
$eliminar->Eliminar();
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <br/>
        <p> <a href="../pay/index.php">Inicio</a></p>
  </body>
</html>
