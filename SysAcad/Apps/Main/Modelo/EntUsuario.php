<?php
/*
 * Entidad USUARIO
 */

class Usuario
{
    private $usuNombre;
    private $usuApellido;
    private $idLogin;
    private $usuLogin;
    private $usuClave;
    private $idRol;
    private $foto;
    private $email;

    public function __construct($idLogin=0, $usuNombre='', $usuApellido='', $usuLogin='', $usuClave ='',$idRol=0, $foto='',$email='')
    {
        $this->idLogin       = $idLogin;
        $this->usuNombre   = $usuNombre;
        $this->usuApellido = $usuApellido;
        $this->usuLogin  = $usuLogin;
        $this->usuClave    = $usuClave;
        $this->idRol    = $idRol;
        $this->foto    = $foto;
        $this->email    = $email;
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
