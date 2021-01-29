<?php
require_once('../Dao/ItemsDAO.php');
class CarritoCTR extends ItemsDAO {

    public $cart = array();

    public function __construct() {
        parent::__construct();
        if (isset($_SESSION['cart'])) {
            $this->cart = $_SESSION['cart'];
        }
        require_once("../Modelo/MCabCompra.php");
        $this->modelo = new MCabCompra();
    }

    public function add_item($code, $amount) {
        $search = $this->search_code($code);
        if ($search > 0) {
            $code = $this->code;
            $product = $this->product;
            $price = $this->price;
            $item = array(
                'code' => $code,
                'product' => $product,
                'price' => $price,
                'amount' => $amount
            );
            if (!empty($this->cart)) {
                foreach ($this->cart as $key) {
                    if ($key['code'] == $code) {
                        $item['amount'] = $key['amount'] + $item['amount'];
                    }
                }
            }
            $item['subtotal'] = $item['price'] * $item['amount'];
            $id = md5($code);
            $_SESSION['cart'][$id] = $item;
            $this->update_cart();
        }
    }

    public function remove_item($code) {
        $id = md5($code);
        unset($_SESSION['cart'][$id]);
        $this->update_cart();
        return true;
    }

    public function get_items() {
        $html = '';
        if (!empty($this->cart)) {
            foreach ($this->cart as $key) {
                $code = "'" . $key['code'] . "'";
                $html .= '<tr>
                            <td>' . $key['code'] . '</td>
                            <td>' . $key['product'] . '</td>
                            <td align="right">' . number_format($key['price'], 2) . '</td>
                            <td align="right">' . $key['amount'] . '</td>
                            <td align="right">' . number_format($key['subtotal'], 2) . '</td>
                            <td>
                              <button class="btn btn-danger" onClick="deleteProduct(' . $code . ');">
                                  <i class="glyphicon glyphicon-trash"></i>
                              </button></td>
			                    </tr>';
            }
        }
        return $html;
    }

    public function get_total_items() {
        $total = 0;
        if (!empty($this->cart)) {
            foreach ($this->cart as $key) {
                $total += $key['amount'];
            }
        }
        return $total;
    }

    public function get_total_payment() {
        $total = 0;
        if (!empty($this->cart)) {
            foreach ($this->cart as $key) {
                $total += $key['subtotal'];
            }
        }
        return number_format($total, 2);
    }

    public function cancelarCompra(){
      unset($_SESSION['cart']);
      $this->update_cart();
      //unset($cart);
      //$this->limpiarCarrito();
      header("Location:../Vista/ListarCompra.php");
    }

    public function nuevaCompra(){
      //$this->modelo = new MCabCompra();
      $rs = $_REQUEST;
      $prov = isset($rs['idProveedor'])? $rs['idProveedor']:'';
      if (!empty($this->cart) && !empty($prov)) {
        $this->modelo->__set('idProveedor', $_REQUEST['idProveedor']);
        //$this->modelo->__set('empleado', 'Mario');
        $orden = 'CP00'.$this->generaOrden();
        $this->modelo->__set('numOrden', $orden);
        $actual = date("Y-m-d");
        $this->modelo->__set('fecha', $actual);
        $subtotal = 0.0;
        $subtotal = $this->get_total_payment();
        $this->modelo->__set('subtotal', number_format($subtotal,2));
        $iva = $subtotal * 0.12;
        $this->modelo->__set('iva', number_format($iva,2));
        $total = $subtotal + $iva;
        $this->modelo->__set('total', number_format($total,2));
        $this->comprar($this->modelo);
        $this->crear($this->cart);
        $this->actualizarStock();
        unset($_SESSION['cart']);
        $this->update_cart();
        echo "<script language='javascript'>
        alert('Compra realizada exitosamente');
        window.location.href='../Vista/ListarCompra.php';
        </script>";
        //header("Location:../Vista/ListarCompra.php");
      }else {
        echo "<script language='javascript'>
        alert('El Carrito debe estar lleno y debe seleccionar un Proveedor');
        window.location.href='../Vista/ListarCompra.php';
        </script>";
      }
        //header("Location:../Vista/ListarCompra.php");
    }

    public function mostarProveedor()
    {
      return $this->cargarProveedor();
    }

    public function update_cart() {
        self::__construct();
    }

}

?>
