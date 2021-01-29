<?php
// if(isset($_GET['id']))
// {
//   $id=$_GET['id'];
//   $insumo=$_GET['insumo'];
//   echo $id;
//   echo $insumo;
//   $Dao = new DaoOrtodoncia();
//   //$Dao->
//
// }
require_once('../../../Conexion/DBAAbstractModel1.php');
require_once('../Modelo/EntClinica.php');
require_once('../Modelo/EntInsumo.php');
// require_once('../Interfaz/IntOrtodoncia.php');
class DaoOrtodoncia extends DBAAbstractModel //implements IntOrtodoncia
{
  public function __construct()
  {
    parent::__construct(); // 1ro Inicializa constructor padre
    $this->db_name = 'integrador1'; // Selecciona la BASE DATOS a trabajar
  }

  public function crearInzumos(CabFactura $factura){

  }

  public function consultarClinicas()
  {
    try {
      $clinicas=array();
      $sql = "Select CLI_Id,  CLI_Nombre, CLI_Foto From clinica order by CLI_Id";
      $stmt = $this->getConexion()->prepare($sql);
      $stmt->execute();
      $rs = $stmt->get_result();
      while (($clinica = $rs->fetch_object())) {
        $clinicas[] = new Clinica($clinica->CLI_Id, $clinica->CLI_Nombre, $clinica->CLI_Foto);
      }
      $rs->close();
    } catch (\Exception $e) {

    }
    return $clinicas;
  }

  public function consultarInsumos()
  {
    try {
      $insumos=array();
      $sql = "Select idInsumos, Insumoscol, fotoInsumo From insumos order by idInsumos";
      $stmt = $this->getConexion()->prepare($sql);
      $stmt->execute();
      $rs = $stmt->get_result();
      while (($insumo = $rs->fetch_object())) {
        $insumos[] = new Insumo($insumo->idInsumos, $insumo->Insumoscol, $insumo->fotoInsumo);
      }
      $rs->close();
    } catch (\Exception $e) {

    }
    return $insumos;
  }

  public function consultarInsumo($id){
    try {
      $sql = "Select idInsumos, Insumoscol, fotoInsumo
      From insumos where idInsumos = ?" ;
      $stmt = $this->getConexion()->prepare($sql); //Prepara una sentencia para su ejecución y devuelve un objeto sentencia
      $stmt->bind_param('i', $id); //Agrega variables a una sentencia preparada como parámetros
      $stmt->execute();
      $rs = $stmt->get_result();
      $insumo = null;
      if ($tmp = $rs->fetch_object()) {
        $insumo = new Insumo($tmp->idInsumos, $tmp->Insumoscol, $tmp->fotoInsumo);
      }
      return $insumo;
    } catch (\Exception $ex) {
      throw $ex->getMessage();
    }

  }

  public function consultarClinica($id){
    $usu='';
    try {
      $sql = "Select CLI_Id,  CLI_Nombre, CLI_Foto
      From clinica where  CLI_Id = ?" ;
      $stmt = $this->getConexion()->prepare($sql); //Prepara una sentencia para su ejecución y devuelve un objeto sentencia
      $stmt->bind_param('i', $id); //Agrega variables a una sentencia preparada como parámetros
      $stmt->execute();
      $rs = $stmt->get_result();
      $clinica = null;
      if ($tmp = $rs->fetch_object()) {
        $clinica = new Clinica($tmp->CLI_Id, $tmp->CLI_Nombre, $tmp->CLI_Foto);
      }
      return $clinica;
    } catch (\Exception $ex) {
      throw $ex->getMessage();
    }

    return $usu;

  }

  public function consultarCl($clinica)
  {
    try {
      $sql = "Select * from clinica where CLI_Nombre= ?";
      $stmt = $this->getConexion()->prepare($sql); //Prepara una sentencia para su ejecución y devuelve un objeto sentencia
      $stmt->bind_param('s', $clinica); //Agrega variables a una sentencia preparada como parámetros
      $stmt->execute();
      $stmt->store_result();
      $rows = $stmt->num_rows();
      if($rows>0){
        return true;
      }else{
        return false;
      }
    } catch (\Exception $e) {
      throw $ex->getMessage();
    }
  }

  public function agregarClinica(Clinica $clinica)
  {
    try {
      if(!$this->consultarCl($clinica->__get('CLI_Nombre'))){
        $sql = "Insert into clinica
        (CLI_Id, CLI_Nombre, CLI_Foto)
        values(null, ?, ?);";
        $stmt = $this->getConexion()->prepare($sql);
        //En el caso de ocurrir un error tipo Notice una de las atenrnativas es crear variables intermedias para el paso de valor
        $stmt->bind_param('ss', $clinica->__get('CLI_Nombre'), $clinica->__get('CLI_Foto'));
        $stmt->execute();
        if ($stmt->affected_rows) {
          return true;
        }
      }
    } catch (Exception $ex) {
      throw $ex->getMessage();
    }
    return false;
  }

  public function consultarIn($insumo)
  {
    try {
      $sql = "Select * from insumos where Insumoscol= ?";
      $stmt = $this->getConexion()->prepare($sql); //Prepara una sentencia para su ejecución y devuelve un objeto sentencia
      $stmt->bind_param('s', $insumo); //Agrega variables a una sentencia preparada como parámetros
      $stmt->execute();
      $stmt->store_result();
      $rows = $stmt->num_rows();
      if($rows>0){
        return true;
      }else{
        return false;
      }
    } catch (\Exception $e) {
      throw $ex->getMessage();
    }
  }

