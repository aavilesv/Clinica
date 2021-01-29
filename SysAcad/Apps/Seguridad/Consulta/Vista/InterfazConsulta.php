<?php

require_once('../Controlador/CtrConsulta.php');
$opcion = isset($_REQUEST['opc']) ? $_REQUEST['opc'] : '';
var_dump($opcion);
switch ($opcion) {
    case 'nuevo':
        $ctrConsulta = new CtrConsulta();
        $ctrConsulta->nuevo();
        break;
    case 'editar':
         $ctrConsulta = new CtrConsulta();
        $ctrConsulta->editar();
        break;
    case 'eliminar':
        $ctrConsulta = new CtrConsulta();
        $ctrConsulta->eliminar($_REQUEST['id']);
        break;
    case 'eliminar1':
        $ctrConsulta = new CtrConsulta();
        $ctrConsulta->eliminar1($_REQUEST['id']);
        break;
    case 'eliminarCompleto':
        $ctrConsulta = new CtrConsulta();
        $ctrConsulta->eliminarCompleto($_REQUEST['id']);
        break;
}
