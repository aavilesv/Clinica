<?php
/*
 * Entidad Paciente
 */

class Paciente
{   private $PAC_Id;
    private $PAC_Nombre;
    private $PAC_Apellido;
    private $PAC_Cedula;
    private $PAC_Sexo;
    private $PAC_Telefono;
    private $fecha;
    private $PAC_Ciudad;
    private $PAC_TipSangre;
    private $PAC_NumReg;
    private $PAC_Estado;
    private $PAC_Foto;

    public function __construct(
      $PAC_Id=0, $PAC_Nombre='', $PAC_Apellido='',$PAC_Foto='',
      $PAC_Cedula='', $PAC_Sexo='',
      $PAC_Telefono='',$fecha="",$PAC_Edad=0,
      $PAC_Ciudad='',$PAC_TipSangre='', $PAC_NumReg='',
      $PAC_Estado=true)
    {
        $this->PAC_Id      = $PAC_Id;
        $this->PAC_Nombre   = $PAC_Nombre;
        $this->PAC_Apellido = $PAC_Apellido;
        $this->PAC_Cedula  = $PAC_Cedula;
        $this->PAC_Sexo  = $PAC_Sexo;
        $this->PAC_Telefono = $PAC_Telefono;
        $this->fecha   = $fecha;
        $this->PAC_Edad = $PAC_Edad;
        $this->PAC_Ciudad  = $PAC_Ciudad;
        $this->PAC_TipSangre = $PAC_TipSangre;
        $this->PAC_NumReg = $PAC_NumReg;
        $this->PAC_Estado= $PAC_Estado;
        $this->PAC_Foto= $PAC_Foto;

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
