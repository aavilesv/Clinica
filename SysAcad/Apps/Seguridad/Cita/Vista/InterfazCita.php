<?php

require_once('../Controlador/CtrCita.php');
$opcion = isset($_REQUEST['opc']) ? $_REQUEST['opc'] : '';
var_dump($opcion);
switch ($opcion) {
    case 'nuevo':
        $ctrCita = new CtrCita();
        $ctrCita->nuevo();
        break;
    case 'editar':
        $ctrCita = new CtrCita();
        $ctrCita->editar();
        break;
    case 'editar1':
        $ctrCita = new CtrCita();
        $ctrCita->editar1();
        break;
    case 'eliminar':
        $ctrClinica = new CtrCita();
        $ctrClinica->eliminar($_REQUEST['id']);
        break;
    case 'eliminar1':
        $ctrClinica = new CtrCita();
        $ctrClinica->eliminar1($_REQUEST['id']);
        break;
    case 'eliminar2':
        $ctrClinica = new CtrCita();
        $ctrClinica->eliminar2($_REQUEST['id']);
        break;
    case 'eliminar3':
        $ctrClinica = new CtrCita();
        $ctrClinica->eliminar3($_REQUEST['id']);
        break;
 
    case 'eliminarCompleto':
        $ctrCita = new CtrCita();
        $ctrCita->eliminarCompleto($_REQUEST['id']);
        break;
    case 'eliminarCompleto1':
        $ctrCita = new CtrCita();
        $ctrCita->eliminarCompleto1($_REQUEST['id']);
        break;
    case 'eliminarCompleto2':
        $ctrCita = new CtrCita();
        $ctrCita->eliminarCompleto2($_REQUEST['id']);
        break;
}
