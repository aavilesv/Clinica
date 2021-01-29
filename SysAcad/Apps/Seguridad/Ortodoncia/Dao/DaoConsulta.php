<?php
//session_start();
require_once('../../../Conexion/DBAAbstractModel1.php');
require_once('../Modelo/EntPaciente.php');
require_once('../Modelo/EntMedico.php');
require_once('../Modelo/EntConsulta.php');
// require_once('../Interfaz/IntOrtodoncia.php');
class DaoConsulta extends DBAAbstractModel //implements IntOrtodoncia
{
  public function __construct()
  {
    parent::__construct(); // 1ro Inicializa constructor padre
    $this->db_name = 'integrador1'; // Selecciona la BASE DATOS a trabajar
  }

  public function consultarConsultas()
  {
    try {
      $consultas=array();
      $sql = "Select idCabConsulta, pa.PAC_Nombre as PAC_Id ,cl.CLI_Nombre as CLI_Id, me.PRO_Nombre as PRO_Id, fecha, hora, observacion, sala
      From cabconsulta as con, paciente as pa, clinica as cl, profesional as me
      where  con.PAC_Id=pa.PAC_Id and con.CLI_Id=cl.CLI_Id and con.PRO_Id=me.PRO_Id
      order by idCabConsulta";
      $stmt = $this->getConexion()->prepare($sql);
      $stmt->execute();
      $rs = $stmt->get_result();
      while (($consulta = $rs->fetch_object())) {
        $consultas[] = new Consulta($consulta->idCabConsulta, $consulta->PAC_Id,
        $consulta->CLI_Id, $consulta->PRO_Id,$consulta->fecha, $consulta->hora,$consulta->observacion,$consulta->sala);
      }
      $rs->close();
    } catch (\Exception $e) {

    }
    return $consultas;
  }

  public function verConsulta($id){
    $usu='';
    try {
      $sql = "Select idCabConsulta, pa.PAC_Nombre as PAC_Id ,cl.CLI_Nombre as CLI_Id, me.PRO_Nombre as PRO_Id, fecha, hora, observacion, sala
      From cabconsulta as con, paciente as pa, clinica as cl, profesional as me
      where  con.PAC_Id=pa.PAC_Id and con.CLI_Id=cl.CLI_Id and con.PRO_Id=me.PRO_Id
      and idCabConsulta = ?" ;
      $stmt = $this->getConexion()->prepare($sql); //Prepara una sentencia para su ejecución y devuelve un objeto sentencia
      $stmt->bind_param('i', $id); //Agrega variables a una sentencia preparada como parámetros
      $stmt->execute();
      $rs = $stmt->get_result();
      $consultas = null;
      if ($consulta = $rs->fetch_object()) {
        $consultas = new Consulta($consulta->idCabConsulta, $consulta->PAC_Id,
        $consulta->CLI_Id, $consulta->PRO_Id,$consulta->fecha, $consulta->hora,$consulta->observacion, $consulta->sala);
      }
      return $consultas;
    } catch (\Exception $ex) {
      throw $ex->getMessage();
    }
    return $usu;
  }

  public function CargarComboPacientes()
  {
    try {
      $consultas=array();
      $sql = "select pac_Id, pac_Nombre, pac_Apellido from paciente";
      $stmt = $this->getConexion()->prepare($sql);
      $stmt->execute();
      $rs = $stmt->get_result();
      while (($consulta = $rs->fetch_object())) {
        $consultas[] = new Paciente($consulta->pac_Id, $consulta->pac_Nombre, $consulta->pac_Apellido);
      }
      $rs->close();
    } catch (\Exception $e) {

    }
    return $consultas;
  }
  public function CargarComboMedicos()
  {
    try {
      $consultas=array();
      $sql = "select PRO_Id, PRO_Nombre, PRO_Apellido from profesional";
      $stmt = $this->getConexion()->prepare($sql);
      $stmt->execute();
      $rs = $stmt->get_result();
      while (($consulta = $rs->fetch_object())) {
        $consultas[] = new Medico($consulta->PRO_Id, $consulta->PRO_Nombre, $consulta->PRO_Apellido);
      }
      $rs->close();
    } catch (\Exception $e) {

    }
    return $consultas;
  }

