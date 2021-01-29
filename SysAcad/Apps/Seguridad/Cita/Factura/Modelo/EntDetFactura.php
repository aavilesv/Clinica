<?php
/*
 * Entidad Factura
 */

class EntDetFac
{
    private $FACDetId;
    private $FACCabId;
    private $IdProducto;
    private $FACDetCantidad;
    private $FACDetPrecio;
    private $FACDetEstado;


    public function __construct($FACDetId =0, $FACCabId=0,$IdProducto=0, $FACDetCantidad=0, $FACDetPrecio=0,
    $FACDetEstado=0)
    {
        $this->FACDetId = $FACDetId;
        $this->FACCabId  = $FACCabId;
        $this->IdProducto = $IdProducto;
        $this->FACDetCantidad  = $FACDetCantidad;
        $this->FACDetPrecio    = $FACDetPrecio;
        $this->FACDetEstado   = $FACDetEstado;

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
}#Fin de la clase modelo Factura
