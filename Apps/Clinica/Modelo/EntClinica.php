<?php

class Clinicas {

    private $cli_Id;
    private $cli_Nombre;
    private $cli_Direc;
    private $cli_Telefono;
    private $cli_Prop;
    private $cli_Correo;
    private $cli_Fax;
    private $cli_PagWeb;
    private $cli_FecCrea;
    private $cli_FecMod;
    private $cli_Estado;

    public function __construct($cli_Id = 0, $cli_Nombre = "", $cli_Direc = "", $cli_Telefono = "", $cli_Prop = "", $cli_Correo = "", $cli_Fax = "", $cli_PagWeb = "", $cli_FecCrea = "", $cli_FecMod = "", $cli_Estado = "") {
        $this->cli_Id = $cli_Id;
        $this->cli_Nombre = $cli_Nombre;
        $this->cli_Direc = $cli_Direc;
        $this->cli_Telefono = $cli_Telefono;
        $this->cli_Prop = $cli_Prop;
        $this->cli_Correo = $cli_Correo;
        $this->cli_Fax = $cli_Fax;
        $this->cli_PagWeb = $cli_PagWeb;
        $this->cli_FecCrea = $cli_FecCrea;
        $this->cli_FecMod = $cli_FecMod;
        $this->cli_Estado = $cli_Estado;
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
