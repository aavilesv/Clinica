<?php

class MDetCompra {
    private $idCompra;
    private $idProducto;
    private $cantidad;
    private $precio;

    function __construct($idCompra=0, $idProducto=0, $cantidad=0, $precio=0.0) {
        $this->idCompra = $idCompra;
        $this->idProducto = $idProducto;
        $this->cantidad = $cantidad;
        $this->precio = $precio;
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
