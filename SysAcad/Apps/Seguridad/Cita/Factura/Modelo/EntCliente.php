<?php
/*
 * Entidad USUARIO
 */

class Cliente
{
    private $FACCliId;
    private $FACCliNombre;
    private $FACCliApellido;
  private   $FACCliCedula;
    private $FACCliDireccion;
    private $FACCliCelular;
private $FACCliEmail;
private $FACCliUsuarioCrea;
private $FACCliUsuaModif;
private $FACCliEstado;
private $FACCliFechaCrea;
private $FACCliFechaFechaUltima;
    public function __construct($FACCliId=0,
    $FACCliNombre='', $FACCliApellido='',$FACCliCedula='', $FACCliDireccion='',
     $FACCliCelular ='', $FACCliEmail='',$FACCliUsuarioCrea='',$FACCliUsuaModif='',$FACCliEstado=0,$FACCliFechaCrea='',$FACCliFechaFechaUltima='')
    {
        $this->FACCliId  = $FACCliId;
        $this->FACCliNombre = $FACCliNombre;
        $this->FACCliApellido = $FACCliApellido;
          $this->FACCliCedula = $FACCliCedula;
        $this->FACCliDireccion = $FACCliDireccion;
        $this->FACCliCelular    = $FACCliCelular;
        $this->FACCliEmail = $FACCliEmail;
        $this->FACCliUsuarioCrea = $FACCliUsuarioCrea;
        $this->FACCliUsuaModif = $FACCliUsuaModif;
        $this->FACCliEstado = $FACCliEstado;
        $this->FACCliFechaCrea  = $FACCliFechaCrea;
        $this->FACCliFechaFechaUltima = $FACCliFechaFechaUltima;

    }

    public function __get($key)
    {
        return $this->$key;
    }

    public function __set($key, $value)
    {
        return $this->$key = $value;
    }

    public function __tostring()
    {
        return json_encode($this);
    }
}#Fin de la clase modelo Usuario
