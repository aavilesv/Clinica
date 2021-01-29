<?php
class CtrUsuario
{
    private $modelo;
    private $dao;

    public function __construct()
    {
        require_once("../Dao/DaoUsuario.php");
        require_once("../Modelo/EntUsuario.php");
        $this->dao = new DaoUsuarioModel();
        $this->modelo = new Usuario();
    }

    public function getUsuarios()
    {
        $this->dao = new DaoUsuarioModel();
        return $this->dao->consultarTodosUsuarios();
    }

    public function getUsuario($usuario)
    {
        $this->dao = new DaoUsuarioModel();
        return $this->dao->consultarUsuario($usuario);
    }

    public function nuevo()
    {
        //$nuevoUsuario = new Usuario($_REQUEST['id'], $_REQUEST['nombre'], $_REQUEST['apellido'], $_REQUEST['usuario'], $_REQUEST['clave']);
        $this->modelo = new Usuario();
        $this->modelo->__set('nombre', $_REQUEST['nombre']);
        $this->modelo->__set('apellido', $_REQUEST['apellido']);
        $this->modelo->__set('usuario', $_REQUEST['usuario']);
        $this->modelo->__set('clave', $_REQUEST['clave']);

        $this->dao = new DaoUsuarioModel();
        $this->dao->crearUsuario($this->modelo);
        header("Location:../Vista/ListarUsuarios.php");
    }

    public function editar()
    {
        //$nuevoUsuario = new Usuario($_REQUEST['id'], $_REQUEST['nombre'], $_REQUEST['apellido'], $_REQUEST['usuario'], $_REQUEST['clave']);
        $this->modelo = new Usuario();
        $this->modelo->__set('id', $_REQUEST['id']);
        $this->modelo->__set('nombre', $_REQUEST['nombre']);
        $this->modelo->__set('apellido', $_REQUEST['apellido']);
        $this->modelo->__set('usuario', $_REQUEST['usuario']);
        $this->modelo->__set('clave', $_REQUEST['clave']);

        $this->dao = new DaoUsuarioModel();
        $this->dao->editarUsuario($this->modelo);
        header("Location:../Vista/ListarUsuarios.php");
    }

    public function eliminar($IdUsuario)
    {
        $this->dao = new DaoUsuarioModel();
        $this->dao->eliminarUsuario($IdUsuario);
        header("Location:../Vista/ListarUsuarios.php");
    }
}
