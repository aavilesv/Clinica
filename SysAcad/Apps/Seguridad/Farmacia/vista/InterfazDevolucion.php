<?php
require_once('../Controlador/DevolucionCTR.php');
$opcion = isset($_REQUEST['opc'])?$_REQUEST['opc']:'';
//var_dump($opcion);
switch ($opcion) {
  case 'cancelar':
    $ctrUsuario = new DevolucionCTR();
    $ctrUsuario->cancelarDevolucion();
    break;
  default:
    $ctrUsuario = new DevolucionCTR();
    $ctrUsuario->nuevaDevolucion();
  break;
}
