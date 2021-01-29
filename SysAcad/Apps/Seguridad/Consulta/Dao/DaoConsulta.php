<?php

require_once('../../../Conexion/DBAAbstractModel1.php');
require_once('../Modelo/EntConsulta.php');
require_once('../Modelo/EntProfesional.php');
require_once('../Modelo/EntEnfermedades.php');
require_once('../Modelo/EntFicha.php');
require_once('../Modelo/EntKardex.php');
require_once('../Interfaz/IntConsulta.php');

class DaoConsulta extends DBAAbstractModel implements IntConsulta {

    public function __construct() {
        parent::__construct(); // 1ro Inicializa constructor padre
        $this->db_name = 'integrador1'; // Selecciona la BASE DATOS a trabajar
    }

    public function __destruct() {
//unset($this);
    }

    public $where = null;
    public $where1 = null;
    public $where2 = null;

    public function consultarTodosConsulta() {
        $registros = array();
        try {
            $cn = DBAAbstractModel::getConexion();
            $sql = "select CON_Id ,pro.PRO_Nombre nombre,pro.PRO_Apellido ap,enf.ENF_Descripcion descripcion, pac.PAC_Nombre nombrePaciente,pac.PAC_Apellido ape,CON_Diagnostico,CON_Receta, CON_Trat,p.nombreProd producto, k.stock stock ,CON_Estado,CON_Parte,CON_Pulsa,CON_RRespi,CON_Temp,CON_Altura,CON_Peso,CON_Imc,CON_Fecha from consulta con,profesional pro, enfermedades enf, fichamedica fic, paciente pac, comtbcab_kardex k, comtbproducto p where con.PRO_Id = pro.PRO_Id and con.ENF_Id = enf.ENF_Id and  con.FIC_Id = fic.FIC_Id and con.idKardex = k.idKardex and fic.PAC_Id = pac.PAC_Id and k.idProducto = p.idProducto";

            if ($this->where) {
                $sql .= " and INSTR(PAC_Nombre,'" . $this->where . "') or INSTR(PAC_Apellido,'" . $this->where . "')";
            } else if ($this->where2) {
                $sql .= " and INSTR(PRO_Nombre,'" . $this->where2 . "') or INSTR(PRO_Apellido,'" . $this->where2 . "')";
            } else if ($this->where1) {
                $sql .= " and INSTR(ENF_Descripcion,'" . $this->where1 . "')";
            }

            $stmt = $cn->prepare($sql);
            $stmt->execute();
            $rs = $stmt->get_result();
            while (($objeto = $rs->fetch_object())) {
                $registros[] = new EntConsulta($objeto->CON_Id, null, $objeto->nombre . " " . $objeto->ap, $objeto->descripcion, $objeto->nombrePaciente . " " . $objeto->ape, $objeto->CON_Diagnostico, $objeto->CON_Receta, $objeto->CON_Trat, $objeto->producto."\nStock: ".$objeto->stock, $objeto->CON_Estado
                        , $objeto->CON_Parte, $objeto->CON_Pulsa, $objeto->CON_RRespi, $objeto->CON_Temp
                        , $objeto->CON_Altura, $objeto->CON_Peso, $objeto->CON_Imc, $objeto->CON_Fecha);
            }
            $rs->close();
        } catch (Exception $ex) {
            throw $ex->getMessage();
        }
        return $registros;
    }

    public function consultarProfesional() {
        $registros = array();
        try {
            $cn = DBAAbstractModel::getConexion();
            $sql = "Select PRO_Id,c.CAR_Nombre cCAR_Nombre,PRO_Cedula,PRO_Nombre,PRO_Apellido,PRO_Direccion,PRO_Telefono,PRO_Estado from profesional p,cargo c where p.CAR_ID = c.CAR_ID";
            $stmt = $cn->prepare($sql);
            $stmt->execute();
            $rs = $stmt->get_result();
            while (($objeto = $rs->fetch_object())) {
                $registros[] = new EntProfesional($objeto->PRO_Id, $objeto->cCAR_Nombre, $objeto->PRO_Cedula, $objeto->PRO_Nombre, $objeto->PRO_Apellido, $objeto->PRO_Direccion, $objeto->PRO_Telefono, $objeto->PRO_Estado);
            }
            $rs->close();
        } catch (Exception $ex) {
            throw $ex->getMessage();
        }
        return $registros;
    }

    public function consultarEnfermedadades() {
        $enfermedades = array();
        try {
            $cn = DBAAbstractModel::getConexion();
            $sql = "SELECT * FROM enfermedades";
            $stmt = $cn->prepare($sql);
            $stmt->execute();
            $rs = $stmt->get_result();
            while (($enfermedad = $rs->fetch_object())) {
                $enfermedades[] = new Enfermedades($enfermedad->ENF_Id, $enfermedad->ENF_Codigo, $enfermedad->ENF_Descripcion, $enfermedad->ENF_Estado);
            }
            $rs->close();
        } catch (Exception $ex) {
            throw $ex->getMessage();
        }
        return $enfermedades;
    }

