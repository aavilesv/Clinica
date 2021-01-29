<?php
require_once('../Controlador/CtrOrtodoncia.php');

$opcion = isset($_REQUEST['opc'])?$_REQUEST['opc']:'';
echo $opcion;
if(isset($_REQUEST['opc'])){
  switch ($opcion) {
    case 'nuevo':
      $ctrInsumo = new CtrOrtodoncia();
      $ctrInsumo->nuevoInsumo();
      break;
    case 'editar':
        $ctrInsumo = new CtrOrtodoncia();
        $ctrInsumo->editarInsumo();
        break;
    case 'eliminar':
        $ctrInsumo = new CtrOrtodoncia();
        $ctrInsumo->eliminarInsumo($_GET['id']);
        break;
    case 'insumo':
        $ctrInsumo = new CtrOrtodoncia();
        $ctrInsumo->agregarInsumosCab($_GET['id'], $_GET['insumo']);

    break;
    case 'eliminsumo':
        $ctrInsumo = new CtrOrtodoncia();
        $ctrInsumo->eliminarInsumosCab($_GET['id'], $_GET['insumo']);
        
    break;
  }
}?>
