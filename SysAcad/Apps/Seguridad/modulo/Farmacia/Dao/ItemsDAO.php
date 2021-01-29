<?php

include_once('../../../Conexion/DBAAbstractModel1.php');
require_once('../Modelo/MCabCompra.php');
session_start();
class ItemsDAO extends DBAAbstractModel {

    public $code;
    public $product;
    public $description;
    public $price;

    public function __construct() {
        parent::__construct();
        $this->db_name = 'integrador1';
    }

    public function get_products() {
        $sentencia = "SELECT * FROM comtbproducto WHERE estado = 1";
        $sql = $this->getConexion()->prepare($sentencia);
        $sql->execute();
        $html = '';
        $rs = $sql->get_result();
        foreach ($rs->fetch_all(MYSQLI_ASSOC) as $key) {
            $code = "'" . $key['idProducto'] . "'";
            $html .= '<tr>
                    <td>' . $key['nombreProd'] . '</td>
                    <td>' . $key['stock'] . '</td>
                    <td>' . $key['f_venc'] . '</td>
                    <td align="right" class="col-sm-2"><i class="glyphicon glyphicon-usd"></i> ' . number_format($key['precio'],2) . '</td>
                    <td align="right">
                      <input class="col-sm-12" type="number" id="' . $key['idProducto'] . '" value="1" min="1">
                    </td>
                    <td>
                      <button class="btn btn-primary" onClick="addProduct(' . $code . ');">
                        <i class="glyphicon glyphicon-plus"></i>
                      </button>
                    </td>
                  </tr>';
        }

        return $html;
    }

    public function search_code($code) {
        $sentencia = "SELECT * FROM comtbproducto WHERE idProducto = '$code'";
        $sql = $this->getConexion()->prepare($sentencia);
        $sql->execute();
        $rs = $sql->get_result();
        $product = $rs->fetch_all(MYSQLI_ASSOC);
        $status = 0;
        foreach ($product as $key) {
            $this->code = $key['idProducto'];
            $this->product = $key['nombreProd'];
            $this->description = $key['f_venc'];
            $this->price = $key['precio'];
            $status++;
        }
        return $status;
    }

    public function cargarProveedor()
    {
      $sql = "SELECT * FROM comtbproveedor WHERE estado = 1";
      $stmt = $this->getConexion()->prepare($sql);
      $stmt->execute();
      $rs = $stmt->get_result();
      foreach ($rs as $row) {
        echo "<option value=".$row['idProveedor'].">".$row['razonSocial']."</option>";
      }
    }

    public function comprar(\MCabCompra $cabecera) {
            try {
            //$this->consultar($usuario->usuario);     //Verifica si el registro existe en la base de datos
            $sql = "INSERT INTO comtbcab_compra VALUES(NULL, ?, ?, ?, ?, ?, ?, ?);";
            $stmt = $this->getConexion()->prepare($sql);
            //En el caso de ocurrir un error tipo Notice una de las atenrnativas es crear variables intermedias para el paso de valor
            $prov = $cabecera->__get('idProveedor');
            $emp =  $_SESSION['n_usuario']; //$cabecera->__get('empleado')
            $orden = $cabecera->__get('numOrden');
            $fecha = $cabecera->__get('fecha');
            $sub = $cabecera->__get('subtotal');
            $iva = $cabecera ->__get('iva');
            $total = $cabecera->__get('total');
            $stmt->bind_param('sssssss',$prov, $emp, $orden, $fecha, $sub, $iva, $total);
            $stmt->execute();
            if ($stmt->affected_rows) {
              return true;
            }
        } catch (Exception $ex) {
            throw $ex->getMessage();
        }
        return false;
    }

    public function crear($carrito = array()) {
            try {
              foreach ($carrito as $key) {
                $sql = "INSERT INTO comtbdet_compra Values ((SELECT MAX(idCompra) FROM comtbcab_compra), ?, ?, ?);";
                $stmt = $this->getConexion()->prepare($sql);
                //En el caso de ocurrir un error tipo Notice una de las atenrnativas es crear variables intermedias para el paso de valor
                $idProd = $key['code'];
                $cantidad = $key['amount'];
                $precio = number_format($key['price'],2);
                $stmt->bind_param('ssd', $idProd, $cantidad, $precio);
                $stmt->execute();
              }
              if ($stmt->affected_rows) {
                return true;
              }
            } catch (Exception $ex) {
                throw $ex->getMessage();
            }
            return false;
    }

    public function actualizarStock(){
      try {
        $sql = "UPDATE `comtbproducto` SET `stock`= (SELECT IFNULL(SUM(cantidad),0) FROM comtbdet_compra
        WHERE comtbdet_compra.idProducto = comtbproducto.idProducto) - (SELECT IFNULL(SUM(cantidad),0)
        FROM comtbdet_devolucion WHERE comtbdet_devolucion.idProducto = comtbproducto.idProducto) -
        (SELECT IFNULL(SUM(FACDetCantidad),0)
        FROM facdetfac WHERE facdetfac.idProducto = comtbproducto.idProducto) WHERE 1";
        $stmt = $this->getConexion()->prepare($sql);
        $stmt->execute();
        if ($stmt->affected_rows) {
            return true;
        }
      } catch (\Exception $e) {
        throw $ex->getMessage();
      }
      return false;
    }

    public function generaOrden()
    {
      $ordenNumero = 0;
      try {
          $sql = "SELECT MAX(idCompra) AS Orden FROM comtbcab_compra";
          $stmt = $this->getConexion()->prepare($sql);
          $stmt->execute();
          $rs = $stmt->get_result();
          foreach ($rs->fetch_all(MYSQLI_ASSOC) as $key) {
            $ordenNumero =  $key['Orden'] + 1;
          }
          $rs->close();
      } catch (Exception $ex) {
          throw $ex->getMessage();
      }
      return $ordenNumero;
    }

}

?>
