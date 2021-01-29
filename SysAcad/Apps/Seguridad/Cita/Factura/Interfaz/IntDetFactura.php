<?php
interface IntDetFac
{
    public function crearDetFac(EntDetFac $factura);
    public function editarDetFac(EntDetFac $factura);
    public function eliminarDetFac($id, $est);
    public function consultarDetFac($factura);
    public function consultarTodasDetFac();
}
