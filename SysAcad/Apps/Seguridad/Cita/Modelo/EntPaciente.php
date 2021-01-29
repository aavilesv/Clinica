<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EntPaciente
 *
 * @author Usuario
 */
class EntPaciente {

    private $PAC_Id;
    private $PAC_Cedula;
    private $PAC_Nombre;
    private $PAC_Apellido;
    private $PAC_Sexo;
    private $PAC_Telefono;
    private $PAC_FecNac;
    private $PAC_Edad;
    private $PAC_Ciudad;
    private $PAC_TipSangre;
    private $PAC_NumReg;
    private $PAC_Estado;
    private $PAC_Foto;

    public function __construct($PAC_Id = null, $PAC_Cedula= null, $PAC_Nombre= null, $PAC_Apellido= null, $PAC_Sexo= null, $PAC_Telefono= null, $PAC_FecNac= null, $PAC_Edad= null, $PAC_Ciudad= null, $PAC_TipSangre= null, $PAC_NumReg= null, $PAC_Estado= null,$PAC_Foto= null) {

        $this->PAC_Id = $PAC_Id;
        $this->PAC_Cedula = $PAC_Cedula;
        $this->PAC_Nombre = $PAC_Nombre;
        $this->PAC_Apellido = $PAC_Apellido;
        $this->PAC_Sexo = $PAC_Sexo;
        $this->PAC_Telefono = $PAC_Telefono;
        $this->PAC_FecNac = $PAC_FecNac;
        $this->PAC_Edad = $PAC_Edad;
        $this->PAC_Ciudad = $PAC_Ciudad;        
        $this->PAC_TipSangre = $PAC_TipSangre;    
        $this->PAC_NumReg = $PAC_NumReg;
        $this->PAC_Estado = $PAC_Estado;
        $this->PAC_Foto = $PAC_Foto;
    }

    public function __get($key) {
        return $this->$key;
    }

    public function __set($key, $value) {
        return $this->$key = $value;
    }

    public function __tostring() {
        return json_encode($this);
    }

}
