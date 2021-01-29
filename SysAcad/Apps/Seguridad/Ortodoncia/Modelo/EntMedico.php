<?php
/**
 *
 */
class Medico
{
  private $PRO_Id;
  private $PRO_Nombre;
  private $PRO_Apellido;

  function __construct($PRO_Id=0 , $PRO_Nombre='',$PRO_Apellido='')
  {
    $this->PRO_Id = $PRO_Id;
    $this->PRO_Nombre = $PRO_Nombre;
    $this->PRO_Apellido = $PRO_Apellido;
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
