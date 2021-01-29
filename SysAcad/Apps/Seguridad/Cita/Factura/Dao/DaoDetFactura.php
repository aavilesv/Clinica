<?php
/**
 * Entidad Factura
 */


require_once('../../../../Conexion/DBAAbstractModel1.php');
require_once('../Modelo/EntDetFactura.php');
require_once('../Interfaz/IntDetFactura.php');
class DaoDetFacturaModel extends DBAAbstractModel implements IntDetFac
{
    public function __construct()
    {
        parent::__construct(); // 1ro Inicializa constructor padre
        $this->db_name = 'integrador1'; // Selecciona la BASE DATOS a trabajar
    }

    public function crearDetFac(EntDetFac $factura)
    {
      try {
          //$this->consultar($usuario->usuario);     //Verifica si el registro existe en la base de datos
          $sql = "Insert into facdetfac
                      (FACDetId, FACCabId, IdProducto, FACDetCantidad, FACDetPrecio, FACDetEstado)
                      values(null, ?, ?, ?, ?, ?);";
          $stmt = $this->getConexion()->prepare($sql);
          //En el caso de ocurrir un error tipo Notice una de las atenrnativas es crear variables intermedias para el paso de valor
          $stmt->bind_param('iiidi', $factura->__get('FACCabId'), $factura->__get('IdProducto'),
          $factura->__get('FACDetCantidad'), $factura->__get('FACDetPrecio'), $factura->__get('FACDetEstado'));
          $stmt->execute();
          if ($stmt->affected_rows) {
              return true;
          }
      } catch (Exception $ex) {
          throw $ex->getMessage();
      }
      return false;
    }


    public function editarDetFac(EntDetFac $factura)
    {
        try {
            $sql=  "UPDATE facdetfac SET FACDetCantidad=?,FACDetPrecio=?,FACDetValorUni=?,FACDetValorTot=?,FACDetEstado=? WHERE FACDetIdDetFac = ?";

            $stmt = $this->getConexion()->prepare($sql);
            $stmt->bind_param('iiiiiijijijssz', $factura->__get('FACDetIdDetFac'), $factura->__get('FACDetCantidad'), $factura->__get('FACDetPrecio'), $factura->__get('FACDetValorUni',
            $factura->__get('FACDetValorTot'), $factura->__get('FACDetEstado')));
            $stmt->execute();
            if ($stmt->affected_rows) {
                return true;
            }
        } catch (Exception $ex) {
            throw $ex->getMessage();
        }
        return false;
    }

    public function eliminarDetFac($id, $est)
    {
      try {
          $sql="Update facdetfac
                        Set FACDetEstado = ?
                        Where FACCabId = ? ";
          $stmt = $this->getConexion()->prepare($sql);
          $stmt->bind_param('ii', $est, $id);
          $stmt->execute();
          if ($stmt->affected_rows) {
              return true;
          }
      } catch (Exception $ex) {
          throw $ex->getMessage();
      }
      return false;
    }

    public function __destruct()
    {
        //unset($this);
    }

    public function consultarDetFac($detalle)
    {
      try {
          $sql = "Select FACDetId, FACCabId, IdProducto, FACDetCantidad, FACDetPrecio, FACDetEstado
          From facdetfac  Where FACCabId = ? and FACDetEstado = 1" ;
          $stmt = $this->getConexion()->prepare($sql); //Prepara una sentencia para su ejecución y devuelve un objeto sentencia
          $stmt->bind_param('i', $detalle); //Agrega variables a una sentencia preparada como parámetros
          $stmt->execute();
          $rs = $stmt->get_result();
          $factura = null;
          if ($tmp = $rs->fetch_object()) {
              $detalle = new EntDetFac($tmp->FACDetId, $tmp->FACCabId, $tmp->IdProducto,
              $tmp->FACDetCantidad, $tmp->FACDetPrecio, $tmp->FACDetEstado);
          }
      } catch (\Exception $ex) {
          throw $ex->getMessage();
      }

        return $detalle;
    }


    public function consultarTodasDetFac()
    {
        $facturas = array();
        try {
            $sql = "SELECT  FACDetIdDetFac, FACDetCantidad, FACDetPrecio, FACDetValorUni,
              FACDetValorTot, FACDetEstado FROM facdetfac" ;
            $stmt = $this->getConexion()->prepare($sql);
            $stmt->execute();
            $rs = $stmt->get_result();
            while (($factura = $rs->fetch_object())) {
                $facturas[] = new DetFactura($tmp->FACDetIdDetFac, $tmp->FACDetCantidad, $tmp->FACDetPrecio, $tmp->FACDetValorUni, $tmp->FACDetValorTot,
                $tmp->FACDetEstado);
            }
            $rs->close();
        } catch (Exception $ex) {
            throw $ex->getMessage();
        }
        return $facturas;
    }

    public function codigoFactura()
    {
        $producto;
        try {
            $sql = "select max(FACCabId) as maximo from faccabfac" ;
            $stmt = $this->getConexion()->prepare($sql);
            $stmt->execute();
            $rs = $stmt->get_result();
            if ($tmp = $rs->fetch_object()) {
                $producto = $tmp->maximo;
            }
            $rs->close();
        } catch (Exception $ex) {
            throw $ex->getMessage();
        }
        return $producto;
    }

    public function ConsultarStock($id)
    {
      $producto;
      try {
          $sql="select stock from comtbproducto
                        Where idProducto = ? ";
          $stmt = $this->getConexion()->prepare($sql);
          $stmt->bind_param('i', $id);
          $stmt->execute();
          $rs = $stmt->get_result();
          if ($tmp = $rs->fetch_object()) {
              $producto = $tmp->stock;
          }
          $rs->close();
      } catch (Exception $ex) {
          throw $ex->getMessage();
      }
      return $producto;;
    }


    public function ActualizarStock($id, $stock)
    {
      $producto=$this->ConsultarStock($id);
      $stock = $producto - $stock;
      try {
          $sql="Update comtbproducto
                        Set stock = ?
                        Where idProducto = ? ";
          $stmt = $this->getConexion()->prepare($sql);
          $stmt->bind_param('ii', $stock, $id);
          $stmt->execute();
          if ($stmt->affected_rows) {
              return true;
          }
      } catch (Exception $ex) {
          throw $ex->getMessage();
      }
      return false;
    }
}#Fin de la clase modelo Factura
