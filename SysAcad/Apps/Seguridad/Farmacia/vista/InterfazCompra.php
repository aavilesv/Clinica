<?php
require_once('../Controlador/CarritoCTR.php');
$opcion = isset($_REQUEST['opc'])?$_REQUEST['opc']:'';
//var_dump($opcion);
switch ($opcion) {
  case 'cancelar':
    $ctrUsuario = new CarritoCTR();
    $ctrUsuario->cancelarCompra();
    break;
  default:
    $ctrUsuario = new CarritoCTR();
    $ctrUsuario->nuevaCompra();
  break;
}
