<?php
require_once('../Dao/DevolucionDAO.php');
class DevolucionCTR extends DevolucionDAO {

    public $cart = array();

    public function __construct() {
        parent::__construct();
        if (isset($_SESSION['cart'])) {
            $this->cart = $_SESSION['cart'];
        }
        require_once("../Modelo/MCabDevolucion.php");
        $this->modelo = new MCabDevolucion();
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

    public function cancelarDevolucion(){
      unset($_SESSION['cart']);
      $this->update_cart();
      //unset($cart);
      //$this->limpiarCarrito();
      header("Location:../Vista/ListarDevolucion.php");
    }

    public function nuevaDevolucion(){
      if (!empty($this->cart)) {
        $this->modelo->__set('proveedor', $_REQUEST['idProveedor']);
        //$this->modelo->__set('empleado', 'Mario');
        $orden = 'DV00'.$this->generaOrden();
        $this->modelo->__set('numOrden', $orden);
        $actual = date("Y-m-d");
        $this->modelo->__set('fecha', $actual);
        //$this->modelo->__set('descripcion', 'Productos en mal estado');
        $this->devolver($this->modelo);
        $this->crear($this->cart);
        $this->actualizarStock();
        unset($_SESSION['cart']);
        $this->update_cart();
        echo "<script language='javascript'>
        alert('Devolucion realizada exitosamente');
        window.location.href='../Vista/ListarDevolucion.php';
        </script>";
        //header("Location:../Vista/ListarDevolucion.php");
      } else {
        echo "<script language='javascript'>
        alert('Debe seleccionar los productos a devolver');
        window.location.href='../Vista/ListarDevolucion.php';
        </script>";
      }

    }

    /*Public function actualizar(){
      $this->actualizarStock();
    }*/

    public function mostarProveedor()
    {
      return $this->cargarProveedor();
    }

    public function update_cart() {
        self::__construct();
    }

}

?>
