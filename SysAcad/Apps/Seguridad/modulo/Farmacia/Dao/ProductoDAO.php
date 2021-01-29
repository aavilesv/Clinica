<?php

/**
 * Description of ProductoDAO
 *
 * @author Andres
 */

require_once('../../../Conexion/DBAAbstractModel1.php');
require_once('../Modelo/MProducto.php');
require_once('../Interfaz/IProducto.php');

class ProductoDAO extends DBAAbstractModel implements IProducto{

    public function __construct() {
        parent::__construct(); // 1ro Inicializa constructor padre
        $this->db_name = 'integrador1'; // Selecciona la BASE DATOS a trabajar
    }

    public function crear(MProducto $producto) {
        try {
            //$this->consultar($usuario->usuario);     //Verifica si el registro existe en la base de datos
            $sql = "INSERT INTO comtbproducto Values (NULL, ?, ?, ?, ?, ?, ?,?);";
            $stmt = $this->getConexion()->prepare($sql);
            //En el caso de ocurrir un error tipo Notice una de las atenrnativas es crear variables intermedias para el paso de valor
            $prod = $producto->__get('nombreProd');
            $f_ven = $producto->__get('vencimiento');
            $f_elab = $producto->__get('elaboracion');
            $prec = $producto->__get('precio');
            $stock = 0;
            $img =  $producto->__get('imagen');
            $f_ven = str_replace('/', '-', $f_ven);
            $f_elab = str_replace('/', '-', $f_elab);
            $est = 1;

            $stmt->bind_param('sssdisi', $prod, $f_ven, $f_elab, $prec, $stock, $img, $est);
            $stmt->execute();
            if ($stmt->affected_rows) {
                return true;
            }
        } catch (Exception $ex) {
            throw $ex->getMessage();
        }
        return false;
    }

    public function editar(\MProducto $producto) {
        try {
            $sql = "Update comtbproducto
                          Set nombreProd = ?, f_venc = ?, f_elab = ?, precio = ?, estado = ?, imagen = ?
                          Where idProducto = ? ";
            $stmt = $this->getConexion()->prepare($sql);
            $prod = $producto->__get('nombreProd');
            $f_ven = $producto->__get('vencimiento');
            $f_elab = $producto->__get('elaboracion');
            $img =  $producto->__get('imagen');
            $f_ven = str_replace('/', '-', $f_ven);
            $f_elab = str_replace('/', '-', $f_elab);
            $estado = $producto->__get('estado');
            $id = $producto->__get('idProducto');
            $precio = $producto->__get('precio');
            $stmt->bind_param('sssdisi', $prod, $f_ven, $f_elab, $precio, $estado, $img, $id);
            $stmt->execute();
            if ($stmt->affected_rows) {
                return true;
            }
        } catch (Exception $ex) {
            throw $ex->getMessage();
        }
        return false;
    }

    public function eliminar($producto) {
        try {
            $sql = "Update comtbproducto Set estado = ? Where idProducto = ?";
            $stmt = $this->getConexion()->prepare($sql); //Prepara una sentencia para su ejecución y devuelve un objeto sentencia
            $estado = 0;
            $stmt->bind_param('ii',$estado, $producto); //Agrega variables a una sentencia preparada como parámetros
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

    public function buscar($producto) {
        try {
            $sql = "SELECT * FROM comtbproducto WHERE idProducto = ?";
            $stmt = $this->getConexion()->prepare($sql); //Prepara una sentencia para su ejecución y devuelve un objeto sentencia
            $stmt->bind_param('s', $producto); //Agrega variables a una sentencia preparada como parámetros
            $stmt->execute();
            $rs = $stmt->get_result();
            $producto = null;
            if ($tmp = $rs->fetch_object()) {
                $producto = new MProducto($tmp->idProducto, $tmp->nombreProd, $tmp->f_venc, $tmp->f_elab, $tmp->precio, $tmp->stock, $tmp->imagen, $tmp->estado);
            }
        } catch (\Exception $ex) {
            throw $ex->getMessage();
        }

        return $producto;
    }

    public function mostrar() {
        $productos = array();
        try {
            $sql = "SELECT * FROM comtbproducto";
            $stmt = $this->getConexion()->prepare($sql);
            $stmt->execute();
            $rs = $stmt->get_result();
            while (($producto = $rs->fetch_object())) {
                $productos[] = new MProducto($producto->idProducto, $producto->nombreProd, $producto->f_venc, $producto->f_elab, $producto->precio, $producto->stock, $producto->imagen, $producto->estado);
            }
            $rs->close();
        } catch (Exception $ex) {
            throw $ex->getMessage();
        }
        return $productos;
    }
}
