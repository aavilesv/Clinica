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
class ProductoCTR {

    private $modelo;
    private $dao;

    public function __construct() {
        require_once("../Dao/ProductoDAO.php");
        require_once("../Modelo/MProducto.php");
        $this->dao = new ProductoDAO();
        $this->modelo = new MProducto();
    }

    public function mostarProveedor()
    {
      $this->dao = new ProductoDAO();
      return $this->dao->cargarProveedor();
    }

    public function getMostrar() {
        $this->dao = new ProductoDAO();
        return $this->dao->mostrar();
    }

    public function getBuscar($producto) {
        $this->dao = new ProductoDAO();
        return $this->dao->buscar($producto);
    }

    public function nuevo() {
        //$nuevoUsuario = new Usuario($_REQUEST['id'], $_REQUEST['nombre'], $_REQUEST['apellido'], $_REQUEST['usuario'], $_REQUEST['clave']);
        $this->modelo = new MProducto();
        $this->modelo->__set('nombreProd', $_REQUEST['nombreProd']);
        $this->modelo->__set('vencimiento', $_REQUEST['vencimiento']);
        $this->modelo->__set('precio', $_REQUEST['precio']);
        $this->modelo->__set('elaboracion', $_REQUEST['elaboracion']);
        $this->modelo->__set('imagen', $_REQUEST['imagen']);
        $this->modelo->__set('estado', 1);
        //var_dump($this->modelo);
        $this->dao = new ProductoDAO();
        $this->dao->crear($this->modelo);

        header("Location:../Vista/ListarProducto.php");
    }

    public function editar() {
        //$nuevoUsuario = new Usuario($_REQUEST['id'], $_REQUEST['nombre'], $_REQUEST['apellido'], $_REQUEST['usuario'], $_REQUEST['clave']);
        $this->modelo = new MProducto();
        $this->modelo->__set('idProducto', $_REQUEST['idProducto']);
        $this->modelo->__set('nombreProd', $_REQUEST['nombreProd']);
        $this->modelo->__set('vencimiento', $_REQUEST['vencimiento']);
        $this->modelo->__set('elaboracion', $_REQUEST['elaboracion']);
        $this->modelo->__set('precio', $_REQUEST['precio']);
        $estado = ($_REQUEST['estado'] == 'on') ? 1 : 0 ;
        $this->modelo->__set('imagen', $_REQUEST['imagen']);
        $this->modelo->__set('estado', $estado);

        $this->dao = new ProductoDAO();
        $this->dao->editar($this->modelo);
        header("Location:../Vista/ListarProducto.php");
    }

    public function eliminar($producto) {
        $this->dao = new ProductoDAO();
        $this->dao->eliminar($producto);
        header("Location:../Vista/ListarProducto.php");
    }

}
