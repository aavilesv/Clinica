<?php

class CtrConsulta {

    private $modelo;
    private $dao;

    public function __construct() {
        require_once("../Dao/DaoConsulta.php");
        require_once('../Modelo/EntConsulta.php');
        require_once('../Modelo/EntProfesional.php');
        require_once('../Modelo/EntEnfermedades.php');
        require_once('../Modelo/EntKardex.php');
        require_once('../Modelo/EntFicha.php');

        $this->dao = new DaoConsulta();
        $this->modelo = new EntConsulta();
    }

    public function getConsultas() {

        if (isset($_GET['q'])) {
            $q = $_GET['q'];
            $this->dao = new DaoConsulta();
            $this->dao->where = $q;
            return $this->dao->consultarTodosConsulta();
        }else if (isset($_GET['q1'])) {
            $q1 = $_GET['q1'];
            $this->dao = new DaoConsulta();
            $this->dao->where1 = $q1;
            return $this->dao->consultarTodosConsulta();
        } else if (isset($_GET['q2'])) {
            $q2 = $_GET['q2'];
            $this->dao = new DaoConsulta();
            $this->dao->where2 = $q2;
            return $this->dao->consultarTodosConsulta();
        }  else {
            $this->dao = new DaoConsulta();
            return $this->dao->consultarTodosConsulta();
        }
    }

    public function getConsulta($id) {
        $this->dao = new DaoConsulta();
        return $this->dao->consultarConsulta($id);
    }

    public function eliminar($Id) {
        $this->dao = new DaoConsulta();
        $this->dao->Inactivo($Id);
        header("Location:../Vista/ListarConsulta.php");
    }

    public function eliminar1($Id) {
        $this->dao = new DaoConsulta();
        $this->dao->Activo($Id);
        header("Location:../Vista/ListarConsulta.php");
    }

    public function getProfesional() {
        $this->dao = new DaoConsulta();
        return $this->dao->consultarProfesional();
    }

    public function getEnfermedades() {
        $this->dao = new DaoConsulta();
        return $this->dao->consultarEnfermedadades();
    }

    public function getFicha() {
        $this->dao = new DaoConsulta();
        return $this->dao->consultarFicha();
    }
    
     public function getKardex() {
        $this->dao = new DaoConsulta();
        return $this->dao->consuKardex();
    }
    
    public function eliminarCompleto($Id) {
        $this->dao = new DaoConsulta();
        $this->dao->eliminarCompleto($Id);
        header("Location:../Vista/ListarConsulta.php");
    }

    public function nuevo() {
        //$nuevoUsuario = new Usuario($_REQUEST['id'], $_REQUEST['nombre'], $_REQUEST['apellido'], $_REQUEST['usuario'], $_REQUEST['clave']);
        $this->modelo = new EntConsulta();
        $this->modelo->__set('CON_Id', $_REQUEST['id']);
        $this->modelo->__set('PRO_Id', $_REQUEST['PRO_Id']);
        $this->modelo->__set('ENF_Id', $_REQUEST['ENF_Id']);
        $this->modelo->__set('FIC_Id', $_REQUEST['FIC_Id']);
        $this->modelo->__set('CON_Diagnostico', $_REQUEST['CON_Diagnostico']);
        $this->modelo->__set('CON_Receta', $_REQUEST['CON_Receta']);
        $this->modelo->__set('CON_Trat', $_REQUEST['CON_Trat']);
        $this->modelo->__set('idKardex', $_REQUEST['idKardex']);
        $this->modelo->__set('CON_Estado', 1);
        $this->modelo->__set('CON_Parte', $_REQUEST['CON_Parte']);
        $this->modelo->__set('CON_Pulsa', $_REQUEST['CON_Pulsa']);
        $this->modelo->__set('CON_RRespi', $_REQUEST['CON_RRespi']);
        $this->modelo->__set('CON_Temp', $_REQUEST['CON_Temp']);
        $this->modelo->__set('CON_Altura', $_REQUEST['CON_Altura']);
        $this->modelo->__set('CON_Peso', $_REQUEST['CON_Peso']);
        $this->modelo->__set('CON_Imc', $_REQUEST['CON_Imc']);
        $this->modelo->__set('CON_Fecha', $_REQUEST['CON_Fecha']);
        
        $this->dao = new DaoConsulta();
        $this->dao->crearConsulta($this->modelo);
        header("Location: ../Vista/ListarConsulta.php");
    }

    public function editar() {
       
        
    }

}
