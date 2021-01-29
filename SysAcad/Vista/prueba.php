<?php
require_once("../Dao/DaoUsuario.php");
require_once("../Modelo/EntUsuario.php");

/*
#Consulta todos los registros de usuario
$usuario = new DaoUsuarioModel();
$objUsuarios= $usuario->consultarTodos();
//var_dump($objUsuarios);
foreach ($objUsuarios as $usuario) {
    if (!(is_null($usuario->nombre))) {
        echo "Id: ".$usuario->id."<br>";
        echo "Nombre: ".$usuario->nombre."<br>";
        echo "Apellido: ".$usuario->apellido."<br>";
        echo "Usuario: ".$usuario->usuario."<br>";
        echo "Clave: ".$usuario->clave."<br><br>";
    }
}*/


/*
echo "<hr>";
#Consulta un registro
$usuario = new DaoUsuarioModel();
$objUsuario = $usuario->consultar(22);
//var_dump($objUsuario);
if (!is_null($objUsuario)) {
    echo "Nombre: ".$objUsuario->nombre."<br>";
    echo "Apellido: ".$objUsuario->apellido."<br>";
    echo "Usuario: ".$objUsuario->usuario."<br>";
    echo "Clave: ".$objUsuario->clave."<br>";
}*/

/*
#Elimina un registro
$usuario = new DaoUsuarioModel();
if ($usuario->eliminar(22)) {
    echo "Usuario eliminado correctamente";
};*/


/*
#Crea un nuevo registro
$usuario = new Usuario();
$usuario->__set('nombre', 'Jorge');
$usuario->__set('apellido', 'Vinueza');
$usuario->__set('usuario', 'jvinueza');
$usuario->__set('clave', '12345');

$objUsuario = new DaoUsuarioModel($usuario);
$objUsuario->crearUsuario($usuario);
if ($objUsuario) {
    echo "Registro grabado con éxito";
}*/



#Editar un registro existente
$usuario = new Usuario();
$usuario->__set('id', 48);
$usuario->__set('nombre', 'Jorge Luis');
$usuario->__set('apellido', 'Vinueza Martínez');
$usuario->__set('usuario', 'jvinuezam');
$usuario->__set('clave', '4567');
$objUsuario = new DaoUsuarioModel($usuario);
$objUsuario->editarUsuario($usuario);
if ($objUsuario) {
    echo "Registro modificado con éxito";
}
