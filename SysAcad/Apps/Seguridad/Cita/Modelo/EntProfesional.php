<?php

class EntProfesional {

    private $PRO_Id;
    private $CAR_ID;
    private $PRO_Cedula;
    private $PRO_Nombre;
    private $PRO_Apellido;
    private $PRO_Direccion;
    private $PRO_Telefono;
    private $PRO_Estado;
    private $PRO_Foto;

    public function __construct($PRO_Id = null, $CAR_ID = null, $PRO_Cedula = null, $PRO_Nombre = null, $PRO_Apellido = null, $PRO_Direccion = null, $PRO_Telefono = null, $PRO_Estado = null, $PRO_Foto = null) {

        $this->PRO_Id = $PRO_Id;
        $this->CAR_ID = $CAR_ID;
        $this->PRO_Cedula = $PRO_Cedula;
        $this->PRO_Nombre = $PRO_Nombre;
        $this->PRO_Apellido = $PRO_Apellido;
        $this->PRO_Direccion = $PRO_Direccion;
        $this->PRO_Telefono = $PRO_Telefono;
        $this->PRO_Estado = $PRO_Estado;
        $this->PRO_Foto = $PRO_Foto;
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
