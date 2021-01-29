<?php

require_once('../../Conexion/DBAAbstractModel1.php');
require_once('../Modelo/EntClinica.php');
require_once('../Interfaz/IntClinica.php');

class DaoClinica extends DBAAbstractModel implements IntClinica {

    public function __construct() {
        parent::__construct(); // 1ro Inicializa constructor padre
        $this->db_name = 'integrador'; // Selecciona la BASE DATOS a trabajar
    }

    public function __destruct() {
//unset($this);
    }

    public function Activo($id) {
        try {
            $sql = 'UPDATE clinica SET cli_Estado=1 WHERE cli_Id=?';
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

    public function Inactivo($id) {
        try {
            $sql = 'UPDATE clinica SET cli_Estado=0 WHERE cli_Id=?';
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

    public function consultarClinica($clinica) {
        try {
            $sql = "Select *  From clinica Where cli_Id = ?";
            $stmt = $this->getConexion()->prepare($sql); //Prepara una sentencia para su ejecución y devuelve un objeto sentencia
            $stmt->bind_param('s', $clinica); //Agrega variables a una sentencia preparada como parámetros
            $stmt->execute();
            $rs = $stmt->get_result();
            $clinica = null;
            if ($tmp = $rs->fetch_object()) {
                $clinica = new Clinicas($tmp->cli_Id, $tmp->cli_Nombre, $tmp->cli_Direc, $tmp->cli_Telefono, $tmp->cli_Prop, $tmp->cli_Correo, $tmp->cli_Fax, $tmp->cli_PagWeb, $tmp->cli_FecCrea, $tmp->cli_FecMod, $tmp->cli_Estado);
            }
        } catch (\Exception $ex) {
            throw $ex->getMessage();
        }

        return $clinica;
    }

    public $where = null;

    public function consultarTodosClinica() {
        $clinicas = array();
        try {
            $cn = DBAAbstractModel::getConexion();
            $sql = "Select * From clinica";


            if ($this->where) {
                $sql .= " Where INSTR(cli_Nombre,'" . $this->where . "') or INSTR(cli_Direc,'" . $this->where . "')";
            }

            $stmt = $cn->prepare($sql);
            $stmt->execute();
            $rs = $stmt->get_result();
            while (($clinica = $rs->fetch_object())) {
                $clinicas[] = new Clinicas($clinica->cli_Id, $clinica->cli_Nombre, $clinica->cli_Direc, $clinica->cli_Telefono, $clinica->cli_Prop, $clinica->cli_Correo, $clinica->cli_Fax, $clinica->cli_PagWeb, $clinica->cli_FecCrea, $clinica->cli_FecMod, $clinica->cli_Estado);
            }
            $rs->close();
        } catch (Exception $ex) {
            throw $ex->getMessage();
        }
        return $clinicas;
    }

    public function crearClinica(\Clinicas $clinica) {
        try {
            //$this->consultar($usuario->usuario);     //Verifica si el registro existe en la base de datos
            $sql = "Insert into clinica (cli_Nombre, cli_Direc, cli_Telefono, cli_Prop, cli_Correo, cli_Fax, cli_PagWeb, cli_FecCrea, cli_FecMod, cli_Estado) values(?, ?, ?, ? , ?, ?, ?, ?, ?, ?);";
            $stmt = $this->getConexion()->prepare($sql);
            //En el caso de ocurrir un error tipo Notice una de las atenrnativas es crear variables intermedias para el paso de valor
            $stmt->bind_param('ssssssssss', $clinica->__get('cli_Nombre'), $clinica->__get('cli_Direc'), $clinica->__get('cli_Telefono'), $clinica->__get('cli_Prop'), $clinica->__get('cli_Correo'), $clinica->__get('cli_Fax'), $clinica->__get('cli_PagWeb'), $clinica->__get('cli_FecCrea'), $clinica->__get('cli_FecMod'), $clinica->__get('cli_Estado'));


            $stmt->execute();

            if ($stmt->affected_rows) {
                return true;
            }
        } catch (Exception $ex) {
            throw $ex->getMessage();
        }
        return false;
    }

    public function editarClinica(\Clinicas $clinica) {
        try {

            $sql = "Update clinica Set cli_Nombre=?, cli_Direc=?, cli_Telefono=?, cli_Prop=?, cli_Correo=?, cli_Fax=?, cli_PagWeb=?, cli_FecMod=?, cli_Estado=? Where cli_Id=? ";
            $stmt = $this->getConexion()->prepare($sql);


            $stmt->bind_param('ssssssssss', $clinica->__get('cli_Nombre'), $clinica->__get('cli_Direc'), $clinica->__get('cli_Telefono'), $clinica->__get('cli_Prop'), $clinica->__get('cli_Correo'), $clinica->__get('cli_Fax'), $clinica->__get('cli_PagWeb'), $clinica->__get('cli_FecMod'), $clinica->__get('cli_Estado'), $clinica->__get('cli_Id'));

            $stmt->execute();


            if ($stmt->affected_rows) {

                return true;
            }
        } catch (Exception $ex) {
            throw $ex->getMessage();
        }
        return false;
    }

    public function eliminarCompleto($id) {
        try {
            $sql = 'Delete From clinica WHERE cli_Id=?';
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

}
