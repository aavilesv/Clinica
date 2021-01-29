<?php
interface IntUsuario
{
    public function crearUsuario(Usuario $usuario);
    public function editarUsuario(\Usuario $usuario);
    public function eliminarUsuario($id);
    public function consultarUsuario($usuario);
    public function consultarTodosUsuarios();
}
