
<?php

/**
 * Entidad USUARIO
 */
require_once('../../../Conexion/DBAAbstractModel1.php');
require_once('../Modelo/MProveedor.php');
require_once('../Interfaz/IProveedor.php');

class ProveedorDAO extends DBAAbstractModel implements IProveedor {

    public function __construct() {
        parent::__construct(); // 1ro Inicializa constructor padre
        $this->db_name = 'integrador1'; // Selecciona la BASE DATOS a trabajar
    }



    public function crear(MProveedor $proveedor) {
        try {
            //$this->consultar($usuario->usuario);     //Verifica si el registro existe en la base de datos
            $sql = "Insert into comtbproveedor Values (null, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->getConexion()->prepare($sql);
            //En el caso de ocurrir un error tipo Notice una de las atenrnativas es crear variables intermedias para el paso de valor
            $ruc = $proveedor->__get('ruc');
            $rz = $proveedor->__get('razonSocial');
            $tel = $proveedor->__get('telefono');
            $ema = $proveedor->__get('email');
            $img = $proveedor->__get('imagen');
            $dir = $proveedor->__get('direccion');
            $estado = 1;

            $stmt->bind_param('ssssssi', $ruc, $rz, $tel, $ema, $dir, $img, $estado);
            $stmt->execute();
            if ($stmt->affected_rows) {
                return true;
            }
        } catch (Exception $ex) {
            throw $ex->getMessage();
        }
        return false;
    }



    public function editar(\MProveedor $proveedor) {
        try {

            $sql = "UPDATE comtbproveedor
                          SET razonSocial = ?, telefono= ?, email = ?, direccion = ?, imagen = ?, estado = ?
                          WHERE ruc = ? ";
            $stmt = $this->getConexion()->prepare($sql);
            $ruc = $proveedor->__get('ruc');
            $rz = $proveedor->__get('razonSocial');
            $tel = $proveedor->__get('telefono');
            $ema = $proveedor->__get('email');
            $dir = $proveedor->__get('direccion');
            $img = $proveedor->__get('imagen');
            $estado = $proveedor->__get('estado');
            $stmt->bind_param('sssssis', $rz, $tel, $ema, $dir, $img, $estado, $ruc);
            $stmt->execute();
            if ($stmt->affected_rows) {
                return true;
            }
        } catch (Exception $ex) {
            throw $ex->getMessage();
        }
        return false;
    }

    public function eliminar($proveedor) {
        try {
            $sql = "Update comtbproveedor Set estado = ? Where ruc = ?";
            $stmt = $this->getConexion()->prepare($sql); //Prepara una sentencia para su ejecución y devuelve un objeto sentencia
            $estado = 0;
            $stmt->bind_param('is', $estado, $proveedor); //Agrega variables a una sentencia preparada como parámetros
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

    public function buscar($proveedor) {
        try {
            $sql = "Select ruc, razonSocial, telefono, email, direccion, imagen, estado  From comtbproveedor Where razonSocial = ?";
            $stmt = $this->getConexion()->prepare($sql); //Prepara una sentencia para su ejecución y devuelve un objeto sentencia
            $stmt->bind_param('s', $proveedor); //Agrega variables a una sentencia preparada como parámetros
            $stmt->execute();
            $rs = $stmt->get_result();
            $proveedor = null;
            if ($tmp = $rs->fetch_object()) {
                $proveedor = new MProveedor($tmp->ruc, $tmp->razonSocial, $tmp->telefono, $tmp->email, $tmp->direccion, $tmp->imagen, $tmp->estado);
            }
        } catch (\Exception $ex) {
            throw $ex->getMessage();
        }

        return $proveedor;
    }

    public function mostrar() {
        $proveedores = array();
        try {
            $sql = "SELECT ruc, razonSocial, telefono, email, direccion, imagen, estado FROM comtbproveedor Order By ruc";
            $stmt = $this->getConexion()->prepare($sql);
            $stmt->execute();
            $rs = $stmt->get_result();
            while (($proveedor = $rs->fetch_object())) {
                $proveedores[] = new MProveedor($proveedor->ruc, $proveedor->razonSocial, $proveedor->telefono, $proveedor->email, $proveedor->direccion, $proveedor->imagen, $proveedor->estado);
            }
            $rs->close();
        } catch (Exception $ex) {
            throw $ex->getMessage();
        }
        return $proveedores;
    }

}

#Fin de la clase modelo Usuario
