<?php
/*
 * Entidad USUARIO
 */

class EntPermisos
{
    private $idRolMod;
    private $idRol;
    private $idModulo;
    private $nuevo;
    private $modificar;
    private $eliminar;
    private $visualizar;

    private $estado;
    public function __construct($idRolMod='',$idRol='',$idModulo='',$nuevo='',$modificar='',$eliminar='',$visualizar='',$estado='')
    {
      $this->idRolMod  = $idRolMod;
      $this->idRol   = $idRol;
      $this->idModulo = $idModulo;
      $this->nuevo  = $nuevo;
      $this->modificar  = $modificar;
      $this->eliminar  = $eliminar;
      $this->visualizar = $visualizar;

      $this->estado  = $estado;

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
