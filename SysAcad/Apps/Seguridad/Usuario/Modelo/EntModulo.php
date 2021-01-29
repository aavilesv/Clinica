<?php
/**
 *
 */
class Modulo
{
  private $idModulo;
  private $modNombre;
  private $modDescripcion;
  private $modFoto;
  private $codigo;
  private $color;
  function __construct($idModulo=0 , $modNombre='',$codigo='',$modDescripcion='',$modFoto='',$color='')
  {
    $this->idModulo = $idModulo;
    $this->modNombre = $modNombre;
    $this->codigo = $codigo;
    $this->modDescripcion = $modDescripcion;
    $this->modFoto = $modFoto;
    $this->color=$color;
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
