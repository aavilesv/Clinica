<?php
require_once('../Controlador/ProveedorCTR.php');
$opcion = isset($_REQUEST['opc'])?$_REQUEST['opc']:'';
var_dump($opcion) ;
switch ($opcion) {
  case 'nuevo':
    $ctrUsuario = new ProveedorCTR();
    $ctrUsuario->nuevo();
    break;
  case 'editar':
    $ctrUsuario = new ProveedorCTR();
    $ctrUsuario->editar();
    break;
  case 'eliminar':
    $ctrUsuario = new ProveedorCTR();
    $ctrUsuario->eliminar($_REQUEST['ruc']);
    break;
}