  public function nuevaConsulta(Consulta $consulta){
    try {
      $a=$consulta->__get('PAC_Id');
      $b=$consulta->__get('CLI_Id');
      $c=$consulta->__get('PRO_Id');
      $d=$consulta->__get('fecha');
      $e=$consulta->__get('hora');
      $f=$consulta->__get('observacion');
      $g=$consulta->__get('sala');
      $sql = "Insert into cabconsulta (idCabConsulta, PAC_Id , CLI_Id , PRO_Id, fecha, hora, observacion, sala)
      values(null, ?, ?, ?, ?, ?, ?, ? )";
      $stmt = $this->getConexion()->prepare($sql);
      $stmt->bind_param('iiissss', $consulta->__get('PAC_Id'), $consulta->__get('CLI_Id'),$consulta->__get('PRO_Id'),
      $consulta->__get('fecha'),$consulta->__get('hora'),$consulta->__get('observacion'),$consulta->__get('sala'));
      $stmt->execute();
      // //$a=$this->ConsultaId($consulta);
      // if ($stmt->affected_rows) {
      //     return $this->ConsultaId($consulta);
      //   }
      $sq = "Select idCabConsulta from cabconsulta
		  where PAC_Id = ? and CLI_Id = ? and PRO_Id= ? and fecha= ?
		   and hora= ? and observacion= ? and sala= ? LIMIT 1";
      $stm = $this->getConexion()->prepare($sq);

      $stm->bind_param('iiissss', $a, $b, $c, $d, $e, $f, $g);
      $stm->execute();
      $stm->bind_result($idCabConsulta);
      $stm->fetch();
      $_SESSION['idCabConsulta']=$idCabConsulta;
      return $idCabConsulta;
    } catch (Exception $ex) {
      throw $ex->getMessage();
    }
    return false;
  }
  public function ConsultaId(Consulta $consulta){
    try {
      // $sql = "Select idCabConsulta from cabconsulta where PAC_Id = ?
      // and CLI_Id = ? and PRO_Id= ? and fecha= ? and hora= ? and observacion= ? and sala= ? Limit 1";
      $sql = "Select idCabConsulta from cabconsulta where PAC_Id = ? ";
      $stmt = $this->getConexion()->prepare($sql); //Prepara una sentencia para su ejecución y devuelve un objeto sentencia
      $stmt->bind_param('i',$consulta->__get('PAC_Id') );
      // $stmt->bind_param('iiissss', $consulta->__get('PAC_Id'), $consulta->__get('CLI_Id'),$consulta->__get('PRO_Id'),
      // $consulta->__get('fecha'),$consulta->__get('hora'),$consulta->__get('observacion'),$consulta->__get('sala'));
      $stmt->execute();
      $stm->bind_result($idCabConsulta);
      $stm->fetch();
      $_SESSION['idCabConsulta']=$idCabConsulta;
      // return $idCabConsulta;
      // if($stmt->num_rows==1)
      // {
      //   $datos= $stmt->fetch_assoc();
      //   $_SESSION['idCabConsulta']=$datos['idCabConsulta'];
      //   //$_SESSION['idCabConsulta']=
      //   return "datos['idCabConsulta']";
      // }
    } catch (\Exception $e) {
      throw $ex->getMessage();
    }
    return false;
  }
  public function editarConsulta(Consulta $consulta){
    try {
      $sql="Update cabconsulta
      Set PAC_Id = ?, CLI_Id= ?,PRO_Id= ?,fecha= ?,hora= ?,observacion= ?,sala= ?
      Where idCabConsulta = ? ";
      $stmt = $this->getConexion()->prepare($sql);
      $stmt->bind_param('iiissssi', $consulta->__get('PAC_Id'), $consulta->__get('CLI_Id'),$consulta->__get('PRO_Id'),
      $consulta->__get('fecha'),$consulta->__get('hora'),$consulta->__get('observacion'),$consulta->__get('sala'),
      $consulta->__get('idCabConsulta'));
      $stmt->execute();
      if ($stmt->affected_rows) {
        return true;
      }
    } catch (Exception $ex) {
      throw $ex->getMessage();
    }
    return false;

  }

}
