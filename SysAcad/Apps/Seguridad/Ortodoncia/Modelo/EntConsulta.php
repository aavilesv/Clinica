<?php
/**
 *
 */
class Consulta
{
  private $idCabConsulta;
  private $PAC_Id;
  private $CLI_Id;
  private $PRO_Id;
  private $fecha;
  private $hora;
  private $observacion;
  private $sala;

  function __construct($idCabConsulta=0 , $PAC_Id=0, $CLI_Id=0, $PRO_Id=0,$fecha='',$hora='', $observacion='',$sala='')
  {
    $this->idCabConsulta = $idCabConsulta;
    $this->PAC_Id = $PAC_Id;
    $this->CLI_Id = $CLI_Id;
    $this->PRO_Id = $PRO_Id;
    $this->fecha = $fecha;
    $this->hora = $hora;
    $this->observacion = $observacion;
    $this->sala = $sala;
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
