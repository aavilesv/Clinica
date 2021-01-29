<?php

class EntConsulta {

    private $CON_Id;
    private $PAC_Id;
    private $PRO_Id;
    private $ENF_Id;
    private $FIC_Id;
    private $CON_Diagnostico;
    private $CON_Receta;
    private $CON_Trat;
    private $idKardex;
    private $CON_Estado;
    private $CON_Parte;
    private $CON_Pulsa;
    private $CON_RRespi;
    private $CON_Temp;
    private $CON_Altura;
    private $CON_Peso;
    private $CON_Imc;
    private $CON_Fecha;

    public function __construct($CON_Id = null, $PAC_Id = null, $PRO_Id = null, $ENF_Id = null, $FIC_Id = null, $CON_Diagnostico = null, $CON_Receta = null,$CON_Trat=null,$idKardex=null, $CON_Estado = null,$CON_Parte = null, $CON_Pulsa=null,$CON_RRespi=null,$CON_Temp=null,$CON_Altura=null,$CON_Peso=null,$CON_Imc=null,$CON_Fecha=null) {

        $this->CON_Id = $CON_Id;
        $this->PAC_Id = $PAC_Id;
        $this->PRO_Id = $PRO_Id;
        $this->ENF_Id = $ENF_Id;
        $this->FIC_Id = $FIC_Id;
        $this->CON_Diagnostico = $CON_Diagnostico;
        $this->CON_Receta = $CON_Receta;
        $this->CON_Trat = $CON_Trat;
        $this->idKardex = $idKardex;
        $this->CON_Estado = $CON_Estado;
        $this->CON_Parte = $CON_Parte;
        $this->CON_Pulsa = $CON_Pulsa;
        $this->CON_RRespi = $CON_RRespi;
        $this->CON_Temp = $CON_Temp;
        $this->CON_Altura = $CON_Altura;
        $this->CON_Peso = $CON_Peso;
        $this->CON_Imc = $CON_Imc;
        $this->CON_Fecha = $CON_Fecha;
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
