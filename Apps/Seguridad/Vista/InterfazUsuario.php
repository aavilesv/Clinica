<?php
require_once('../Controlador/CtrUsuario.php');
$opcion = isset($_REQUEST['opc'])?$_REQUEST['opc']:'';
var_dump($opcion) ;
switch ($opcion) {
  case 'nuevo':
    $ctrUsuario = new CtrUsuario();
    $ctrUsuario->nuevo();
    break;
  case 'editar':
      $ctrUsuario = new CtrUsuario();
      $ctrUsuario->editar();
      break;
  case 'eliminar':
      $ctrUsuario = new CtrUsuario();
      $ctrUsuario->eliminar($_REQUEST['id']);
      break;
}
