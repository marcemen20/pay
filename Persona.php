/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
<?php
require_once '/Conexion.php';

Class Persona {
    
    private $id;
    private $nit;
    private $nombres;
    private $apellidos;
    private $pass;
    private $correo;
    private $direccion;
    const TABLA='persona';


    public function __construct($nit=null, $nombres=null, $apellidos=null, $pass=null, $correo=null, $direccion=NULL, $id=null) {
        $this->id = $id;
        $this->nit = $nit;
        $this->nombres = $nombres;
        $this->apellidos = $apellidos;
        $this->pass = $pass;
        $this->correo = $correo;
        $this->direccion = $direccion;
    }
    function getId() {
        return $this->id;
    }

    function getNit() {
        return $this->nit;
    }

    function getNombres() {
        return $this->nombres;
    }

    function getApellidos() {
        return $this->apellidos;
    }

    function getPass() {
        return $this->pass;
    }

    function getCorreo() {
        return $this->correo;
    }

    function getDireccion() {
        return $this->direccion;
    }

   // function setId($id) {
      //  $this->id = $id;
   // }

    function setNit($nit) {
        $this->nit = $nit;
    }

    function setNombres($nombres) {
        $this->nombres = $nombres;
    }

    function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    function setPass($pass) {
        $this->pass = $pass;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }


        public function Guardar() {
        $conexion = new Conexion();
        if ($this->id) /* Modifica */ {
            $consulta = $conexion->prepare('UPDATE ' . self::TABLA . ' SET nombres = :nombres, apellidos = :apellidos, nit = :nit, pas = :pass, correo = :correo, direccion = :direccion  WHERE id = :id');
            $consulta->bindParam(':id', $this->id);
            $consulta->bindParam(':nombres', $this->nombres);
            $consulta->bindParam(':apellidos', $this->apellidos);
            $consulta->bindParam(':nit', $this->nit);
            $consulta->bindParam(':pass', $this->pass);
            $consulta->bindParam(':correo', $this->correo);
            $consulta->bindParam(':direccion', $this->direccion);
            $consulta->execute();
        } else /* Inserta */ {
            $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA . ' (nombres, apellidos, nit, pas, correo, direccion) VALUES(:nombres, :apellidos, :nit, md5(:pass), :correo, :direccion)');
            $consulta->bindParam(':nombres', $this->nombres);
            $consulta->bindParam(':apellidos', $this->apellidos);
            $consulta->bindParam(':nit', $this->nit);
            $consulta->bindParam(':pass', $this->pass);
            $consulta->bindParam(':correo', $this->correo);
            $consulta->bindParam(':direccion', $this->direccion);
            $consulta->execute();
            $this->id = $conexion->lastInsertId();
        }
        $conexion = null;
    }
    public static function Buscar($id){
           $conexion = new Conexion();
           $consulta = $conexion->prepare('SELECT nombres, apellidos, nit, pas, correo, direccion FROM ' . self::TABLA . ' WHERE id=:id');
           $consulta->bindParam(':id', $id);
           $consulta->execute();
           $resultado=$consulta->fetch();
         $conexion=NULL;
            if ($resultado){
                return new self ($resultado['nit'], $resultado['nombres'], $resultado['apellidos'],  $resultado['pas'], $resultado['correo'], $resultado['direccion'], $id);
             
             
            } else {
                return false;
            }
            
    }

    public function Eliminar() {
            $conexion = new Conexion();
            $consulta = $conexion->prepare('DELETE FROM ' .self::TABLA . ' WHERE id= :id');
            $consulta->bindParam(':id', $this->id);
            $consulta->execute();
            
          $conexion=NULL;
    }
    
    public static function BuscarTodos(){
            $conexion = new Conexion();
            $consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA. ' ORDER BY nombres');
            $consulta->execute();
            $resultados = $consulta->fetchAll();
            $conexion= NULL;
             if (count($resultados)>0){
                 foreach ($resultados as $item):
                     echo '</br>';
                     echo 'ID:'.' '.$item['id'];
                     echo '</br>';
                     echo 'Nombres:'. ' '.$item['nombres'];
                     echo '</br>';
                     echo 'Apellidos:'.' '.$item['apellidos'];
                     echo '</br>';
                     echo 'NIT:'.' '.$item['nit'];
                     echo '</br>';
                     echo 'Contrasena:'.' '.$item['pas'];
                     echo '</br>';
                     echo 'Correo:'.' '.$item['correo'];
                     echo '</br>';
                     echo 'Dirección:'.' '.$item['direccion'];
                     echo '</br>';
                     echo '------------------------------------------';
                 endforeach;
             }else{
                 echo 'No hay Registro que mostrar';
             }
                 
    }
    
    
}