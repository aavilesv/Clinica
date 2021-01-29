<?php
/*
 * Entidad Factura
 */

class CabFactura
{
    private $FACCabId;
    private $FACabFec;
    private $FACCabDes;
    private $FACCabSubtotal;
    private $FACCabIva;
    private $FACCabTotal;
    private $FACCabTipCli;
    private $FACCabCliId;
    private $FACCabUsuCrea;
    private $FACCabFecCrea;
    private $FACCabUsuMod;
    private $FACCabFecMod;
    private $FACCabEst;

    public function __construct($FACCabId=0,$FACabFec='',$FACCabDes=0, $FACCabSubtotal=0,$FACCabIva=0,
      $FACCabTotal=0, $FACCabTipCli='',$FACCabCliId=0,$FACCabUsuCrea=0, $FACCabFecCrea='',$FACCabUsuMod=0,$FACCabFecMod='',
      $FACCabEst=0)
    {
        $this->FACCabId = $FACCabId;
        $this->FACabFec = $FACabFec;
        $this->FACCabDes  = $FACCabDes;
        $this->FACCabSubtotal    = $FACCabSubtotal;
        $this->FACCabIva   = $FACCabIva;
        $this->FACCabTotal    = $FACCabTotal;
        $this->FACCabTipCli = $FACCabTipCli;
        $this->FACCabCliId = $FACCabCliId;
        $this->FACCabUsuCrea = $FACCabUsuCrea;
        $this->FACCabFecCrea = $FACCabFecCrea;
        $this->FACCabUsuMod = $FACCabUsuMod;
        $this->FACCabFecMod = $FACCabFecMod;
        $this->FACCabEst    = $FACCabEst;
    }

    public function __get($key)
    {
        return $this->$key;
    }

    public function __set($key, $value)
    {
        return $this->$key = $value;
    }

    public function __tostring()
    {
        return json_encode($this);
    }
}#Fin de la clase modelo Factura
