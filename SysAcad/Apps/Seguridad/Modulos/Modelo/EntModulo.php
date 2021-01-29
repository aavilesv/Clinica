<?php
/**
 *
 */
class Modulo
{
  private $idModulo;
  private $modNombre;
  private $modDescripcion;
  private $codigo;
  private $modFoto;
  private $color;
  private $modPadre;
  private $estado;
  function __construct($idModulo=0 ,$modNombre='' , $modDescripcion='',$codigo='',$modFoto='',$color='', $modPadre=0, $estado=0)
  {
    $this->idModulo = $idModulo;
    $this->modNombre = $modNombre;
    $this->modDescripcion = $modDescripcion;
    $this->codigo = $codigo;
    $this->modFoto = $modFoto;
    $this->color = $color;
    $this->modPadre= $modPadre;
    $this->estado= $estado;
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
