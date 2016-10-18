/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
<?php

require_once '/Conexion.php';

      class Deuda {
          
          private $id;
          private $fecha;
          private $deudor;
          private $valor;
          private $interes;
          const TABLA='deuda';
          
          function __construct($id, $fecha, $deudor, $valor, $interes) {
              $this->id = $id;
              $this->fecha = $fecha;
              $this->deudor = $deudor;
              $this->interes = $interes;
              $this->valor = $valor;
          }
         
          function getId() {
              return $this->id;
          }

          function getFecha() {
              return $this->fecha;
          }

          function getDeudor() {
              return $this->deudor;
          }
          function getValor() {
              return $this->valor;
          }

          function getInteres() {
              return $this->interes;
          }
          function setValor($valor) {
              $this->valor = $valor;
          }

          function setFecha($fecha) {
              $this->fecha = $fecha;
          }

          function setDeudor($deudor) {
              $this->deudor = $deudor;
          }

          function setInteres($interes) {
              $this->interes = $interes;
          }

          public function GuardarDeuda (){
              $conexion = new Conexion();
              $consulta = $conexion->prepare('INSERT INTO '. self::TABLA. ' (deudor, fch_deuda, valor, interes) VALUES (:deudor, :fecha, :valor, :interes)');
              $consulta->bindParam(':deudor', $this->deudor);
              $consulta->bindParam(':fecha', $this->fecha);
              $consulta->bindParam(':valor', $this->valor);
              $consulta->bindParam(':interes', $this->interes);
              $consulta->execute();
              $this->id = $conexion->lastInsertId();
              $conexion = NULL;
          }          
          
        
      }
