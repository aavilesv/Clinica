<?php
class MProveedor
{
    private $ruc;
    private $razonSocial;
    private $telefono;
    private $email;
    private $direccion;
    private $imagen;
    private $estado;

    function __construct($ruc='', $razonSocial='', $telefono='', $email='', $direccion='', $imagen='', $estado=0)
    {
      $this->ruc = $ruc;
      $this->razonSocial = $razonSocial;
      $this->telefono = $telefono;
      $this->email = $email;
      $this->direccion = $direccion;
      $this->imagen=$imagen;
      $this->estado = $estado;
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

}
