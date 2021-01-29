<?php
/*
 * Entidad Paciente
 */

class Cita
{
    private $CIT_Id;
    private $PAC_Nombre;
    private $PAC_Apellido;
    private $PRO_Nombre;
    private $PRO_Apellido;
    private $PAC_Sexo;
    private $CIT_Fecha;
    private $CIT_Turno;
    private $CIT_Duracion;
    private $CIT_Estado;

    public function __construct(
      $CIT_Id=0, $PAC_Nombre='', $PAC_Apellido='',$PAC_Sexo='',
      $PRO_Nombre='',$PRO_Apellido='', $CIT_Fecha='',
      $CIT_Turno='', $CIT_Duracion='',
      $CIT_Estado=true)
    {
        $this->CIT_Id      = $CIT_Id;
        $this->PAC_Nombre   = $PAC_Nombre;
        $this->PAC_Apellido = $PAC_Apellido;
        $this->PRO_Nombre   = $PRO_Nombre;
        $this->PRO_Apellido = $PRO_Apellido;
        $this->PAC_Sexo = $PAC_Sexo;
        $this->CIT_Fecha  = $CIT_Fecha;
        $this->CIT_Turno       = $CIT_Turno;
        $this->CIT_Duracion   = $CIT_Duracion;
        $this->CIT_Estado= $CIT_Estado;

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
