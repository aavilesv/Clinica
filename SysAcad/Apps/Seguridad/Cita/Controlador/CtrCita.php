<?php

class CtrCita {

    private $modelo;
    private $dao;

    public function __construct() {
        require_once("../Dao/DaoCita.php");
        require_once("../Modelo/EntCita.php");

        $this->dao = new DaoCita();
        $this->modelo = new EntCita();
    }

    public function getCitas() {
        if (isset($_GET['q'])) {
            $q = $_GET['q'];
            $this->dao = new DaoCita();
            $this->dao->where = $q;
            return $this->dao->consultarTodosCitas();
        } else if (isset($_GET['q1'])) {
            $q1 = $_GET['q1'];
            $this->dao = new DaoCita();
            $this->dao->where1 = $q1;
            return $this->dao->consultarTodosCitas();
        } else {
            $this->dao = new DaoCita();
            return $this->dao->consultarTodosCitas();
        }
    }



    public function getCitas1() {
        if (isset($_GET['q'])) {
            $q = $_GET['q'];
            $this->dao = new DaoCita();
            $this->dao->where = $q;
            return $this->dao->consultarTodosCitas1();
        } else if (isset($_GET['q1'])) {
            $q1 = $_GET['q1'];
            $this->dao = new DaoCita();
            $this->dao->where1 = $q1;
            return $this->dao->consultarTodosCitas1();
        } else {
            $this->dao = new DaoCita();
            return $this->dao->consultarTodosCitas1();
        }
    }

    public function getCitas2() {
        if (isset($_GET['q'])) {
            $q = $_GET['q'];
            $this->dao = new DaoCita();
            $this->dao->where = $q;
            return $this->dao->consultarTodosCitas2();
        } else if (isset($_GET['q1'])) {
            $q1 = $_GET['q1'];
            $this->dao = new DaoCita();
            $this->dao->where1 = $q1;
            return $this->dao->consultarTodosCitas2();
        } else {
            $this->dao = new DaoCita();
            return $this->dao->consultarTodosCitas2();
        }
    }

    public function getPaciente() {
        $this->dao = new DaoCita();
        return $this->dao->consultarPaciente();
    }

    public function getProfesional() {
        $this->dao = new DaoCita();
        return $this->dao->consultarProfesional();
    }

    public function getCita($ficha) {
        $this->dao = new DaoCita();
        return $this->dao->consultarCita($ficha);
    }

    public function eliminarCompleto($Id) {
        $this->dao = new DaoCita();
        $this->dao->eliminarCompleto($Id);
        header("Location:../Vista/ListarCita.php");
    }

    public function eliminarCompleto1($Id) {
        $this->dao = new DaoCita();
        $this->dao->eliminarCompleto($Id);
        header("Location:../Vista/ListarCitasPasada.php");
    }

    public function eliminarCompleto2($Id) {
        $this->dao = new DaoCita();
        $this->dao->eliminarCompleto($Id);
        header("Location:../Vista/ListarCitasFuturas.php");
    }

    public function nuevo() {
        $this->modelo = new EntCita();
        $this->modelo->__set('CIT_Id', $_REQUEST['id']);
        $this->modelo->__set('PAC_Id', $_REQUEST['PAC_Id']);
        $this->modelo->__set('PRO_Id', $_REQUEST['PRO_Id']);
        $this->modelo->__set('CIT_Fecha', $_REQUEST['CIT_Fecha']);
        $this->modelo->__set('CIT_Turno', $_REQUEST['CIT_Turno']);
        $this->modelo->__set('CIT_Duracion', $_REQUEST['CIT_Duracion']);
        $this->modelo->__set('CIT_Estado', 1);

        $this->dao = new DaoCita();
        $this->dao->crearCita($this->modelo);

        header("Location: ../Vista/ListarCita.php");
    }

    public function editar() {
        $this->modelo = new EntCita();

        $this->modelo->__set('CIT_Id', $_REQUEST['id']);
        $this->modelo->__set('PAC_Id', $_REQUEST['PAC_Id']);
        $this->modelo->__set('PRO_Id', $_REQUEST['PRO_Id']);
        $this->modelo->__set('CIT_Fecha', $_REQUEST['CIT_Fecha']);
        $this->modelo->__set('CIT_Turno', $_REQUEST['CIT_Turno']);
        $this->modelo->__set('CIT_Duracion', $_REQUEST['CIT_Duracion']);
        $this->modelo->__set('CIT_Estado', isset($_REQUEST['CIT_Estado']));

        $this->dao = new DaoCita();
        $this->dao->editarCita($this->modelo);


        header("Location: ../Vista/ListarCita.php");
    }

    public function editar1() {
        $this->modelo = new EntCita();

        $this->modelo->__set('CIT_Id', $_REQUEST['id']);
        $this->modelo->__set('PAC_Id', $_REQUEST['PAC_Id']);
        $this->modelo->__set('PRO_Id', $_REQUEST['PRO_Id']);
        $this->modelo->__set('CIT_Fecha', $_REQUEST['CIT_Fecha']);
        $this->modelo->__set('CIT_Turno', $_REQUEST['CIT_Turno']);
        $this->modelo->__set('CIT_Duracion', $_REQUEST['CIT_Duracion']);
        $this->modelo->__set('CIT_Estado', isset($_REQUEST['CIT_Estado']));

        $this->dao = new DaoCita();
        $this->dao->editarCita($this->modelo);


        header("Location: ../Vista/ListarCitasFuturas.php");
    }

    public function eliminar($Id) {
        $this->dao = new DaoCita();
        $this->dao->Inactivo($Id);
        header("Location:../Vista/ListarCitasPasada.php");
    }

    public function eliminar1($Id) {
        $this->dao = new DaoCita();
        $this->dao->Activo($Id);
        header("Location:../Vista/ListarCitasPasada.php");
    }

    public function eliminar2($Id) {
        $this->dao = new DaoCita();
        $this->dao->Activo($Id);
        header("Location:../Vista/ListarCita.php");
    }

    public function eliminar3($Id) {
        $this->dao = new DaoCita();
        $this->dao->Inactivo($Id);
        header("Location:../Vista/ListarCita.php");
    }

}
