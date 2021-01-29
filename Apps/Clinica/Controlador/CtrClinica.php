<?php

class CtrClinica {

    private $modelo;
    private $dao;

    public function __construct() {
        require_once("../Dao/DaoClinica.php");
        require_once("../Modelo/EntClinica.php");

        $this->dao = new DaoClinica();
        $this->modelo = new Clinicas();
    }

    public function getClinicas() {
        if (isset($_GET['q'])) {
            $q = $_GET['q'];
            $this->dao = new DaoClinica();
            $this->dao->where = $q; 
            return $this->dao->consultarTodosClinica();
        } else {
            $this->dao = new DaoClinica();
            return $this->dao->consultarTodosClinica();
        }
    }

    public function getClinica($clinica) {
        $this->dao = new DaoClinica();
        return $this->dao->consultarClinica($clinica);
    }

    public function eliminar($Id) {
        $this->dao = new DaoClinica();
        $this->dao->Inactivo($Id);
        header("Location:../Vista/ListarClinica.php");
    }

    public function eliminar1($Id) {
        $this->dao = new DaoClinica();
        $this->dao->Activo($Id);
        header("Location:../Vista/ListarClinica.php");
    }

    public function eliminarCompleto($Id) {
        $this->dao = new DaoClinica();
        $this->dao->eliminarCompleto($Id);
        header("Location:../Vista/ListarClinica.php");
    }

    public function nuevo() {
        $this->modelo = new Clinicas();
        $this->modelo->__set('cli_Nombre', $_REQUEST['cli_Nombre']);
        $this->modelo->__set('cli_Direc', $_REQUEST['cli_Direc']);
        $this->modelo->__set('cli_Telefono', $_REQUEST['cli_Telefono']);
        $this->modelo->__set('cli_Prop', $_REQUEST['cli_Prop']);
        $this->modelo->__set('cli_Correo', $_REQUEST['cli_Correo']);
        $this->modelo->__set('cli_Fax', $_REQUEST['cli_Fax']);
        $this->modelo->__set('cli_PagWeb', $_REQUEST['cli_PagWeb']);
        $this->modelo->__set('cli_FecCrea', date("Y-m-d"));
        $this->modelo->__set('cli_FecMod', date("Y-m-d"));
        $this->modelo->__set('cli_Estado', isset($_REQUEST['cli_Estado']));

        $this->dao = new DaoClinica();
        $this->dao->crearClinica($this->modelo);

        header("Location: ../Vista/ListarClinica.php");
    }

    public function editar() {
        $this->modelo = new Clinicas();
        $this->modelo->__set('cli_Id', $_REQUEST['Id']);
        $this->modelo->__set('cli_Nombre', $_REQUEST['cli_Nombre']);
        $this->modelo->__set('cli_Direc', $_REQUEST['cli_Direc']);
        $this->modelo->__set('cli_Telefono', $_REQUEST['cli_Telefono']);
        $this->modelo->__set('cli_Prop', $_REQUEST['cli_Prop']);
        $this->modelo->__set('cli_Correo', $_REQUEST['cli_Correo']);
        $this->modelo->__set('cli_Fax', $_REQUEST['cli_Fax']);
        $this->modelo->__set('cli_PagWeb', $_REQUEST['cli_PagWeb']);
        $this->modelo->__set('cli_FecCrea', date("Y-m-d"));
        $this->modelo->__set('cli_FecMod', date("Y-m-d"));
        $this->modelo->__set('cli_Estado', isset($_REQUEST['cli_Estado']));

        $this->dao = new DaoClinica();
        $this->dao->editarClinica($this->modelo);


        header("Location: ../Vista/ListarClinica.php");
    }

}
