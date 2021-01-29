<?php
interface IProducto
{
    public function crear(MProducto $producto);
    public function editar(\MProducto $producto);
    public function eliminar($producto);
    public function buscar($producto);
    public function mostrar();
}
