<?php
interface IntCliente
{
    public function crearCliente(Cliente $Client);
    public function editarCliente(Cliente $Client);
    public function eliminarCliente($id);
    public function consultarCliente($Client);
    public function consultarTodosClientes();
}
