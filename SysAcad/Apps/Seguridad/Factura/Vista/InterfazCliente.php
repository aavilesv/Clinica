<?php
require_once('../Controlador/CtrCliente.php');
$opcion = isset($_REQUEST['opc'])?$_REQUEST['opc']:'';
var_dump($opcion) ;
switch ($opcion) {
  case 'nuevo':
    $ctrCliente = new CtrCliente();
    $ctrCliente->nuevo();
    break;
  case 'editar':
      $ctrCliente = new CtrCliente();
      $ctrCliente->editar();
      break;
  case 'eliminar':
      $ctrCliente = new CtrCliente();
      $ctrCliente->eliminar($_REQUEST['id']);
      break;
}
