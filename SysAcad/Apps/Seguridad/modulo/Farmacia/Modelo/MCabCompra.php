<?php

class MCabCompra {
    private $idproveedor;
    private $empleado;
    private $numOrden;
    private $fecha;
    private $subtotal;
    private $iva;
    private $total;

    function __construct($idproveedor=0, $empleado='', $numOrden='', $fecha='', $subtotal=0.0, $iva=0.0, $total=0.0) {
        $this->idproveedor = $idproveedor;
        $this->empleado = $empleado;
        $this->numOrden = $numOrden;
        $this->fecha = $fecha;
        $this->subtotal = $subtotal;
        $this->iva= $iva;
        $this->total= $total;
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
