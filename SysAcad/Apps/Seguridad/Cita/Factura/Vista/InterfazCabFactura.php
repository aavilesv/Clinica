<?php
require_once('../Controlador/CtrCabFactura.php');
require_once('../Controlador/CtrDetFactura.php');
$opcion = isset($_REQUEST['opc'])?$_REQUEST['opc']:'';
switch ($opcion) {
  case 'nuevo':
    $ctrFactura = new CtrCabFactura();
    $ctrFactura->nuevo();
    $crtDetalle = new CtrEntFactura();
    $crtDetalle->nuevo();
    break;
  case 'eliminar':
      $ctrFactura = new CtrCabFactura();
      $ctrFactura->eliminar($_REQUEST['id'], $_REQUEST['est']);
      $crtDetalle = new CtrEntFactura();
      $crtDetalle->eliminar($_REQUEST['id'], $_REQUEST['est']);
      break;
}
