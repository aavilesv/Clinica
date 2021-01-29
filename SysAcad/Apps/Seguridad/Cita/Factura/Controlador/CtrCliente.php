<?php

//cliente

class CtrCliente
{
    private $modelo;
    private $dao;

    public function __construct()
    {
        require_once("../Dao/DaoClienteModel.php");
        require_once("../Modelo/EntCliente.php");
        $this->dao = new DaoClienteModel();
        $this->modelo = new Cliente();
    }

    public function getClientes()
    {
      if (isset($_GET['q'])) {
          $q = $_GET['q'];
          $this->dao = new DaoClienteModel();
          $this->dao->where = $q;
          return $this->dao->consultarTodosClientes();
      } else {
          $this->dao = new DaoClienteModel();
          return $this->dao->consultarTodosClientes();
      }

    }

    public function getCliente($c)
    {
        $this->dao = new DaoClienteModel();
        return $this->dao->consultarCliente($c);
    }

    public function getTipoClientes()
    {
        $this->dao = new DaoClienteModel();
        return $this->dao->consultarTipoClientes();
    }

    public function getPacientes()
    {
        $this->dao = new DaoClienteModel();
        return $this->dao->consultarPacientes();
    }

    public function getPaciente($id)
    {
        $this->dao = new DaoClienteModel();
        return $this->dao->consultarPaciente($id);
    }

    public function nuevo()
    {


        //$nuevoUsuario = new Usuario($_REQUEST['id'], $_REQUEST['nombre'], $_REQUEST['apellido'], $_REQUEST['usuario'], $_REQUEST['clave']);
        $this->modelo = new Cliente();
        $this->modelo->__set('FACCliId', $_REQUEST['FACCliId']);
        $this->modelo->__set('FACCliNombre', $_REQUEST['FACCliNombre']);
        $this->modelo->__set('FACCliApellido', $_REQUEST['FACCliApellido']);
        $this->modelo->__set('FACCliCedula', $_REQUEST['FACCliCedula']);
        $this->modelo->__set('FACCliDireccion', $_REQUEST['FACCliDireccion']);
        $this->modelo->__set('FACCliCelular', $_REQUEST['FACCliCelular']);
        $this->modelo->__set('FACCliEmail', $_REQUEST['FACCliEmail']);
        $this->modelo->__set('FACCliUsuarioCrea', $_REQUEST['FACCliUsuarioCrea']);
        $this->modelo->__set('FACCliUsuaModif', $_REQUEST['FACCliUsuaModif']);
        $this->modelo->__set('FACCliEstado', $_REQUEST['FACCliEstado']);
        $this->modelo->__set('FACCliFechaCrea', $_REQUEST['FACCliFechaCrea']);
        $this->modelo->__set('FACCliFechaFechaUltima', $_REQUEST['FACCliFechaFechaUltima']);


        $this->dao = new DaoClienteModel();
        $this->dao->crearCliente($this->modelo);
 header("Location:../Vista/ListarCliente.php");
    }

    public function editar()
    {
        //$nuevoUsuario = new Usuario($_REQUEST['id'], $_REQUEST['nombre'], $_REQUEST['apellido'], $_REQUEST['usuario'], $_REQUEST['clave']);
        $this->modelo = new Cliente();
        $this->modelo->__set('FACCliId', $_REQUEST['FACCliId']);
        $this->modelo->__set('FACCliNombre', $_REQUEST['FACCliNombre']);
        $this->modelo->__set('FACCliApellido', $_REQUEST['FACCliApellido']);
        $this->modelo->__set('FACCliCedula', $_REQUEST['FACCliCedula']);
        $this->modelo->__set('FACCliDireccion', $_REQUEST['FACCliDireccion']);
        $this->modelo->__set('FACCliCelular', $_REQUEST['FACCliCelular']);
        $this->modelo->__set('FACCliEmail', $_REQUEST['FACCliEmail']);
        $this->modelo->__set('FACCliUsuarioCrea', $_REQUEST['FACCliUsuarioCrea']);
        $this->modelo->__set('FACCliUsuaModif', $_REQUEST['FACCliUsuaModif']);
        $this->modelo->__set('FACCliEstado', $_REQUEST['FACCliEstado']);
        $this->modelo->__set('FACCliFechaCrea', $_REQUEST['FACCliFechaCrea']);
        $this->modelo->__set('FACCliFechaFechaUltima', $_REQUEST['FACCliFechaFechaUltima']);
        $this->dao = new DaoClienteModel();

     $this->dao->editarCliente($this->modelo);
      header("Location:../Vista/ListarCliente.php");
    }

    public function eliminar($FACCliId)
    {
        $this->dao = new DaoClienteModel();
        $this->dao->eliminarCliente($FACCliId);
        header("Location:../Vista/ListarCliente.php");
    }
}
