<?php
  require_once('../Controlador/CtrCliente.php');
  require_once('../Controlador/CtrCabFactura.php');

  function getLista()
  {
    $id = $_POST['id'];
    $Cliente = new CtrCliente();
    if($id=='Cliente'){
      $registros = $Cliente->getTipoClientes();
      $lista="<option value='0'>Seleccione Cliente</option>";
    }else if($id == 'Paciente'){
      $registros = $Cliente->getPacientes();
      $lista="<option value='0'>Seleccione Paciente</option>";
    }
    foreach ($registros as $valor) {
      $lista.="<option value='".$valor['id']."'>".$valor['name']."</option>";
    }
    return $lista;
  }

  function getDatos()
  {
    $id = $_POST['id'];
    $ce = $_POST['ti'];
    if($id == 0){
      $ced ='';
      $dir='';
    }else {
      $Cliente = new CtrCliente();
      if($ce == 'cli'){
        $registros = $Cliente->getCliente($id);
        $ced=$registros->__get('FACCliCedula');
        $dir=$registros->__get('FACCliDireccion');
        $name=$registros->__get('FACCliNombre')."  ".$registros->__get('FACCliApellido');
      }else if($ce == 'pac'){
          $registros = $Cliente->getPaciente($id);
        $ced=$registros['ced'];
          $name=$registros['name'];
      $dir=$registros['dire'];
      }
    }
    return json_encode(array('ced'=>$ced, 'dir'=>$dir ,'name'=>$name));
  }

  function getArt()
  {
    $id = $_POST['id'];
    if($id == 0){
      $stock ='';
      $vuni='';
      $id ='';
    }else {
      $factura = new CtrCabFactura();
      $registros = $factura->getProducto($id);
      $stock=$registros['stock'];
      $vuni=$registros['vuni'];
    }
    return json_encode(array('id'=>$id, 'stock'=>$stock, 'vuni'=>$vuni));
  }

  function AddFila()
  {
    $id = $_POST['id'];
    $can = $_POST['can'];
    if($id == 0){
      $vuni='';
      $id ='';
      $can ='';
      $name ='';
      $fila = '';
    }else {
      $factura = new CtrCabFactura();
      $registros = $factura->getProducto($id);
      $vuni=$registros['vuni'];
      $name=$registros['producto'];
      $total = $vuni * $can;
      $fila = "<tr>";
      $fila .= "<td>".$id."</td>";
      $fila .= "<td>".$name."</td>";
      $fila .= "<td>".$can."</td>";
      $fila .= "<td>".$vuni."</td>";
      $fila .= "<td>".$total."</td>";
      $fila .= "<td><button type='button' id=eli class='btn btn-danger btn-sm glyphicon glyphicon glyphicon-trash'></button></td>";
      $fila .= "</tr";
    }
    return $fila;
  }

  function ObtenerDetalle()
  {
    $id = $_POST['id'];
    $fila = array();
    $i = 0;
      $factura = new CtrCabFactura();
      $registros = $factura->getDetalle($id);
      foreach ($registros as  $valor) {
        $total = $valor['cant'] * $valor['pu'];
        $fila[$i] = "<tr>";
        $fila[$i] .= "<td>".$valor['idpro']."</td>";
        $fila[$i] .= "<td>".$valor['producto']."</td>";
        $fila[$i] .= "<td>".$valor['cant']."</td>";
        $fila[$i] .= "<td>".$valor['pu']."</td>";
        $fila[$i] .= "<td>".$total."</td>";
        $fila[$i] .= "<td><button type='button' id=eli class='btn btn-danger btn-sm glyphicon glyphicon glyphicon-trash'></button></td>";
        $fila[$i] .= "</tr";
        $i=$i+1;
      }
    return json_encode($fila);

  }

  if($_POST['opc'] == 'cbo'){
      echo getLista() ;
  }elseif ($_POST['opc'] == 'inf') {
      echo getDatos();
  }elseif ($_POST['opc'] == 'cbart') {
      echo getArt();
  }elseif ($_POST['opc'] == 'aggArt') {
      echo AddFila();
  }elseif ($_POST['opc'] == 'detalle'){
      echo ObtenerDetalle();
  }

 ?>
