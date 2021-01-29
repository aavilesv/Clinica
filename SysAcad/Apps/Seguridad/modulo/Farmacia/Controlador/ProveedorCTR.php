<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProveedorCTR
 *
 * @author ubald
 */
class ProveedorCTR {

    private $modelo;
    private $dao;

    public function __construct() {
        require_once("../Dao/ProveedorDAO.php");
        require_once("../Modelo/MProveedor.php");
        $this->dao = new ProveedorDAO();
        $this->modelo = new MProveedor();
    }

    public function getMostrar() {
        $this->dao = new ProveedorDAO();
        return $this->dao->mostrar();
    }

    public function getBuscar($proveedor) {
        $this->dao = new ProveedorDAO();
        return $this->dao->buscar($proveedor);
    }

    public function nuevo() {
        //$nuevoUsuario = new Usuario($_REQUEST['id'], $_REQUEST['nombre'], $_REQUEST['apellido'], $_REQUEST['usuario'], $_REQUEST['clave']);
        $this->modelo = new MProveedor();
        $this->modelo->__set('ruc', $_REQUEST['ruc']);
        $this->modelo->__set('razonSocial', $_REQUEST['razonSocial']);
        $this->modelo->__set('telefono', $_REQUEST['telefono']);
        $this->modelo->__set('email', $_REQUEST['email']);
        $this->modelo->__set('direccion', $_REQUEST['direccion']);
        $this->modelo->__set('imagen', $_REQUEST['imagen']);
        $this->modelo->__set('estado', 1);

        $this->dao = new ProveedorDAO();
        $this->dao->crear($this->modelo);
        //var_dump($modelo);
        header("Location:../Vista/ListarProveedor.php");
    }

    public function editar() {
        //$nuevoUsuario = new Usuario($_REQUEST['id'], $_REQUEST['nombre'], $_REQUEST['apellido'], $_REQUEST['usuario'], $_REQUEST['clave']);
        $this->modelo = new MProveedor();
        $this->modelo->__set('ruc', $_REQUEST['ruc']);
        $this->modelo->__set('razonSocial', $_REQUEST['razonSocial']);
        $this->modelo->__set('telefono', $_REQUEST['telefono']);
        $this->modelo->__set('email', $_REQUEST['email']);
        $this->modelo->__set('direccion', $_REQUEST['direccion']);
        $estado = ($_REQUEST['estado'] == 'on') ? 1 : 0 ;
        $this->modelo->__set('imagen', $_REQUEST['imagen']);
        $this->modelo->__set('estado', $estado);

        $this->dao = new ProveedorDAO();
        $this->dao->editar($this->modelo);
        header("Location:../Vista/ListarProveedor.php");
    }

    public function eliminar($proveedor) {
        $this->dao = new ProveedorDAO();
        $this->dao->eliminar($proveedor);
        header("Location:../Vista/ListarProveedor.php");
    }

}
