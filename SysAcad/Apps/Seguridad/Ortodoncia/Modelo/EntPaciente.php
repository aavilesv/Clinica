<?php
/**
 *
 */
class Paciente
{
  private $pac_Id;
  private $pac_Nombre;
  private $pac_Apellido;

  function __construct($pac_Id=0 , $pac_Nombre='', $pac_Apellido='')
  {
    $this->pac_Id = $pac_Id;
    $this->pac_Nombre = $pac_Nombre;
    $this->pac_Apellido = $pac_Apellido;

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
