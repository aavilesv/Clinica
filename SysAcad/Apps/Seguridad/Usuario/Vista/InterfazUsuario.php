<?php
require_once('../Controlador/CtrUsuario.php');
//$obc=$_GET['obc']
// $usua =isset($_POST['usuario'])?$_POST['usuario']:'';
// if($usua!=''){
//   $ctrUsuario = new CtrUsuario();
//   $ctrUsuario->getCuenta($usua);
// }
$opcion = isset($_REQUEST['opc'])?$_REQUEST['opc']:'';
if(isset($_REQUEST['opc'])){
  //echo $opcion;
  var_dump($opcion) ;
  switch ($opcion) {
    case '':
      $ctrUsuario = new CtrUsuario();
      $ctrUsuario->nuevo();
      break;
    case 'editar':
        $ctrUsuario = new CtrUsuario();
        $ctrUsuario->editar();
        break;
    case 'eliminar':
        $ctrUsuario = new CtrUsuario();
        $ctrUsuario->eliminar($_REQUEST['id']);
        break;
  }
}else{
  $ctrUsuario = new CtrUsuario();
  $ctrUsuario->nuevo();
}
//$opcion = isset($_REQUEST['opc'])?$_REQUEST['opc']:'';
