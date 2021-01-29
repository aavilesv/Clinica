<?php

class MCabDevolucion {
    private $numOrden;
    private $proveedor;
    private $fecha;
    private $empleado;
    private $descripcion;

    function __construct($numOrden='', $proveedor='', $fecha='', $empleado='', $descripcion='') {
        $this->proveedor = $proveedor;
        $this->numOrden = $numOrden;
        $this->fecha = $fecha;
        $this->empleado = $empleado;
        $this->descripcion = $descripcion;
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
