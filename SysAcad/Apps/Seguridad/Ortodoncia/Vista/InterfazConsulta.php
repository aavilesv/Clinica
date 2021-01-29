<?php
require_once('../Controlador/CtrConsulta.php');

$opcion = isset($_GET['opc'])?$_GET['opc']:'';
echo $opcion;
if(isset($_GET['opc'])){
  switch ($opcion) {
    case 'nuevo':
      $ctrConsulta = new CtrConsulta();
      $ctrConsulta->nuevaConsulta();
      break;
    case 'editar':
        $ctrConsulta = new CtrConsulta();
        $ctrConsulta->editarConsulta();
        break;
    case 'eliminar':
        $ctrConsulta = new CtrConsulta();
        $ctrConsulta->eliminarConsulta($_GET['id']);
        break;
  }
}?>
