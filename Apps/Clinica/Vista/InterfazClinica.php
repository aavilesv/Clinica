<?php

require_once('../Controlador/CtrClinica.php');
$opcion = isset($_REQUEST['opc']) ? $_REQUEST['opc'] : '';
var_dump($opcion);
switch ($opcion) {
    case 'nuevo':
        $ctrClinica = new CtrClinica();
        $ctrClinica->nuevo();
        break;
    case 'editar':
        $ctrClinica = new CtrClinica();
        $ctrClinica->editar();
        break;
    case 'eliminar':        
        $ctrClinica = new CtrClinica();
        $ctrClinica->eliminar($_REQUEST['id']);
        break;     
    case 'eliminar1':        
        $ctrClinica = new CtrClinica();
        $ctrClinica->eliminar1($_REQUEST['id']);
        break;  
    case 'eliminarCompleto':        
        $ctrClinica = new CtrClinica();
        $ctrClinica->eliminarCompleto($_REQUEST['id']);
        break;
}
