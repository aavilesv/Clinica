<?php
interface IntCabFactura
{
    public function crearCabFactura(CabFactura $factura);
    public function eliminarCabFactura($id, $est);
    public function consultarCabFactura($factura);
    public function consultarTodasCabFactura();
}
