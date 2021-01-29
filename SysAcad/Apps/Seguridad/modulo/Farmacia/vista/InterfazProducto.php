<?php
require_once('../Controlador/ProductoCTR.php');
$opcion = isset($_REQUEST['opc'])?$_REQUEST['opc']:'';
var_dump($opcion) ;
switch ($opcion) {
  case 'nuevo':
    $ctrUsuario = new ProductoCTR();
    $ctrUsuario->nuevo();
    break;
  case 'editar':
    $ctrUsuario = new ProductoCTR();
    $ctrUsuario->editar();
    break;
  case 'eliminar':
    $ctrUsuario = new ProductoCTR();
    $ctrUsuario->eliminar($_REQUEST['idProducto']);
    break;
}
