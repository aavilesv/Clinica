<?php

class Kardex {

    private $idKardex;
    private $idProducto;
    private $u_medida;
    private $minUnidad;
    private $maxUnidad;
    private $stock;
    private $valorUnitario;

    public function __construct($idKardex = 0, $idProducto = null, $u_medida = null, $minUnidad = null, $maxUnidad = null, $stock = null, $valorUnitario = null) {
        $this->idKardex = $idKardex;
        $this->idProducto = $idProducto;
        $this->u_medida = $u_medida;
        $this->minUnidad = $minUnidad;
        $this->maxUnidad = $maxUnidad;
        $this->stock = $stock;
        $this->valorUnitario = $valorUnitario;
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
