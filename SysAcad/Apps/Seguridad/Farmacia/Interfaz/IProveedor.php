<?php
interface IProveedor
{
    public function crear(MProveedor $proveedor);
    public function editar(\MProveedor $proveedor);
    public function eliminar($proveedor);
    public function buscar($proveedor);
    public function mostrar();
}
