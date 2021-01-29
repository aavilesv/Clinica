<?php
/*
 * Entidad USUARIO
 */

class Usuario
{
    private $nombre;
    private $apellido;
    private $id;
    private $usuario;
    private $clave;

    public function __construct($id=0, $nombre='', $apellido='', $usuario='', $clave ='')
    {
        $this->id       = $id;
        $this->nombre   = $nombre;
        $this->apellido = $apellido;
        $this->usuario  = $usuario;
        $this->clave    = $clave;
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
}#Fin de la clase modelo Usuario
