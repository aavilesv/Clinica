<?php
/**
 * Entidad USUARIO cliente
 */
require_once('../../../../Conexion/DBAAbstractModel1.php');
require_once('../Modelo/EntCliente.php');
require_once('../Interfaz/IntCliente.php');
class DaoClienteModel extends DBAAbstractModel implements IntCliente
{
    public function __construct()
    {
        parent::__construct(); // 1ro Inicializa constructor padre
        $this->db_name = 'integrador1'; // Selecciona la BASE DATOS a trabajar
    }
        public $where = null;
/*
    public function nuevo($usuario = array())
    {
        if (array_key_exists('usuario', $usuario)) {
            $this->consultar($usuario['usuario']);     //Verifica si el registro existe en la base de datos

            if ($usuario['usuario']!=$this->usuario) {
                foreach ($usuario as $campo => $valor):
              $this->$campo = $valor;
                endforeach;

                $this->query = "Insert into departamento
                          (Nombre,JefedeArea,CantidadPersonal,Estado)
                            values(null,'$this->Nombre', $this->JefedeArea, '$this->CantidadPersonal', '$this->Estado');";

                $this->ejecutaConsulta();
                return true;
            } else {
                echo "Usuario:".$usuario['usuario']. " se encuentra registrado!<br>";
                return false;
            }
        } else {
            echo "Usuario:".$usuario['usuario']. " se encuentra registrado!<br>";
            return false;
        }
    }*/
    public function crearCliente(Cliente $Client)
    {

        try {
            //$this->consultar($usuario->usuario);     //Verifica si el registro existe en la base de datos
            $sql = 	"insert into faccliente (FACCliId,FACCliNombre,FACCliApellido,FACCliCedula,FACCliDireccion,
        	FACCliCelular,FACCliEmail,FACCliUsuarioCrea,FACCliUsuaModif,FACCliEstado,FACCliFechaCrea,FACCliFechaFechaUltima)
        	values (null,?,?,?,?,?,?,?,?,?,?,?);";
            $stmt = $this->getConexion()->prepare($sql);
            //En el caso de ocurrir un error tipo Notice una de las atenrnativas es crear variables intermedias para el paso de valor
            $stmt->bind_param('ssssssssiss', $Client->__get('FACCliNombre'),$Client->__get('FACCliApellido'),$Client->__get('FACCliCedula'), $Client->__get('FACCliDireccion'), $Client->__get('FACCliCelular'),$Client->__get('FACCliEmail'),
        $Client->__get('FACCliUsuarioCrea'),$Client->__get('FACCliUsuaModif'),$Client->__get('FACCliEstado'),$Client->__get('FACCliFechaCrea'),$Client->__get('FACCliFechaFechaUltima'));
            $stmt->execute();
            if ($stmt->affected_rows) {
                return true;
            }
        } catch (Exception $ex) {
            throw $ex->getMessage();
        }
        return false;
    }


    public function editarCliente(Cliente $Client)
    {
        try {
            $sql="update faccliente
		  set FACCliNombre=?,FACCliApellido=?,FACCliCedula=?,FACCliDireccion=?,
		 FACCliCelular=?,FACCliEmail=?,FACCliUsuarioCrea=?,FACCliUsuaModif=?,
		 FACCliEstado=?,FACCliFechaCrea=?,FACCliFechaFechaUltima=? where FACCliId=? ";
            $stmt = $this->getConexion()->prepare($sql);
            $stmt->bind_param('ssssssssissi', $Client->__get('FACCliNombre'),$Client->__get('FACCliApellido'),$Client->__get('FACCliCedula'), $Client->__get('FACCliDireccion'), $Client->__get('FACCliCelular'),$Client->__get('FACCliEmail'),
        $Client->__get('FACCliUsuarioCrea'),$Client->__get('FACCliUsuaModif'),$Client->__get('FACCliEstado'),$Client->__get('FACCliFechaCrea'),$Client->__get('FACCliFechaFechaUltima'),$Client->__get('FACCliId'));

            $stmt->execute();
            if ($stmt->affected_rows) {
                return true;
            }
        } catch (Exception $ex) {
            throw $ex->getMessage();
        }
        return false;
    }

    public function eliminarCliente($id)
    {
        try {
            $sql = "Delete From faccliente Where FACCliId = ?";
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

    public function __destruct()
    {
        //unset($this);
    }

    public function consultarCliente($Client)
    {
        try {
            $sql = "Select  FACCliId,FACCliNombre,FACCliApellido,FACCliCedula,FACCliDireccion,
        	FACCliCelular,FACCliEmail,FACCliUsuarioCrea,FACCliUsuaModif,FACCliEstado,FACCliFechaCrea
			  ,FACCliFechaFechaUltima From faccliente
			  Where FACCliId  = ?" ;
            $stmt = $this->getConexion()->prepare($sql); //Prepara una sentencia para su ejecución y devuelve un objeto sentencia
            $stmt->bind_param('i', $Client); //Agrega variables a una sentencia preparada como parámetros
            $stmt->execute();
            $rs = $stmt->get_result();
            $Client = null;
            if ($tmp = $rs->fetch_object()) {
                $Client = new Cliente($tmp->FACCliId, $tmp->FACCliNombre, $tmp->FACCliApellido,$tmp->FACCliCedula, $tmp->FACCliDireccion, $tmp->FACCliCelular,
                $tmp->FACCliEmail, $tmp->FACCliUsuarioCrea, $tmp->FACCliUsuaModif, $tmp->FACCliEstado, $tmp->FACCliFechaCrea,$tmp->FACCliFechaFechaUltima);
            }
        } catch (\Exception $ex) {
            throw $ex->getMessage();
        }

        return $Client;
    }


    public function consultarTodosClientes()
    {
        $Clientes = array();
        try {
            $sql = "Select FACCliId,FACCliNombre,FACCliApellido,FACCliCedula,FACCliDireccion,
        	FACCliCelular,FACCliEmail,FACCliUsuarioCrea,FACCliUsuaModif,FACCliEstado,FACCliFechaCrea,FACCliFechaFechaUltima From faccliente where FACCliEstado = 1";

         if ($this->where) {
            $sql .= " where INSTR(FACCliNombre,'" . $this->where . "') and INSTR(FACCliApellido,'".$this->where."')";
        }
            $stmt = $this->getConexion()->prepare($sql);
            $stmt->execute();
            $rs = $stmt->get_result();
              while (($Client = $rs->fetch_object())) {
              $Clientes[] = new Cliente($Client->FACCliId, $Client->FACCliNombre, $Client->FACCliApellido,$Client->FACCliCedula,
               $Client->FACCliDireccion, $Client->FACCliCelular,$Client->FACCliEmail, $Client->FACCliUsuarioCrea, $Client->FACCliUsuaModif,  $Client->FACCliEstado, $Client->FACCliFechaCrea,$Client->FACCliFechaFechaUltima);
            }
            $rs->close();
        } catch (Exception $ex) {
            throw $ex->getMessage();
        }
        return $Clientes;
    }

    public function consultarTipoClientes()
    {
      $Clientes = array();
        try {
            $sql = "Select FACCliId,FACCliNombre,FACCliApellido From faccliente where FACCliEstado = 1
			      Order By FACCliApellido";
            $stmt = $this->getConexion()->prepare($sql);
            $stmt->execute();
            $rs = $stmt->get_result();
            while (($Client = $rs->fetch_object())) {
              $Clientes[] = array('id' => $Client->FACCliId,'name' => $Client->FACCliNombre." ".$Client->FACCliApellido);
            }
            $rs->close();
        } catch (Exception $ex) {
            throw $ex->getMessage();
        }
        return $Clientes;
    }

    public function consultarPacientes()
    {
      $Clientes = array();
        try {
            $sql = "Select PACID,PACNombre,PACApellido From MANPaciente
			      Order By PACApellido";
            $stmt = $this->getConexion()->prepare($sql);
            $stmt->execute();
            $rs = $stmt->get_result();
            while (($Client = $rs->fetch_object())) {
              $Clientes[] = array('id' => $Client->PACID,'name' => $Client->PACNombre." ".$Client->PACApellido);
            }
            $rs->close();
        } catch (Exception $ex) {
            throw $ex->getMessage();
        }
        return $Clientes;
    }

    public function consultarPaciente($id)
    {
      $Clientes;
        try {
            $sql = "Select PACNombre, PACCiudad,PACApellido From MANPaciente
			      where PACID = ?";
            $stmt = $this->getConexion()->prepare($sql); //Prepara una sentencia para su ejecución y devuelve un objeto sentencia
            $stmt->bind_param('i', $id); //Agrega variables a una sentencia preparada como parámetros
            $stmt->execute();
            $rs = $stmt->get_result();
            if ($tmp = $rs->fetch_object()) {
              $Clientes = array('name'=>$tmp->PACNombre." ".$tmp->PACApellido, 'dire' => $tmp->PACCiudad);
            }
            $rs->close();
        } catch (Exception $ex) {
            throw $ex->getMessage();
        }
        return $Clientes;
    }
}#Fin de la clase modelo Usuario
