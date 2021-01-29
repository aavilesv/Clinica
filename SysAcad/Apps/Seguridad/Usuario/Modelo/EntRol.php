<?php
/**
 *
 */
class Rol
{
  private $idRol;
  private $rolDescripcion;
  function __construct($idRol=0 , $rolDescripcion='')
  {
    $this->idRol = $idRol;
    $this->rolDescripcion = $rolDescripcion;
  }

  public function __get($key)
  {
      return $this->$key;
  }

  public function __set($key, $value)
  {
      return $this->$key = $value;
  }

}



 ?>
