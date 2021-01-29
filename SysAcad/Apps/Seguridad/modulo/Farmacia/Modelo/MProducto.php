<?php

class MProducto {

    private $idProducto;
    private $nombreProd;
    private $vencimiento;
    private $elaboracion;
    private $precio;
    private $stock;
    private $imagen;
    private $estado;

    function __construct($idProducto=0, $nombreProd='',$vencimiento='', $elaboracion='', $precio=0.0,  $stock=0, $imagen='', $estado=0) {
        $this->idProducto = $idProducto;
        $this->nombreProd = $nombreProd;
        $this->vencimiento = $vencimiento;
        $this->elaboracion = $elaboracion;
        $this->precio = $precio;
        $this->stock = $stock;
        $this->imagen=$imagen;
        $this->estado = $estado;
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

}
