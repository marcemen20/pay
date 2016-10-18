 <?php
        // put your code here
        
        require_once '/Persona.php';
        
      
                $personaje = Persona::Buscar($_REQUEST['id']);
                /*if ($personaje){
                    $personaje->Eliminar();
                    echo 'El registro ha sido eliminad0';
                } else {
                    echo 'No se ha podido encontrar el registro.';
                }
                
                
                
                  if ($personaje){
                      $personaje->setNombres('Nivet');
                      $personaje->setApellidos('Ramos Pimentel');
                      $personaje->Guardar();
                      echo 'Los datos han sido cambiados';
                  } else {
                      echo 'El Id no ha sido encontrado.';
                  }*/
                     
                if($personaje){
                           echo '<br />';
                           echo '1'.' '.$personaje->getId();
                           echo '<br />';
                           echo '2'.' '.$personaje->getNombres();
                           echo '<br />';
                           echo '3'.' '.$personaje->getApellidos();
                           echo '<br />';
                           echo '4'.' '.$personaje->getNit();
                           echo '<br />';
                           echo '5'.' '.$personaje->getPass();
                           echo '<br />';
                           echo '6'.' '.$personaje->getCorreo();
                           echo '<br />';
                           echo '7'.' '.$personaje->getDireccion();
                           
                           
                           
                           //echo $personaje->getDescripcion();
                        }else{
                           echo 'El personaje no ha podido ser encontrado';
                        }

           
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
