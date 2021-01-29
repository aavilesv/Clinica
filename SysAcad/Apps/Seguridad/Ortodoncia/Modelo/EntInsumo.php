<?php
/**
 *
 */
class Insumo
{
  private $idInsumos;
  private $Insumoscol;
  private $fotoInsumo;
  function __construct($idInsumos=0 , $Insumoscol='',$fotoInsumo='')
  {
    $this->idInsumos = $idInsumos;
    $this->Insumoscol = $Insumoscol;
    $this->fotoInsumo =$fotoInsumo;
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
