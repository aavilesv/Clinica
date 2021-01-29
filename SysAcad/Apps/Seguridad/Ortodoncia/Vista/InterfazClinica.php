<?php
require_once('../Controlador/CtrOrtodoncia.php');

$opcion = isset($_REQUEST['opc'])?$_REQUEST['opc']:'';
if(isset($_REQUEST['opc'])){
  switch ($opcion) {
    case 'nuevo':
      $ctrClinica = new CtrOrtodoncia();
      $ctrClinica->nuevaClinica();
      break;
    case 'editar':
        $ctrClinica = new CtrOrtodoncia();
        $ctrClinica->editarClinica();
        break;
    case 'eliminar':
        $ctrClinica = new CtrOrtodoncia();
        $ctrClinica->eliminarClinica($_GET['id']);
        break;
  }
}?>
