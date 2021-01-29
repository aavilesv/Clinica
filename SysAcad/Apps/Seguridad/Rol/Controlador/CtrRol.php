<?php

class CtrRol
{
  private $modelo;
  private $dao;

  public function __construct()
  {
    require_once("../Dao/DaoRol.php");

    $this->dao = new DaoUsuarioModel();

  }


  public function getRoles()
  {
    $this->dao = new DaoUsuarioModel();
    return $this->dao->consultarRoles();
  }


}
?>
