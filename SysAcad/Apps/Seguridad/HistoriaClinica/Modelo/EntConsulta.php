<?php
/*
 * Entidad Consulta
 */

class Consulta
{
    private $CON_Id;
    private $PRO_Id;
    private $FIC_Id;
    private $CIT_Id;
    private $PRO_Nombre;
    private $PRO_Apellido;
    private $PRO_Cedula;
    private $ENF_Descripcion;
    private $CON_Diagnostico;
    private $CON_Receta;
    private $CON_PArte;
    private $CON_Pulsa;
    private $CON_RRespi;
    private $CON_Temp;
    private $CON_Altura;
    private $CON_Peso;
    private $CON_Imc;
    private $CON_Edad;
    private $CON_Estado;
    private $CIT_Fecha;

    public function __construct(
      $CON_Id=0, $PRO_Id=0, $FIC_Id=0,$CIT_Id=0,$PRO_Nombre='',$PRO_Apellido='',$PRO_Cedula='',
       $ENF_Descripcion='', $CON_Diagnostico='',$CON_Receta='', $CON_PArte=0,
        $CON_Pulsa=0, $CON_RRespi=0, $CON_Temp=0, $CON_Altura=0,$CON_Peso=0,$CON_Imc=0,$CON_Edad=0,$CON_Estado=true,$CIT_Fecha="")
    {
        $this->CON_Id       = $CON_Id;
        $this->PRO_Id   = $PRO_Id;
        $this->FIC_Id = $FIC_Id;
        $this->PRO_Apellido   = $PRO_Apellido;
        $this->PRO_Nombre   = $PRO_Nombre;
        $this->PRO_Cedula   = $PRO_Cedula;    
        $this->CIT_Id   = $CIT_Id;
        $this->ENF_Descripcion  = $ENF_Descripcion;
        $this->CON_Diagnostico  = $CON_Diagnostico;
        $this->CON_Receta  = $CON_Receta;
        $this->CON_PArte = $CON_PArte;
        $this->CON_Pulsa = $CON_Pulsa;
        $this->CON_RRespi = $CON_RRespi;
        $this->CON_Temp  = $CON_Temp;
        $this->CON_Altura  = $CON_Altura;
        $this->CON_Peso  = $CON_Peso;
        $this->CON_Temp  = $CON_Imc;
        $this->CON_Temp  = $CON_Edad;
        $this->CON_Estado= $CON_Estado;
        $this->CIT_Fecha= $CIT_Fecha;

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
