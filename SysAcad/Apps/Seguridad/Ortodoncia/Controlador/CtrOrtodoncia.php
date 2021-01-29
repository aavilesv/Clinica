<?php

class CtrOrtodoncia
{
  private $modelo;
  private $dao;

  public function __construct()
  {
    require_once("../Dao/DaoOrtodoncia.php");
    require_once("../Modelo/EntInsumo.php");
    require_once("../Modelo/EntClinica.php");
    $this->dao = new DaoOrtodoncia();


  }

  public function getClinica($id)
  {
    $this->dao = new DaoOrtodoncia();
    return $this->dao->consultarClinica($id);
  }

  public function getInsumo($id)
  {
    $this->dao = new DaoOrtodoncia();
    return $this->dao->consultarInsumo($id);
  }

  public function getInsumos()
  {
    $this->dao = new DaoOrtodoncia();
    return $this->dao->consultarInsumos();
  }

  public function getInsumosCab($id)
  {
    $this->dao = new DaoOrtodoncia();
    return $this->dao->consultarInsumosCab($id);
  }

  public function eliminarInsumosCab($id, $insumo){

    $this->dao->eliminarInsumosCab($id, $insumo);
    $a='location:../vista/listaInsumos.php?usua='.$id.'&opc=agregar';
    header($a);
  }

  public function agregarInsumosCab($id, $insumo)
  {
    $this->dao->agregarInsumosCab($id, $insumo);
    $a='location:../vista/listaInsumos.php?usua='.$id.'&opc=ver';
    header($a);
  }

  public function getClinicas()
  {
    $this->dao = new DaoOrtodoncia();
    return $this->dao->consultarClinicas();
  }

  public function nuevoInsumo()
  {
    $this->modelo = new Insumo();
    if($_FILES["foto"]["name"]==""){
      $destino="../../../../fotosInsumos/insumo.jpg";
    }else{
      $foto=$_FILES["foto"]["name"];
      $ruta=$_FILES["foto"]["tmp_name"];
      $destino="../../../../fotosInsumos/".$foto;
      copy($ruta, $destino);
    }
    $this->modelo->__set('idInsumos', $_REQUEST['id']);
    $this->modelo->__set('Insumoscol', $_REQUEST['incl']);
    $this->modelo->__set('fotoInsumo', $destino);
    $this->dao->agregarInsumo($this->modelo);
    // echo $_REQUEST['id'].'<br>';
    // echo $_REQUEST['incl'].'<br>';
    // echo $destino.'<br>';
    header('location:../vista/ListarInsumos.php');
  }

  public function nuevaClinica()
  {
    $this->modelo = new Clinica();
    if($_FILES["foto"]["name"]==""){
      $destino="../../../../fotosClinicas/clinica.png";
    }else{
      $foto=$_FILES["foto"]["name"];
      $ruta=$_FILES["foto"]["tmp_name"];
      $destino="../../../../fotosClinicas/".$foto;
      copy($ruta, $destino);
    }
    $this->modelo->__set('CLI_Id', $_REQUEST['id']);
    $this->modelo->__set('CLI_Nombre', $_REQUEST['incl']);
    $this->modelo->__set('CLI_Foto', $destino);
    $this->dao->agregarClinica($this->modelo);
    header('location:../vista/ListarClinicas.php');
  }

  public function editarInsumo()
  {
    $this->modelo = new Insumo();
    if($_FILES["foto"]["name"]==""){
      $destino=$_REQUEST['fotoR'];
    }else{
      $foto=$_FILES["foto"]["name"];
      $ruta=$_FILES["foto"]["tmp_name"];
      $destino="../../../../fotosInsumos/".$foto;
      copy($ruta, $destino);
    }

    $this->modelo->__set('idInsumos', $_REQUEST['id']);
    $this->modelo->__set('Insumoscol', $_REQUEST['incl']);
    $this->modelo->__set('fotoInsumo', $destino);
    $this->dao->editarInsumo($this->modelo);
    header('location:../vista/ListarInsumos.php');
  }

  public function editarClinica()
  {
    $this->modelo = new Clinica();
    if($_FILES["foto"]["name"]==""){
      $destino=$_REQUEST['fotoR'];
    }else{
      $foto=$_FILES["foto"]["name"];
      $ruta=$_FILES["foto"]["tmp_name"];
      $destino="../../../../fotosClinicas/".$foto;
      copy($ruta, $destino);
    }
    $this->modelo->__set('CLI_Id', $_REQUEST['id']);
    $this->modelo->__set('CLI_Nombre', $_REQUEST['incl']);
    $this->modelo->__set('CLI_Foto', $destino);
    $this->dao->editarClinica($this->modelo);
    header('location:../vista/ListarClinicas.php');
  }
  public function eliminarInsumo($id)
  {
    $this->dao->eliminarInsumo($id);
    header('location:../vista/ListarInsumos.php');
  }

  public function eliminarClinica($id)
  {
    $this->dao->eliminarClinica($id);
    header('location:../vista/ListarClinicas.php');
  }
}
?>
