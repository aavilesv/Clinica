<?php
/**
 *
 */
class Clinica
{
  private $CLI_Id;
  private $CLI_Nombre;
  // private $CLI_Direc;
  // private $CLI_Ruc;
  // private $CLI_Prop;
  // private $CLI_Correo;
  // private $CLI_PagWeb;
  // private $CLI_Estado;
  private $CLI_Foto;
  // function __construct($CLI_Id=0 , $CLI_Nombre='',$CLI_Direc='',$CLI_Ruc='' ,
  // $CLI_Prop='',$CLI_Correo='',$CLI_PagWeb='' , $CLI_Estado=0,$CLI_Foto='')
  // {
  function __construct($CLI_Id=0 , $CLI_Nombre='',$CLI_Foto='')
  {
    $this->CLI_Id = $CLI_Id;
    $this->CLI_Nombre = $CLI_Nombre;
    $this->CLI_Foto = $CLI_Foto;
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
