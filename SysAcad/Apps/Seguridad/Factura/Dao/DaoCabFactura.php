<?php
/**
 * Entidad Factura
 */


require_once('../../../Conexion/DBAAbstractModel1.php');
require_once('../Modelo/EntCabFactura.php');
require_once('../Interfaz/IntCabFactura.php');
class DaoCabFacturaModel extends DBAAbstractModel implements IntCabFactura
{
    public function __construct()
    {
        parent::__construct(); // 1ro Inicializa constructor padre
        $this->db_name = 'integrador1'; // Selecciona la BASE DATOS a trabajar
    }

    public function crearCabFactura(CabFactura $factura)
    {
        try {
            //$this->consultar($usuario->usuario);     //Verifica si el registro existe en la base de datos
            $sql = "Insert into faccabfac
                        (FACCabId, FACabFec, FACCabDes, FACCabSubtotal, FACCabIva, FACCabTotal,
                        FACCabTipCli, FACCabCliId,FACCabUsuCrea, FACCabFecCrea, FACCabUsuMod, FACCabFecMod, FACCabEst)
                        values(null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
            $stmt = $this->getConexion()->prepare($sql);
            //En el caso de ocurrir un error tipo Notice una de las atenrnativas es crear variables intermedias para el paso de valor
            $stmt->bind_param('sddidsiisisi', $factura->__get('FACabFec'), $factura->__get('FACCabDes'),
            $factura->__get('FACCabSubtotal'), $factura->__get('FACCabIva'), $factura->__get('FACCabTotal'), $factura->__get('FACCabTipCli'),
            $factura->__get('FACCabCliId'), $factura->__get('FACCabUsuCrea'), $factura->__get('FACCabFecCrea'), $factura->__get('FACCabUsuMod'),
            $factura->__get('FACCabFecMod'), $factura->__get('FACCabEst'));
            $stmt->execute();
            if ($stmt->affected_rows) {
                return true;
            }
        } catch (Exception $ex) {
            throw $ex->getMessage();
        }
        return false;
    }

    public function eliminarCabFactura($id, $est)
    {
      try {
          $sql="Update faccabfac
                        Set FACCabEst = ?
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

    public function consultarCabFactura($factura)
    {
        try {
            $sql = "Select FACCabId, FACabFec, FACCabDes, FACCabSubtotal, FACCabIva, FACCabTotal,
            FACCabTipCli, FACCabCliId,FACCabUsuCrea, FACCabFecCrea, FACCabUsuMod, FACCabFecMod, FACCabEst
            From faccabfac  Where FACCabId = ? and FACCabEst = 1" ;
            $stmt = $this->getConexion()->prepare($sql); //Prepara una sentencia para su ejecución y devuelve un objeto sentencia
            $stmt->bind_param('i', $factura); //Agrega variables a una sentencia preparada como parámetros
            $stmt->execute();
            $rs = $stmt->get_result();
            $factura = null;
            if ($tmp = $rs->fetch_object()) {
                $factura = new CabFactura($tmp->FACCabId, $tmp->FACabFec, $tmp->FACCabDes,
                $tmp->FACCabSubtotal, $tmp->FACCabIva, $tmp->FACCabTotal, $tmp->FACCabTipCli, $tmp->FACCabCliId,
                $tmp->FACCabUsuCrea, $tmp->FACCabFecCrea, $tmp->FACCabUsuMod, $tmp->FACCabFecMod, $tmp->FACCabEst);
            }
        } catch (\Exception $ex) {
            throw $ex->getMessage();
        }

        return $factura;
    }


    public function consultarTodasCabFactura()
    {
        $facturas = array();
        try {
            $sql = "Select FACCabId, FACabFec, FACCabDes, FACCabSubtotal, FACCabIva, FACCabTotal,
            FACCabTipCli, FACCabCliId ,FACCabUsuCrea, FACCabFecCrea, FACCabUsuMod, FACCabFecMod, FACCabEst
            From faccabfac as fac where fac.FACCabEst = 1" ;
            $stmt = $this->getConexion()->prepare($sql);
            $stmt->execute();
            $rs = $stmt->get_result();
            while (($tmp = $rs->fetch_object())) {
                $facturas[] = new CabFactura($tmp->FACCabId, $tmp->FACabFec, $tmp->FACCabDes,
                $tmp->FACCabSubtotal, $tmp->FACCabIva, $tmp->FACCabTotal, $tmp->FACCabTipCli, $tmp->FACCabCliId,
                $tmp->FACCabUsuCrea, $tmp->FACCabFecCrea, $tmp->FACCabUsuMod, $tmp->FACCabFecMod, $tmp->FACCabEst);
            }
            $rs->close();
        } catch (Exception $ex) {
            throw $ex->getMessage();
        }
        return $facturas;
    }

    public function consultarProductos()
    {
        $productos = array();
        try {
            $sql = "Select pro.idProducto, pro.nombreProd
                    from comtbproducto as pro
                    where pro.estado = 1" ;
            $stmt = $this->getConexion()->prepare($sql);
            $stmt->execute();
            $rs = $stmt->get_result();
            while (($tmp = $rs->fetch_object())) {
                $productos[] = array('idpro' => $tmp->idProducto, 'producto'=>$tmp->nombreProd);
            }
            $rs->close();
        } catch (Exception $ex) {
            throw $ex->getMessage();
        }
        return $productos;
    }

    public function consultarProducto($id)
    {
        $producto;
        try {
            $sql = "Select pro.idProducto, pro.nombreProd, pro.stock, pro.precio
                    from comtbproducto as pro
                    where pro.idProducto = ?" ;
            $stmt = $this->getConexion()->prepare($sql); //Prepara una sentencia para su ejecución y devuelve un objeto sentencia
            $stmt->bind_param('i', $id); //Agrega variables a una sentencia preparada como parámetros
            $stmt->execute();
            $rs = $stmt->get_result();
            if ($tmp = $rs->fetch_object()) {
                $producto = array('idpro' => $tmp->idProducto, 'producto'=>$tmp->nombreProd, 'stock'=>$tmp->stock, 'vuni'=>$tmp->precio);
            }
            $rs->close();
        } catch (Exception $ex) {
            throw $ex->getMessage();
        }
        return $producto;
    }



    public function consultarDetalle($id)
    {
        $productos = array();
        try {
            $sql = "select pro.idProducto, pro.nombreProd, FACDetCantidad, FACDetPrecio from facdetfac as det, comtbproducto as pro
                    where FACCabId = ? and det.IdProducto = pro.idProducto and FACDetEstado = 1" ;
            $stmt = $this->getConexion()->prepare($sql);
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $rs = $stmt->get_result();
            while (($tmp = $rs->fetch_object())) {
                $productos[] = array('idpro' => $tmp->idProducto, 'producto'=>$tmp->nombreProd, 'cant' => $tmp->FACDetCantidad, 'pu' => $tmp->FACDetPrecio);
            }
            $rs->close();
        } catch (Exception $ex) {
            throw $ex->getMessage();
        }
        return $productos;
    }
}#Fin de la clase modelo Factura
