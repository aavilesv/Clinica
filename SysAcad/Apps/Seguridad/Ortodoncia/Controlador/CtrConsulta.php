<?php
// session_start();
class CtrConsulta
{
  private $modelo;
  private $dao;

  public function __construct()
  {
    require_once("../Dao/DaoConsulta.php");
    require_once("../Modelo/EntConsulta.php");
    require_once("../Modelo/EntClinica.php");
    $this->dao = new DaoConsulta();

  }

  public function getConsultas()
  {
    $this->dao = new DaoConsulta();
    return $this->dao->consultarConsultas();
  }

  public function verConsulta($id)
  {
    $this->dao = new DaoConsulta();
    return $this->dao->verConsulta($id);
  }

  public function CargarComboPaciente()
  {
    $this->dao = new DaoConsulta();
    return $this->dao->CargarComboPacientes();
  }

  public function CargarComboMedico()
  {
    $this->dao = new DaoConsulta();
    return $this->dao->CargarComboMedicos();
  }

  public function nuevaConsulta()
  {
    $this->modelo = new Consulta();

    $this->modelo->__set('idCabConsulta', $_REQUEST['id']);
    $this->modelo->__set('fecha', $_REQUEST['fecha']);
    $this->modelo->__set('hora', $_REQUEST['hora']);
    $this->modelo->__set('PAC_Id', $_REQUEST['paciente']);
    $this->modelo->__set('PRO_Id', $_REQUEST['doctor']);
    $this->modelo->__set('sala', $_REQUEST['sala']);
    $this->modelo->__set('CLI_Id', $_REQUEST['clinica']);
    $this->modelo->__set('observacion', $_REQUEST['observacion']);

    $this->dao->nuevaConsulta($this->modelo);
    //echo $a;
    //$this->dao->ConsultaId($this->modelo);
    //echo $a;
    header('location:../vista/ListarConsultas.php');
    // echo $_REQUEST['id'].'<br>';
    // echo $_REQUEST['fecha'].'<br>';
    // echo $_REQUEST['hora'].'<br>';
    // echo $_REQUEST['paciente'].'<br>';
    // echo $_REQUEST['doctor'].'<br>';
    // echo $_REQUEST['sala'].'<br>';
    // echo $_REQUEST['clinica'].'<br>';
    // echo $_REQUEST['observacion'].'<br>';
    // echo $this->modelo->__get('fecha');


  }

  public function editarConsulta()
  {
    $this->modelo = new Consulta();

    $this->modelo->__set('idCabConsulta', $_REQUEST['id']);
    $this->modelo->__set('fecha', $_REQUEST['fecha']);
    $this->modelo->__set('hora', $_REQUEST['hora']);
    $this->modelo->__set('PAC_Id', $_REQUEST['paciente']);
    $this->modelo->__set('PRO_Id', $_REQUEST['doctor']);
    $this->modelo->__set('sala', $_REQUEST['sala']);
    $this->modelo->__set('CLI_Id', $_REQUEST['clinica']);
    $this->modelo->__set('observacion', $_REQUEST['observacion']);
    $this->dao->editarConsulta($this->modelo);

    header('location:../vista/ListarConsultas.php');
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
    $this->modelo->__set('idClinica', $_REQUEST['id']);
    $this->modelo->__set('Clinicacol', $_REQUEST['incl']);
    $this->modelo->__set('fotoClinica', $destino);
    $this->dao->editarClinica($this->modelo);
    header('location:../vista/listaInsumos.php');
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
