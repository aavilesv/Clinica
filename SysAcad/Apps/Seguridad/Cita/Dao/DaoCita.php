<?php

require_once('../../../Conexion/DBAAbstractModel1.php');
require_once('../Modelo/EntCita.php');
require_once('../Modelo/EntPaciente.php');
require_once('../Modelo/EntProfesional.php');
require_once('../Interfaz/IntCita.php');

class DaoCita extends DBAAbstractModel implements IntCita {

    public function __construct() {
        parent::__construct(); // 1ro Inicializa constructor padre
        $this->db_name = 'integrador1'; // Selecciona la BASE DATOS a trabajar
    }

    public function __destruct() {
//unset($this);
    }

    public $where = null;
    public $where1 = null;



    public function consultarTodosCitas() {
        $registros = array();
        try {
            $cn = DBAAbstractModel::getConexion();
            $sql = "Select CIT_Id , pac.PAC_Nombre nombrePaciente,  pac.PAC_Apellido apellido, pac.PAC_Id id, pro.PRO_Nombre nombreProfesional, pro.PRO_Apellido apellidoP, pro.PRO_Id idp,CIT_Fecha,CIT_Turno,CIT_Duracion,CIT_Estado from cita cin,profesional pro, paciente pac where cin.PAC_Id = pac.PAC_Id  and cin.PRO_Id = pro.PRO_Id and date(CIT_Fecha)=date(NOW()) group by CIT_Fecha,CIT_Turno order by CIT_Fecha,CIT_Turno";

            if ($this->where) {
                $sql .= " and INSTR(PAC_Nombre,'" . $this->where . "') or  INSTR(PAC_Apellido,'" . $this->where . "')   ";
            }
            if ($this->where1) {
                $sql .= " and INSTR(PRO_Nombre,'" . $this->where1 . "') or  INSTR(PRO_Apellido,'" . $this->where . "') ";
            }

            $stmt = $cn->prepare($sql);
            $stmt->execute();
            $rs = $stmt->get_result();
            while (($objeto = $rs->fetch_object())) {
                $registros[] = new EntCita($objeto->CIT_Id, $objeto->nombrePaciente . " " . $objeto->apellido, $objeto->nombreProfesional . " " . $objeto->apellidoP, $objeto->CIT_Fecha, $objeto->CIT_Turno, $objeto->CIT_Duracion, $objeto->CIT_Estado,$objeto->id, $objeto->idp);
            }
            $rs->close();
        } catch (Exception $ex) {
            throw $ex->getMessage();
        }
        return $registros;
    }

    public function consultarTodosCitas1() {
        $registros = array();
        try {
            $cn = DBAAbstractModel::getConexion();
            $sql = "Select CIT_Id , pac.PAC_Nombre nombrePaciente,  pac.PAC_Apellido apellido, pac.PAC_Id id, pro.PRO_Nombre nombreProfesional, pro.PRO_Apellido apellidoP, pro.PRO_Id idp, CIT_Fecha,CIT_Turno,CIT_Duracion, CIT_Estado from cita cin,profesional pro, paciente pac where cin.PAC_Id = pac.PAC_Id  and cin.PRO_Id = pro.PRO_Id and date(CIT_Fecha)<date(NOW()) group by CIT_Fecha,CIT_Turno order by CIT_Fecha,CIT_Turno";
            if ($this->where) {
                $sql .= " and INSTR(PAC_Nombre,'" . $this->where . "')";
            }
            if ($this->where1) {
                $sql .= " and INSTR(PRO_Nombre,'" . $this->where1 . "')";
            }
            $stmt = $cn->prepare($sql);
            $stmt->execute();
            $rs = $stmt->get_result();
            while (($objeto = $rs->fetch_object())) {

                $registros[] = new EntCita($objeto->CIT_Id, $objeto->nombrePaciente . " " . $objeto->apellido, $objeto->nombreProfesional . " " . $objeto->apellidoP, $objeto->CIT_Fecha, $objeto->CIT_Turno, $objeto->CIT_Duracion, $objeto->CIT_Estado,$objeto->id, $objeto->idp);
                $sql = 'UPDATE cita SET CIT_Estado=0 where CIT_Id=?';
                $stmt = $this->getConexion()->prepare($sql); //Prepara una sentencia para su ejecución y devuelve un objeto sentencia
                $stmt->bind_param('i', $objeto->CIT_Id); //Agrega variables a una sentencia preparada como parámetros
                $stmt->execute();
            }
            $rs->close();
        } catch (Exception $ex) {
            throw $ex->getMessage();
        }
        return $registros;
    }