  public function agregarInsumo(Insumo $insumo)
  {
    try {
      if(!$this->consultarIn($insumo->__get('Insumoscol'))){
        $sql = "Insert into insumos
        (idInsumos, Insumoscol, fotoInsumo)
        values(null, ?, ?);";
        $stmt = $this->getConexion()->prepare($sql);
        //En el caso de ocurrir un error tipo Notice una de las atenrnativas es crear variables intermedias para el paso de valor
        $stmt->bind_param('ss', $insumo->__get('Insumoscol'), $insumo->__get('fotoInsumo'));
        $stmt->execute();
        if ($stmt->affected_rows) {
          return true;
        }
      }
    } catch (Exception $ex) {
      throw $ex->getMessage();
    }
    return false;
  }

  public function editarInsumo(Insumo $insumo){
    try {
      $sql="Update insumos
      Set Insumoscol = ?, fotoInsumo= ?
      Where idInsumos = ? ";
      $stmt = $this->getConexion()->prepare($sql);
      $stmt->bind_param('ssi', $insumo->__get('Insumoscol'), $insumo->__get('fotoInsumo'),
      $insumo->__get('idInsumos'));
      $stmt->execute();
      if ($stmt->affected_rows) {
        return true;
      }
    } catch (Exception $ex) {
      throw $ex->getMessage();
    }
    return false;
  }

  public function editarClinica(Clinica $clinica){
    try {
      $sql="Update clinica
      Set CLI_Nombre = ?, CLI_Foto= ?
      Where CLI_Id = ? ";
      $stmt = $this->getConexion()->prepare($sql);
      $stmt->bind_param('ssi', $clinica->__get('CLI_Nombre'), $clinica->__get('CLI_Foto'),
      $clinica->__get('CLI_Id'));
      $stmt->execute();
      if ($stmt->affected_rows) {
        return true;
      }
    } catch (Exception $ex) {
      throw $ex->getMessage();
    }
    return false;
  }

  public function eliminarInsumo($id)
  {
    try {
      $sql = "Delete From insumos Where idInsumos = ?";
      $stmt = $this->getConexion()->prepare($sql); //Prepara una sentencia para su ejecución y devuelve un objeto sentencia
      $stmt->bind_param('i', $id); //Agrega variables a una sentencia preparada como parámetros
      $stmt->execute();
      if ($stmt->affected_rows) {
        return true;
      }
    } catch (\Exception $ex) {
      throw $ex->getMessage();
    }

    return false;
  }

  public function eliminarClinica($id)
  {
    try {
      $sql = "Delete From clinica Where idClinica = ?";
      $stmt = $this->getConexion()->prepare($sql); //Prepara una sentencia para su ejecución y devuelve un objeto sentencia
      $stmt->bind_param('i', $id); //Agrega variables a una sentencia preparada como parámetros
      $stmt->execute();
      if ($stmt->affected_rows) {
        return true;
      }
    } catch (\Exception $ex) {
      throw $ex->getMessage();
    }

    return false;
  }

  public function eliminarInsumosCab($id, $insumo){
    try {
      $sql = "Delete From detalle_insumos Where idCabConsulta = ? and idInsumos = ?";
      $stmt = $this->getConexion()->prepare($sql); //Prepara una sentencia para su ejecución y devuelve un objeto sentencia
      $stmt->bind_param('ii', $id, $insumo); //Agrega variables a una sentencia preparada como parámetros
      $stmt->execute();
      if ($stmt->affected_rows) {
        return true;
      }
    } catch (\Exception $ex) {
      throw $ex->getMessage();
    }

    return false;
  }
  public function agregarInsumosCab($id, $insumo){
    try {
      $sql = "insert into detalle_insumos (idCabConsulta, idInsumos) values (? , ?)";
      $stmt = $this->getConexion()->prepare($sql);
      //En el caso de ocurrir un error tipo Notice una de las atenrnativas es crear variables intermedias para el paso de valor
      $stmt->bind_param('ii', $id, $insumo);
      $stmt->execute();
      if ($stmt->affected_rows) {
        return true;
      }

    } catch (Exception $ex) {
      throw $ex->getMessage();
    }
    return false;
  }

  public function consultarInsumosCab($id){
    try {
      $insumos=array();
      $sql = "Select ins.idInsumos as idInsumos, ins.Insumoscol as Insumoscol,
      ins.fotoInsumo as fotoInsumo From detalle_insumos as de, insumos as ins
      where de.idInsumos=ins.idInsumos and de.idCabConsulta= ?";
      $stmt = $this->getConexion()->prepare($sql);
      $stmt->bind_param('i', $id);
      $stmt->execute();
      $rs = $stmt->get_result();
      while (($insumo = $rs->fetch_object())) {
        $insumos[] = new Insumo($insumo->idInsumos, $insumo->Insumoscol, $insumo->fotoInsumo);
      }
      $rs->close();
    } catch (\Exception $e) {

    }
    return $insumos;
  }
}#Fin de la clase modelo Factura
