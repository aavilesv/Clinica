<?php

class Enfermedades {

    private $ENF_Id;
    private $ENF_Codigo;
    private $ENF_Descripcion;
    private $ENF_Estado;

    public function __construct($ENF_Id = 0, $ENF_Codigo = '', $ENF_Descripcion = '', $ENF_Estado = "") {
        $this->ENF_Id = $ENF_Id;
        $this->ENF_Codigo = $ENF_Codigo;
        $this->ENF_Descripcion = $ENF_Descripcion;
        $this->ENF_Estado = $ENF_Estado;
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