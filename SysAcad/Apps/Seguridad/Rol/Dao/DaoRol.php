<?php
/**
 * Entidad USUARIO
 */

//session_start();
require_once('../../../Conexion/DBAAbstractModel1.php');
require_once('../Modelo/EntRol.php');
//require_once('../Modelo/EntRol.php');
//require_once('../Interfaz/IntUsuario.php');
class DaoUsuarioModel extends DBAAbstractModel //implements IntUsuario
{
  public function consultarRoles(){
    $roles = array();
    try {
      $sql = "Select idRol, rolDescripcion
              From segrol  Order By idRol";
      $stmt = $this->getConexion()->prepare($sql);
      $stmt->execute();
      $rs = $stmt->get_result();
      while (($rol = $rs->fetch_object())) {
          $roles[] = new Rol($rol->idRol, $rol->rolDescripcion);
      }
      $rs->close();
    } catch (\Exception $e) {

    }
      return $roles;
  }
}#Fin de la clase modelo Usuario
