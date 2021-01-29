<?php

class EntCita {

    private $CIT_Id;
    private $PAC_Id;
    private $PRO_Id;
    private $CIT_Fecha;
    private $CIT_Turno;
    private $CIT_Duracion;
    private $CIT_Estado;
    private $aux;
    private $aux1;

    public function __construct($CIT_Id = null, $PAC_Id = null, $PRO_Id = null,$CIT_Fecha =null,$CIT_Turno = null, $CIT_Duracion = null, $CIT_Estado = 1, $aux=null, $aux1=null) {

        $this->CIT_Id = $CIT_Id;
        $this->PAC_Id = $PAC_Id;
        $this->PRO_Id = $PRO_Id;
        $this->CIT_Fecha = $CIT_Fecha;
        $this->CIT_Turno = $CIT_Turno;
        $this->CIT_Duracion = $CIT_Duracion;
        $this->CIT_Estado = $CIT_Estado;
        $this->aux = $aux;
        $this->aux1 = $aux1;
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
