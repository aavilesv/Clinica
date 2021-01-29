<?php

class EntFicha {

    private $FIC_Id;
    private $PAC_Id;
    private $FIC_Antecedentes;
    private $FIC_Alergias;
    private $FIC_Tratamiento;
    private $FIC_Familiares;
    private $FIC_Estado;

    public function __construct($FIC_Id = 0, $PAC_Id = null, $FIC_Antecedentes = "", $FIC_Alergias = "", $FIC_Tratamiento = "", $FIC_Familiares = "", $FIC_Estado = "") {

        $this->FIC_Id = $FIC_Id;
        $this->PAC_Id = $PAC_Id;
        $this->FIC_Antecedentes = $FIC_Antecedentes;
        $this->FIC_Alergias = $FIC_Alergias;
        $this->FIC_Tratamiento = $FIC_Tratamiento;
        $this->FIC_Familiares = $FIC_Familiares;
        $this->FIC_Estado = $FIC_Estado;
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

#Fin de la clase modelo Usuario