     public function consuKardex() {
        $enfermedades = array();
        try {
            $cn = DBAAbstractModel::getConexion();
            $sql = "SELECT idKardex, p.nombreProd nom, u_medida, minUnidad, maxUnidad, k.stock, valorUnitario 
            FROM comtbcab_kardex k, comtbproducto p
            where k.idProducto = p.idProducto";
            $stmt = $cn->prepare($sql);
            $stmt->execute();
            $rs = $stmt->get_result();
            while (($enfermedad = $rs->fetch_object())) {
                $enfermedades[] = new Kardex($enfermedad->idKardex, $enfermedad->nom, $enfermedad->u_medida, $enfermedad->minUnidad, $enfermedad->maxUnidad, $enfermedad->stock,$enfermedad->valorUnitario);
            }
            $rs->close();
        } catch (Exception $ex) {
            throw $ex->getMessage();
        }
        return $enfermedades;
    }

    public function consultarFicha() {
        $fichas = array();
        try {
            $cn = DBAAbstractModel::getConexion();
            $sql = "Select FIC_Id,p.PAC_Nombre as nombre, p.PAC_Apellido as ap,FIC_Antecedentes, FIC_Alergias, FIC_Tratamiento, FIC_Familiares, FIC_Estado  From fichamedica f, paciente p where f.PAC_Id = p.PAC_Id";
            $stmt = $cn->prepare($sql);
            $stmt->execute();
            $rs = $stmt->get_result();
            while (($ficha = $rs->fetch_object())) {
                $fichas[] = new EntFicha($ficha->FIC_Id, $ficha->nombre . " " . $ficha->ap, $ficha->FIC_Antecedentes, $ficha->FIC_Alergias, $ficha->FIC_Tratamiento, $ficha->FIC_Familiares, $ficha->FIC_Estado);
            }
            $rs->close();
        } catch (Exception $ex) {
            throw $ex->getMessage();
        }
        return $fichas;
    }

    public function consultarConsulta($id) {
        try {
            $sql = "Select *  From consulta Where CON_Id = ?";

            $stmt = $this->getConexion()->prepare($sql); //Prepara una sentencia para su ejecución y devuelve un objeto sentencia
            $stmt->bind_param('s', $id); //Agrega variables a una sentencia preparada como parámetros
            $stmt->execute();
            $rs = $stmt->get_result();
            $registros = null;
            if ($objeto = $rs->fetch_object()) {
                $registros = new EntConsulta($objeto->CON_Id, null, $objeto->PRO_Id, $objeto->ENF_Id, $objeto->FIC_Id, $objeto->CON_Diagnostico, $objeto->CON_Receta, $objeto->CON_Trat, $objeto->idKardex,$objeto->CON_Estado
                        , $objeto->CON_Parte, $objeto->CON_Pulsa, $objeto->CON_RRespi, $objeto->CON_Temp
                        , $objeto->CON_Altura, $objeto->CON_Peso, $objeto->CON_Imc, $objeto->CON_Fecha);
            }
        } catch (\Exception $ex) {
            throw $ex->getMessage();
        }

        return $registros;
    }

    public function Activo($id) {
        try {
            $sql = 'UPDATE consulta SET CON_Estado=1 WHERE CON_Id=?';
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
            $sql = 'UPDATE consulta SET CON_Estado=0 WHERE CON_Id=?';
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

    public function eliminarCompleto($id) {
        try {
            $sql = 'Delete From consulta WHERE CON_Id = ?';
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

    public function crearConsulta(\EntConsulta $registro) {
        try {
            //$this->consultar($usuario->usuario);     //Verifica si el registro existe en la base de datos
            $sql = "Insert into consulta (PRO_Id , ENF_Id,FIC_Id,CON_Diagnostico,CON_Receta,CON_Trat,idKardex,CON_Estado,CON_Parte,CON_Pulsa,CON_RRespi,CON_Temp,CON_Altura,CON_Peso,CON_Imc,CON_Fecha) values(?,?,?,?,?,?,?,?,?,?,?, ?,?, ?,?, ?);";
            $stmt = $this->getConexion()->prepare($sql);
            //En el caso de ocurrir un error tipo Notice una de las atenrnativas es crear variables intermedias para el paso de valor
            $stmt->bind_param('ssssssssssssssss', $registro->__get('PRO_Id'), $registro->__get('ENF_Id')
                    , $registro->__get('FIC_Id'), $registro->__get('CON_Diagnostico')
                    , $registro->__get('CON_Receta'), $registro->__get('CON_Trat'), $registro->__get('idKardex'),  $registro->__get('CON_Estado')
                    , $registro->__get('CON_Parte'), $registro->__get('CON_Pulsa')
                    , $registro->__get('CON_RRespi'), $registro->__get('CON_Temp')
                    , $registro->__get('CON_Altura'), $registro->__get('CON_Peso')
                    , $registro->__get('CON_Imc'), $registro->__get('CON_Fecha'));
            $stmt->execute();
            if ($stmt->affected_rows) {
                return true;
            }
        } catch (Exception $ex) {
            throw $ex->getMessage();
        }
        return false;
    }

    public function editarConsulta(\EntConsulta $registro) {

    }

}
