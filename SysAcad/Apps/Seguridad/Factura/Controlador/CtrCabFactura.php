<?php



class CtrCabFactura
{
    private $modelo;
    private $dao;

    public function __construct()
    {
        require_once("../Dao/DaoCabFactura.php");
        require_once("../Modelo/EntCabFactura.php");
        $this->dao = new DaoCabFacturaModel();
        $this->modelo = new CabFactura();
    }


    public function getFacturas()
    {
        $this->dao = new DaoCabFacturaModel();
        return $this->dao->consultarTodasCabFactura();
    }


    public function getFactura($factura)
    {
        $this->dao = new DaoCabFacturaModel();
        return $this->dao->consultarCabFactura($factura);
    }

    public function getConsulta($bus, $pos)
    {
        $this->dao = new DaoCabFacturaModel();
        return $this->dao->consultar($bus, $pos);
    }

    public function getProductos()
    {
        $this->dao = new DaoCabFacturaModel();
        return $this->dao->consultarProductos();
    }

    public function getProducto($id)
    {
        $this->dao = new DaoCabFacturaModel();
        return $this->dao->consultarProducto($id);
    }

    public function nuevo()
    {
        //$nuevoUsuario = new Usuario($_REQUEST['id'], $_REQUEST['nombre'], $_REQUEST['apellido'], $_REQUEST['usuario'], $_REQUEST['clave']);
        $this->modelo = new CabFactura();
        $this->modelo->__set('FACCabId', '');
        $this->modelo->__set('FACabFec', $_REQUEST['fecha']);
        $this->modelo->__set('FACCabDes', $_REQUEST['descIni']);
        $this->modelo->__set('FACCabSubtotal', $_REQUEST['subtotal']);
        $this->modelo->__set('FACCabIva', $_REQUEST['ivaIni']);
        $this->modelo->__set('FACCabTotal', $_REQUEST['total']);
        $this->modelo->__set('FACCabTipCli', $_REQUEST['cboTipCli']);
        $this->modelo->__set('FACCabCliId', $_REQUEST['cboCliente']);
        $this->modelo->__set('FACCabUsuCrea', $_REQUEST['usuCrea']);
        $this->modelo->__set('FACCabFecCrea', $_REQUEST['fecCrea']);
        $this->modelo->__set('FACCabUsuMod', '');
        $this->modelo->__set('FACCabFecMod', '');
        $this->modelo->__set('FACCabEst', '1');

        $this->dao = new DaoCabFacturaModel();
        $this->dao->crearCabFactura($this->modelo);
      header("Location:../Vista/ListarFacturas.php");
    }

    public function eliminar($IdFactura, $est)
    {
        $this->dao = new DaoCabFacturaModel();
        $this->dao->eliminarCabFactura($IdFactura, $est);
      //  header("Location:../Vista/ListarFacturas.php");
    }

    public function getDetalle($id)
    {
        $this->dao = new DaoCabFacturaModel();
        return $this->dao->consultarDetalle($id);
    }
}
