<?php

class CtrPermisos {

    private $modelo;
    private $dao;

    public function __construct() {
        require_once("../Dao/DaoPermisos.php");
        require_once("../Modelo/EntPermisos.php");
        $this->dao = new DaoPermisosModel();
        $this->modelo = new EntPermisos();
    }

    public function getPermisos() {
        $this->dao = new DaoPermisosModel();
        return $this->dao->consultarTodosPermisos();
    }

    public function getPermiso($Permiso) {
        $this->dao = new DaoPermisosModel();
        return $this->dao->consultarPermiso($Permiso);
    }

    public function getRol() {
        $this->dao = new DaoPermisosModel();
        return $this->dao->consultarRol();
    }

    public function getModulos() {
        $this->dao = new DaoPermisosModel();
        return $this->dao->consultarModulosPadre();
    }

    public function nuevo() {
        //$nuevoUsuario = new Usuario($_REQUEST['id'], $_REQUEST['nombre'], $_REQUEST['apellido'], $_REQUEST['usuario'], $_REQUEST['clave']);
        $this->modelo = new EntPermisos();
        $this->modelo->__set('idRol', $_REQUEST['rol']);
        $this->modelo->__set('idModulo', $_REQUEST['modulo']);
        $Nuevo = isset($_REQUEST['Nuevo']) ? $_REQUEST['Nuevo'] : '0';
        $this->modelo->__set('nuevo', $Nuevo);
        $Modificar = isset($_REQUEST['Modificar']) ? $_REQUEST['Modificar'] : '0';
        $this->modelo->__set('modificar', $Modificar);
        $Eliminar = isset($_REQUEST['Eliminar']) ? $_REQUEST['Eliminar'] : '0';
        $this->modelo->__set('eliminar', $Eliminar);
        $Visualizar = isset($_REQUEST['Visualizar']) ? $_REQUEST['Visualizar'] : '0';
        $this->modelo->__set('visualizar', $Visualizar);
        $this->dao = new DaoPermisosModel();
        $a = $this->dao->consultarpermisoexistente($_REQUEST['rol'], $_REQUEST['modulo']);
        if ($a == 'true') {
            $this->dao->crearPermisos($this->modelo);
            header("Location:../Vista/ListarPermisos.php");
        } else {
            header("Location:../Vista/ManPermisos.php?opc=nuevo");
        }
    }

    public function editar() {
        //$nuevoUsuario = new Usuario($_REQUEST['id'], $_REQUEST['nombre'], $_REQUEST['apellido'], $_REQUEST['usuario'], $_REQUEST['clave']);
        $this->modelo = new EntPermisos();
        $this->modelo->__set('idRol', $_REQUEST['rol']);
        $this->modelo->__set('idModulo', $_REQUEST['modulo']);
        $Nuevo = isset($_REQUEST['Nuevo']) ? $_REQUEST['Nuevo'] : '0';
        $this->modelo->__set('nuevo', $Nuevo);
        $Modificar = isset($_REQUEST['Modificar']) ? $_REQUEST['Modificar'] : '0';
        $this->modelo->__set('modificar', $Modificar);
        $Eliminar = isset($_REQUEST['Eliminar']) ? $_REQUEST['Eliminar'] : '0';
        $this->modelo->__set('eliminar', $Eliminar);
        $Visualizar = isset($_REQUEST['Visualizar']) ? $_REQUEST['Visualizar'] : '0';
        $this->modelo->__set('visualizar', $Visualizar);
        $this->modelo->__set('idRolMod', $_REQUEST['id']);
        $this->dao = new DaoPermisosModel();
        $this->dao->editarPermisos($this->modelo);
        header("Location:../Vista/ListarPermisos.php");
    }

    public function eliminar($IdUsuario) {
        $this->dao = new DaoPermisosModel();
        $this->dao->eliminarPermisos($IdUsuario);
        header("Location:../Vista/ListarPermisos.php");
    }

    public function consultarrolesmodulos($variable) {
        $this->dao = new DaoPermisosModel();
        return $this->dao->consultarrolesmodulos($variable);
    }

}