    public function consultarTodosCitas2() {
        $registros = array();
        try {
            $cn = DBAAbstractModel::getConexion();
            $sql = "Select CIT_Id , pac.PAC_Nombre nombrePaciente,  pac.PAC_Apellido apellido, pac.PAC_Id id, pro.PRO_Nombre nombreProfesional, pro.PRO_Apellido apellidoP, pro.PRO_Id idp, CIT_Fecha,CIT_Turno, CIT_Duracion,CIT_Estado from cita cin,profesional pro, paciente pac where cin.PAC_Id = pac.PAC_Id  and cin.PRO_Id = pro.PRO_Id and date(CIT_Fecha)>date(NOW()) group by CIT_Fecha,CIT_Turno order by CIT_Fecha,CIT_Turno";
            if ($this->where) {
                $sql .= " and INSTR(PAC_Nombre,'" . $this->where . "')";
            }
            if ($this->where1) {
                $sql .= " and INSTR(PRO_Nombre,'" . $this->where1 . "')";
            }
            $stmt = $cn->prepare($sql);
            $stmt->execute();
            $rs = $stmt->get_result();
            while (($objeto = $rs->fetch_object())) {

                $registros[] = new EntCita($objeto->CIT_Id, $objeto->nombrePaciente . " " . $objeto->apellido, $objeto->nombreProfesional . " " . $objeto->apellidoP, $objeto->CIT_Fecha, $objeto->CIT_Turno, $objeto->CIT_Duracion, $objeto->CIT_Estado,$objeto->id, $objeto->idp);
                $sql = 'UPDATE cita SET CIT_Estado=1 where CIT_Id=?';
                $stmt = $this->getConexion()->prepare($sql); //Prepara una sentencia para su ejecución y devuelve un objeto sentencia
                $stmt->bind_param('i', $objeto->CIT_Id); //Agrega variables a una sentencia preparada como parámetros
                $stmt->execute();
            }
            $rs->close();
        } catch (Exception $ex) {
            throw $ex->getMessage();
        }
        return $registros;
    }

    public function consultarPaciente() {
        $fichas = array();
        try {
            $cn = DBAAbstractModel::getConexion();
            $sql = "select * from paciente";
            $stmt = $cn->prepare($sql);
            $stmt->execute();
            $rs = $stmt->get_result();
            while (($objeto = $rs->fetch_object())) {
                $fichas[] = new EntPaciente($objeto->PAC_Id, $objeto->PAC_Cedula, $objeto->PAC_Nombre, $objeto->PAC_Apellido, $objeto->PAC_Sexo, null, null, $objeto->PAC_Edad, null, NULL, null, null, $objeto->PAC_Foto);
            }
            $rs->close();
        } catch (Exception $ex) {
            throw $ex->getMessage();
        }
        return $fichas;
    }

    public function consultarProfesional() {
        $fichas = array();
        try {
            $cn = DBAAbstractModel::getConexion();
            $sql = "select * from profesional";
            $stmt = $cn->prepare($sql);
            $stmt->execute();
            $rs = $stmt->get_result();
            while (($objeto = $rs->fetch_object())) {
                $fichas[] = new EntProfesional($objeto->PRO_Id, null,$objeto->PRO_Cedula, $objeto->PRO_Nombre, $objeto->PRO_Apellido,  null, null, null, $objeto->PRO_Foto);
            }
            $rs->close();
        } catch (Exception $ex) {
            throw $ex->getMessage();
        }
        return $fichas;
    }

    public function consultarCita($id) {
        try {
            $sql = "Select *  From cita Where CIT_Id = ?";

            $stmt = $this->getConexion()->prepare($sql); //Prepara una sentencia para su ejecución y devuelve un objeto sentencia
            $stmt->bind_param('s', $id); //Agrega variables a una sentencia preparada como parámetros
            $stmt->execute();
            $rs = $stmt->get_result();
            $registros = null;
            if ($objeto = $rs->fetch_object()) {
                $registros = new EntCita($objeto->CIT_Id, $objeto->PAC_Id, $objeto->PRO_Id, $objeto->CIT_Fecha, $objeto->CIT_Turno, $objeto->CIT_Estado);
            }
        } catch (\Exception $ex) {
            throw $ex->getMessage();
        }
        return $registros;
    }

    public function eliminarCompleto($id) {
        try {
            $sql = 'Delete From cita WHERE CIT_Id=?';
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

    public function crearCita(\EntCita $registro) {
        try {
            //$this->consultar($usuario->usuario);     //Verifica si el ficha existe en la base de datos
            $sql = "Insert into cita (PAC_Id , PRO_Id,CIT_Fecha,CIT_Turno,CIT_Duracion,CIT_Estado) values(?, ?,?,?, ?,?);";
            $stmt = $this->getConexion()->prepare($sql);
            //En el caso de ocurrir un error tipo Notice una de las atenrnativas es crear variables intermedias para el paso de valor
            $stmt->bind_param('ssssss', $registro->__get('PAC_Id'), $registro->__get('PRO_Id')
                    , $registro->__get('CIT_Fecha')
                    , $registro->__get('CIT_Turno'), $registro->__get('CIT_Duracion'), $registro->__get('CIT_Estado'));
            $stmt->execute();

            if ($stmt->affected_rows) {
                return true;
            }
        } catch (Exception $ex) {
            throw $ex->getMessage();
        }
        return false;
    }

    public function editarCita(\EntCita $registro) {
        try {
            $sql = "Update cita Set PAC_Id=?, PRO_Id=?, CIT_Fecha=?, CIT_Turno=?, CIT_Duracion=?, CIT_Estado=? Where CIT_Id = ? ";
            $stmt = $this->getConexion()->prepare($sql);
            $stmt->bind_param('sssssss', $registro->__get('PAC_Id'), $registro->__get('PRO_Id')
                    , $registro->__get('CIT_Fecha')
                    , $registro->__get('CIT_Turno'), $registro->__get('CIT_Duracion'), $registro->__get('CIT_Estado'), $registro->__get('CIT_Id'));
            $stmt->execute();
            if ($stmt->affected_rows) {
                return true;
            }
        } catch (Exception $ex) {
            throw $ex->getMessage();
        }
        return false;
    }

    public function Activo($id) {
        try {
            $sql = 'UPDATE cita SET CIT_Estado=1 WHERE CIT_Id=?';
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
            $sql = 'UPDATE cita SET CIT_Estado=0 WHERE CIT_Id=?';
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
