<?php

/**
 * Entidad USUARIO
 */
require_once('../../../Conexion/DBAAbstractModel1.php');
require_once('../Modelo/EntPermisos.php');
require_once('../Interfaz/IntPermisos.php');

class DaoPermisosModel extends DBAAbstractModel implements IntPermisos {

    public function __construct() {
        parent::__construct(); // 1ro Inicializa constructor padre
        $this->db_name = 'integrador1'; // Selecciona la BASE DATOS a trabajar
    }

    public function crearPermisos(EntPermisos $Permisos) {
        ini_set('date.timezone', 'America/Guayaquil');
        $fecha = strftime('%Y-%m-%d-%H-%M-%S', time());
        $nombrecrea = "1";
        $est = "1";
        try {
            //$this->consultar($usuario->usuario);     //Verifica si el registro existe en la base de datos
            $sql = "Insert into seg_rolmodulo
                        (idRolMod,idRol,idModulo,nuevo,modificar,eliminar,visualizar,estado)
                        values(null, ? , ? , ? , ? , ? , ? , ?  );";
            $stmt = $this->getConexion()->prepare($sql);
            //En el caso de ocurrir un error tipo Notice una de las atenrnativas es crear variables intermedias para el paso de valor
            $rol = $Permisos->__get('idRol');
            $modulo = $Permisos->__get('idModulo');
            $Nuevo = $Permisos->__get('nuevo');
            $Modificar = $Permisos->__get('modificar');
            $Eliminar = $Permisos->__get('eliminar');
            $Visualizar = $Permisos->__get('visualizar');
            if ($Nuevo == 'on') {
                $Nuevo = '1';
            }
            if ($Modificar == 'on') {
                $Modificar = '1';
            }
            if ($Eliminar == 'on') {
                $Eliminar = '1';
            }
            if ($Visualizar == 'on') {
                $Visualizar = '1';
            }
            $stmt->bind_param('sssssss', $rol, $modulo, $Nuevo, $Modificar, $Eliminar, $Visualizar,$est);
            $stmt->execute();
            if ($stmt->affected_rows) {
                return true;
            }
        } catch (Exception $ex) {
            throw $ex->getMessage();
        }
        return false;
    }

//una raya inversa para el autocompletado
    public function editarPermisos(\EntPermisos $Permisos) {
        ini_set('date.timezone', 'America/Guayaquil');
        $fechamod = strftime('%Y-%m-%d-%H-%M-%S', time());
        $nombremod = "1";
        $est = "1";
        try {
          $sql = "Update seg_rolmodulo
                set idRol = ? , idModulo = ?,nuevo= ?, modificar=?,eliminar=?,
                visualizar=?, estado=?
                Where idRolMod = ?";
            $stmt = $this->getConexion()->prepare($sql);
            $rol = $Permisos->__get('idRol');
            $modulo = $Permisos->__get('idModulo');
            $Nuevo = $Permisos->__get('nuevo');
            $Modificar = $Permisos->__get('modificar');
            $Eliminar = $Permisos->__get('eliminar');
            $Visualizar = $Permisos->__get('visualizar');
            if ($Nuevo == 'on') {
                $Nuevo = '1';
            }
            if ($Modificar == 'on') {
                $Modificar = '1';
            }
            if ($Eliminar == 'on') {
                $Eliminar = '1';
            }
            if ($Visualizar == 'on') {
                $Visualizar = '1';
            }
            $IdRolMod = $Permisos->__get('idRolMod');
            $stmt->bind_param('ssssssss', $rol, $modulo, $Nuevo, $Modificar, $Eliminar, $Visualizar, $est, $IdRolMod);
            $stmt->execute();
            if ($stmt->affected_rows) {
                return true;
            }
        } catch (Exception $ex) {
            throw $ex->getMessage();
        }
        return false;
    }

    public function eliminarPermisos($id) {
        ini_set('date.timezone', 'America/Guayaquil');
        $fechamod = strftime('%Y-%m-%d-%H-%M-%S', time());
        $nombremod = "1";
        $est = "0";
        try {
            $sql = "Update seg_rolmodulo
                    set estado=? Where idRolMod = ?";
            $stmt = $this->getConexion()->prepare($sql); //Prepara una sentencia para su ejecución y devuelve un objeto sentencia
            $stmt->bind_param('ss', $est, $id); //Agrega variables a una sentencia preparada como parámetros
            $stmt->execute();
            if ($stmt->affected_rows) {
                return true;
            }
        } catch (\Exception $ex) {
            throw $ex->getMessage();
        }

        return false;
    }

    public function __destruct() {
        //unset($this);
    }

