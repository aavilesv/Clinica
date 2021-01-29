<?php

class CtrModulo
{
  private $modelo;
  private $dao;

  public function __construct()
  {
    require_once("../Dao/DaoModulo.php");
    $this->dao = new DaoUsuarioModel();

  }


  public function getModulos()
  {
    $this->dao = new DaoUsuarioModel();
    return $this->dao->consultarTodosModulos();
  }

  public function consultarrolesmodulos($variable) {
        $this->dao = new DaoUsuarioModel();
        return $this->dao->consultarrolesmodulos($variable);
    }

    public function getModulo($usuario) {
        $this->dao = new DaoUsuarioModel();
        return $this->dao->consultarModulo($usuario);
    }


}
?>
