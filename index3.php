<?php
require_once '/Persona.php';

$persona = new Persona($_REQUEST['nit'], $_REQUEST['nombres'], $_REQUEST['apellidos'], $_REQUEST['pass'], $_REQUEST['correo'], $_REQUEST['direccion']);
$persona->Guardar();
?>



<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <br/>
        <?php
        echo $persona->getNombres().' '.'se ha registrado correctamente con ID: '.' '.$persona->getId();
        ?>
        <p> <a href="../pay/index.php">Inicio</a></p>
  </body>
</html>