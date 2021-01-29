<?php
require_once('../Controlador/CtrPermisos.php');
$opcion = isset($_REQUEST['opc'])?$_REQUEST['opc']:'';//de esta forma pregunta si existe ese valor
var_dump($_POST);
switch ($opcion) {
  case 'nuevo':
    $ctrUsuario = new CtrPermisos();
    $ctrUsuario->nuevo();
    break;
  case 'editar':
      $ctrUsuario = new CtrPermisos();
      $ctrUsuario->editar();
      break;
  case 'eliminar':
      $ctrUsuario = new CtrPermisos();
      $ctrUsuario->eliminar($_REQUEST['id']);
      break;
}
