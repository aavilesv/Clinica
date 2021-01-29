<?php
/**
 * Entidad USUARIO
 */

//session_start();
require_once('../../../Conexion/DBAAbstractModel1.php');
require_once('../Modelo/EntModulo.php');
//require_once('../Modelo/EntRol.php');
//require_once('../Interfaz/IntUsuario.php');
class DaoUsuarioModel extends DBAAbstractModel //implements IntUsuario
{
  public function consultarTodosModulos()
  {
    $modulos = array();
    try {
        $sql = "select idModulo, modNombre, modDescripcion, codigo, modFoto,  color, modPadre, estado from segmodulo order by idModulo";
      $stmt = $this->getConexion()->prepare($sql);
      $stmt->execute();
      $rs = $stmt->get_result();
      while (($modulo = $rs->fetch_object())) {
        $modulos[] = new Modulo($modulo->idModulo, $modulo->modNombre, $modulo->modDescripcion, $modulo->codigo,
                                   $modulo->modFoto, $modulo->color, $modulo->modPadre, $modulo->estado);
      }
      return $modulos;
      $rs->close();
    } catch (Exception $ex) {
      throw $ex->getMessage();
    }
    return $modulos;
  }

  public function consultarrolesmodulos($variable)
  {
        $rolmod = array();
        try {
            $sql = "select idRol, idModulo, nuevo, modificar, eliminar, visualizar, estado from seg_rolmodulo
                    where idRol = ? ";
            $stmt = $this->getConexion()->prepare($sql);
            $stmt->bind_param('i', $variable);
            $stmt->execute();
            $rs = $stmt->get_result();
            while ($rolmod[] = $rs->fetch_assoc());
            $rs->close();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        return $rolmod;
    }

    public function consultarModulo($usuario) {
        try {
            $sql = "Select idModulo, modNombre, modDescripcion, codigo, modFoto, color, modPadre, estado
            From segmodulo  Where idModulo = ?";
            $stmt = $this->getConexion()->prepare($sql); //Prepara una sentencia para su ejecución y devuelve un objeto sentencia
            $stmt->bind_param('i', $usuario); //Agrega variables a una sentencia preparada como parámetros
            $stmt->execute();
            $rs = $stmt->get_result();
            $usuario = null;
            if ($tmp = $rs->fetch_object()) {
                $usuario = new Modulo($tmp->idModulo, $tmp->modNombre, $tmp->modDescripcion, $tmp->codigo,
                                      $tmp->modFoto, $tmp->color, $tmp->modPadre, $tmp->estado);
            }
        } catch (\Exception $ex) {
            throw $ex->getMessage();
        }

        return $usuario;
    }
}#Fin de la clase modelo Usuario
