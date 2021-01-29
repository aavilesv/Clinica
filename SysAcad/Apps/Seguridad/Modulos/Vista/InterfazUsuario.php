<?php
require_once('../Controlador/CtrRol.php');
$opcion = isset($_REQUEST['opc'])?$_REQUEST['opc']:'';
var_dump($opcion) ;
switch ($opcion) {
  case '':
    $ctrUsuario = new CtrRol();
    $ctrUsuario->nuevo();
    break;
  case 'editar':
      $ctrUsuario = new CtrRol();
      $ctrUsuario->editar();
      break;
  case 'eliminar':
      $ctrUsuario = new CtrRol();
      $ctrUsuario->eliminar($_REQUEST['id']);
      break;
}
