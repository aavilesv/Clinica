<?php



class CtrEntFactura
{
    private $modelo;
    private $dao;

    public function __construct()
    {
        require_once("../Dao/DaoDetFactura.php");
        require_once("../Modelo/EntDetFactura.php");
        $this->dao = new DaoDetFacturaModel();
        $this->modelo = new EntDetFac();
    }

    public function getDetalles()
    {
        $this->dao = new DaoDetFacturaModel();
        return $this->dao->consultarTodasDetFac();
    }

    public function getDetalle($id)
    {
        $this->dao = new DaoDetFacturaModel();
        return $this->dao->consultarDetFac($id);
    }

    public function nuevo()
    {
        //$nuevoUsuario = new Usuario($_REQUEST['id'], $_REQUEST['nombre'], $_REQUEST['apellido'], $_REQUEST['usuario'], $_REQUEST['clave']);
        $producto = $_REQUEST['productos'];
        $producto = substr($producto, 0, strlen($producto) - 1);
        $vector = explode('-', $producto);
        $cant = $_REQUEST['cantidad'];
        $cant = substr($cant, 0, strlen($cant) - 1);
        $vector2 = explode('-', $cant);
        $precio = $_REQUEST['precioUnit'];
        $precio = substr($precio, 0, strlen($precio) - 1);
        $vector3 = explode('-', $precio);
        $this->dao = new DaoDetFacturaModel();
        $codfac = $this->dao->codigoFactura();
        for ($i=0; $i < count($vector); $i++) {
          $this->modelo = new EntDetFac();
          $this->modelo->__set('FACDetId', '');
          $this->modelo->__set('FACCabId', $codfac);
          $this->modelo->__set('IdProducto', $vector[$i]);
          $this->modelo->__set('FACDetCantidad', $vector2[$i]);
          $this->modelo->__set('FACDetPrecio', $vector3[$i]);
          $this->modelo->__set('FACDetEstado', '1');
          $this->dao->crearDetFac($this->modelo);
          $this->dao->ActualizarStock($vector[$i],$vector2[$i]);
        }
      // header("Location:../Vista/ListarFacturas.php");
    }

    public function editar()
    {
        //$nuevoUsuario = new Usuario($_REQUEST['id'], $_REQUEST['nombre'], $_REQUEST['apellido'], $_REQUEST['usuario'], $_REQUEST['clave']);
        $this->modelo = new EntDetFac();
        $this->modelo->__set('FACDetIdDetFac', $_REQUEST['']);
        $this->modelo->__set('FACDetCantidad', $_REQUEST['']);
        $this->modelo->__set('FACDetPrecio', $_REQUEST['']);
        $this->modelo->__set('FACDetValorUni', $_REQUEST['']);
        $this->modelo->__set('FACDetValorTot', $_REQUEST['']);
        $this->modelo->__set('FACDetEstado', $_REQUEST['']);

        $this->dao = new DaoDetFacturaModel();
        $this->dao->editarDetFac($this->modelo);
        header("Location:../Vista/ListarFacturas.php");
    }

    public function eliminar($IdFactura, $est)
    {
        $this->dao = new DaoDetFacturaModel();
        $this->dao->eliminarDetFac($IdFactura, $est);
        header("Location:../Vista/ListarFacturas.php");
    }

    public function Maximo()
    {
      $this->dao = new DaoDetFacturaModel();
      return $this->dao->codigoFactura();
    }
}
