<?php
/**
 * Entidad USUARIO
 */


require_once('../../Conexion/DBAAbstractModel1.php');
require_once('../Modelo/EntUsuario.php');
require_once('../Interfaz/IntUsuario.php');
class DaoUsuarioModel extends DBAAbstractModel implements IntUsuario
{
    public function __construct()
    {
        parent::__construct(); // 1ro Inicializa constructor padre
        $this->db_name = 'integrador'; // Selecciona la BASE DATOS a trabajar
    }

    public function crearUsuario(Usuario $usuario)
    {
        try {
            //$this->consultar($usuario->usuario);     //Verifica si el registro existe en la base de datos
            $sql = "Insert into usuario
                        (Id, usuario, password, nombre, apellido)
                        values(null, ?, ?, ?, ?);";
            $stmt = $this->getConexion()->prepare($sql);
            //En el caso de ocurrir un error tipo Notice una de las atenrnativas es crear variables intermedias para el paso de valor
            $stmt->bind_param('ssss', $usuario->__get('usuario'), $usuario->__get('clave'), $usuario->__get('nombre'), $usuario->__get('apellido'));
            $stmt->execute();
            if ($stmt->affected_rows) {
                return true;
            }
        } catch (Exception $ex) {
            throw $ex->getMessage();
        }
        return false;
    }


    public function editarUsuario(\Usuario $usuario)
    {
        try {
            $sql="Update usuario
                          Set nombre = ?, apellido= ?, password = ?
                          Where usuario = ? ";
            $stmt = $this->getConexion()->prepare($sql);
            $stmt->bind_param('ssss', $usuario->__get('nombre'), $usuario->__get('apellido'), $usuario->__get('clave'), $usuario->__get('usuario'));
            $stmt->execute();
            if ($stmt->affected_rows) {
                return true;
            }
        } catch (Exception $ex) {
            throw $ex->getMessage();
        }
        return false;
    }

    public function eliminarUsuario($id)
    {
        try {
            $sql = "Delete From usuario Where Id = ?";
            $stmt = $this->getConexion()->prepare($sql); //Prepara una sentencia para su ejecución y devuelve un objeto sentencia
            $stmt->bind_param('i', $id); //Agrega variables a una sentencia preparada como parámetros
            $stmt->execute();
            if ($stmt->affected_rows) {
                return true;
            }
        } catch (\Exception $ex) {
            throw $ex->getMessage();
        }

        return false;
    }

    public function __destruct()
    {
        //unset($this);
    }

    public function consultarUsuario($usuario)
    {
        try {
            $sql = "Select Id as id, usuario, password, nombre, apellido  From usuario  Where usuario = ?" ;
            $stmt = $this->getConexion()->prepare($sql); //Prepara una sentencia para su ejecución y devuelve un objeto sentencia
            $stmt->bind_param('s', $usuario); //Agrega variables a una sentencia preparada como parámetros
            $stmt->execute();
            $rs = $stmt->get_result();
            $usuario = null;
            if ($tmp = $rs->fetch_object()) {
                $usuario = new Usuario($tmp->id, $tmp->nombre, $tmp->apellido, $tmp->usuario, $tmp->password);
            }
        } catch (\Exception $ex) {
            throw $ex->getMessage();
        }

        return $usuario;
    }


    public function consultarTodosUsuarios()
    {
        $usuarios = array();
        try {
            $sql = "Select Id, usuario, password, nombre, apellido
                    From usuario Order By apellido";
            $stmt = $this->getConexion()->prepare($sql);
            $stmt->execute();
            $rs = $stmt->get_result();
            while (($usuario = $rs->fetch_object())) {
                $usuarios[] = new Usuario($usuario->Id, $usuario->nombre, $usuario->apellido, $usuario->usuario, $usuario->password);
            }
            $rs->close();
        } catch (Exception $ex) {
            throw $ex->getMessage();
        }
        return $usuarios;
    }
}#Fin de la clase modelo Usuario
