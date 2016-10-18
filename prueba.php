/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
<?php 
 require_once '/Deuda.php';
 
     $deuda = new Deuda($id, '2016-10-18', '5', '1600000', '0.07');
     $deuda->GuardarDeuda();
     
     echo 'La deuda se ha guardado con el ID:'.$deuda->getId();;
?>