    public function consultarPermiso($Permisos) {
        $permi = array();
        try {
            $sql = "select * from seg_rolmodulo
                  Where idRolMod = ?";
            $stmt = $this->getConexion()->prepare($sql);
            $stmt->bind_param('s', $Permisos);
            $stmt->execute();
            $rs = $stmt->get_result();
            while (($Permisos = $rs->fetch_object())) {
                $permi[] = new EntPermisos($Permisos->idRolMod, $Permisos->idRol, $Permisos->idModulo, $Permisos->nuevo,
                                           $Permisos->modificar, $Permisos->eliminar, $Permisos->visualizar, $Permisos->estado);
            }
            $rs->close();
        } catch (Exception $ex) {
            throw $ex->getMessage();
        }
        return $permi;
    }

    public function consultarRol() {
        $vector = array();
        try {
            $sql = "Select idRol,rolDescripcion,estado From segrol";
            $stmt = $this->getConexion()->prepare($sql); //Prepara una sentencia para su ejecución y devuelve un objeto sentencia
            $stmt->execute();
            $rs = $stmt->get_result();
            while ($vector[] = $rs->fetch_assoc());
            $rs->close();
        } catch (\Exception $ex) {
            throw $ex->getMessage();
        }

        return $vector;
    }

    public function consultarModulosPadre() {
        $vector = array();
        try {
            $sql = "Select idModulo,modNombre, estado From segmodulo Where estado = 0";
            $stmt = $this->getConexion()->prepare($sql); //Prepara una sentencia para su ejecución y devuelve un objeto sentencia
            $stmt->execute();
            $rs = $stmt->get_result();
            while ($vector[] = $rs->fetch_assoc());
            $rs->close();
        } catch (\Exception $ex) {
            throw $ex->getMessage();
        }

        return $vector;
    }

    public function consultarTodosPermisos() {
        $permi = array();
        try {
          $sql="select idRolMod, rol.rolDescripcion as idRol, m.modNombre as idModulo, nuevo, modificar, eliminar, visualizar, rm.estado
                from seg_rolmodulo as rm, segrol as rol,segmodulo as m
                where rol.idRol=rm.idRol and m.idModulo=rm.idModulo Order by rol.rolDescripcion";
            // $sql = "select Id_RolMod,rol.Rol_Det,m.Mod_Titulo,Nuevo,Modificar,Eliminar,Visualizar,rm.Fech_Cre,rm.Usu_Cre,rm.Fech_Mod,rm.Usu_Mod,rm.Est
            //         From seg_rolmodulo as rm, seg_rol as rol,seg_modulo as m
            //         Where rol.Id_Rol= rm.Id_Rol and m.Id_Modulo = rm.Id_Mod Order by rol.Rol_Det";
            $stmt = $this->getConexion()->prepare($sql);
            $stmt->execute();
            $rs = $stmt->get_result();
            while (($Permisos = $rs->fetch_object())) {
                $permi[] = new EntPermisos($Permisos->idRolMod, $Permisos->idRol, $Permisos->idModulo, $Permisos->nuevo,
                                            $Permisos->modificar, $Permisos->eliminar, $Permisos->visualizar, $Permisos->estado);
            }
            $rs->close();
        } catch (Exception $ex) {
            throw $ex->getMessage();
        }
        return $permi;
    }

    public function consultarrolesmodulos($variable) {
        $rolmod = array();
        try {
            $sql = "Select idRol,idModulo,nuevo,modificar,eliminar,visualizar,estado From seg_rolmodulo Where idRol=?";
            $stmt = $this->getConexion()->prepare($sql);
            $stmt->bind_param('s', $variable);
            $stmt->execute();
            $rs = $stmt->get_result();
            while ($rolmod[] = $rs->fetch_assoc());
            $rs->close();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        return $rolmod;
    }

    public function consultarTodosRoles() {
        $roles = array();
        try {
            $sql = "Select Id_Rol, Rol_Det, Fech_Cre, UsuCre, Fech_Mod, Usu_Mod,Est
                    From seg_rol Order By Rol_Det";
            $stmt = $this->getConexion()->prepare($sql);
            $stmt->execute();
            $rs = $stmt->get_result();
            while (($rol = $rs->fetch_object())) {
                $roles[] = new Rol($rol->Id_Rol, $rol->Rol_Det, $rol->Fech_Cre, $rol->UsuCre, $rol->Fech_Mod, $rol->Usu_Mod, $rol->Est);
            }
            $rs->close();
        } catch (Exception $ex) {
            throw $ex->getMessage();
        }
        return $roles;
    }

    public function consultarpermisoexistente($idrol, $idmodulo) {
        $estado = true;
        try {
            $sql = "Select idRol,idModulo
                    From seg_rolmodulo where idRol=? and idModulo=?";
            $stmt = $this->getConexion()->prepare($sql);
            $stmt->bind_param('ii', $idrol, $idmodulo);
            $stmt->execute();
            $rs = $stmt->get_result();
            if ($tmp = $rs->fetch_object()) {
                $estado = false;
            }
            $rs->close();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        return $estado;
    }

}
