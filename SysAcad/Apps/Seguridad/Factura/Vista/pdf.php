<?php
  require_once('FPDF/fpdf.php');
  require_once('../Controlador/CtrCabFactura.php');
  require_once('../Controlador/CtrCliente.php');
  require_once('../Controlador/CtrDetFactura.php');
  class PDF extends FPDF
 {


 // Pie de página
 function Footer()
 {
     // Posición: a 1,5 cm del final
     $this->SetY(-15);
     // Arial italic 8
     $this->SetFont('Arial','I',8);
     // Número de página
     $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
 }
 }
 $cod = $_GET['id'];
 $ctrFactura = new CtrCabFactura();
 $tmp = $ctrFactura->getFactura($cod);

 // Creación del objeto de la clase heredada
 $pdf = new PDF("P","mm","Letter");
 $pdf->AliasNbPages();
 $pdf->AddPage();
 $pdf->SetFont('Arial','',22);
 $a=$pdf->Image('../../../img/logo-unemi.png',10,5,-200);
  $pdf->Cell(30);
 $pdf->SetFont('Arial','B',15);
 $pdf->Cell(80,10,"R.I.F:5842621452",0,0,"C");

 $pdf->Cell(80,10,"FECHA:  ".$tmp->__get('FACabFec'),1,1,"L");
 $pdf->SetFont('Arial','i',12);
 $pdf->Cell(30,7,"",0,0,"C");
  $pdf->Cell(80,7,"Clinica Milagro",0,0,"C");

 $pdf->SetFont('Arial','B',13);
  $pdf->Cell(30,8,"FACTURA N:",1,0,"C");
  $pdf->SetTextColor(255,0,0);
  $pdf->SetFont('Helvetica','b',18);
  $ctrDetalle = new CtrEntFactura();
  $max = $cod;

                     if ($max<10) {
                     $codigo="000000000".$max;
                    }else  if ($max<100) {
                     $codigo="00000000".$max;
                    }else if ($max<1000) {
                     $codigo="0000000".$max;
                    }else if ($max<10000) {
                     $codigo="000000".$max;
                    }else if ($max<100000) {
                     $codigo="00000".$max;
                    }else  if ($max<1000000) {
                     $codigo="0000".$max;
                    }else if ($max<10000000) {
                     $codigo="000".$max;
                    }else if ($max<100000000) {
                     $codigo="00".$max;
                    }else  if ($max<1000000000) {
                     $codigo="0".$max;
                    }else  if ($max<10000000000) {
                     $codigo="0".$max;
                    }
   $pdf->Cell(50,8," SB-".$codigo,1,1,"C");
 $pdf->SetFont('Arial','i',12);
 $pdf->SetTextColor(0,0,0);

 $pdf->Cell(30,7,"",0,0,"C");
  $pdf->Cell(80,7,"Milagro-Ecuador",0,1,"C");
  $pdf->Cell(30,7,"",0,0,"C");
  $pdf->Cell(80,7,"",0,1,"C");

   $pdf->Cell(190,7,"	DATOS DEL CLIENTE",1,1,"C");

   $Cliente = new CtrCliente();
   if($tmp->__get('FACCabTipCli') == 'Cliente'){
     $ct = $Cliente->getCliente($tmp->__get('FACCabCliId'));
     $cli = array('name' => $ct->__get('FACCliNombre')." ".$ct->__get('FACCliApellido'), 'dire' => $ct->__get('FACCliDireccion'), 'ced' => $ct->__get('FACCliCedula'));
   }else {
     $cli = $Cliente->getPaciente($tmp->__get('FACCabCliId'));
   }

 $pdf->SetFont('Arial','B',13);
   $pdf->Cell(31,6,"CEDULA: ",1,0,"C");
   $pdf->SetFont('Helvetica','',12);
  $pdf->Cell(30,6,"".$cli['ced'],0,0,"L");

 $pdf->SetFont('Arial','B',13);
   $pdf->Cell(31,6,"CLIENTE:",1,0,"C");
   $pdf->SetFont('Helvetica','',12);
   $cliente=$cli['name'];
  $pdf->Cell(150,6,$cliente,0,1,"L");

  $pdf->SetFont('Arial','B',13);
    $pdf->Cell(31,8,"DOMICILIO:",1,0,"C");
    $pdf->SetFont('Helvetica','',12);
  $pdf->Cell(165,6,"".$cli['dire'],0,1,"L");
  $pdf->SetFont('Arial','B',13);

 $pdf->Cell(0,2,"",0,1,"C");

   $pdf->Cell(20,8,"CANT",1,0,"C");
     $pdf->Cell(100,8,"DESCRIPCION",1,0,"C");
       $pdf->Cell(35,8,"PRECIO X/U",1,0,"C");
         $pdf->Cell(35,8,"PRE-TOTAL",1,1,"C");
          $pdf->SetFont('Helvetica','',13);

$det = $ctrFactura->getDetalle($tmp->__get('FACCabId'));
$subto = 0;
foreach ($det as $pro) {
  $pdf->Cell(20,8,$pro['cant'],1,0,"C");
     $pdf->Cell(100,8,$pro['producto'],1,0,"C");
      $pdf->Cell(35,8,$pro['pu'],1,0,"C");
      $total = $pro['cant'] * $pro['pu'];
        $pdf->Cell(35,8,$total,1,1,"C");
        $subto = $subto + $total;
}


 for ($i=0; $i < 4; $i++) {

   $pdf->Cell(20,8,"",1,0,"C");
     $pdf->Cell(100,8,"",1,0,"C");
       $pdf->Cell(35,8,"",1,0,"C");
         $pdf->Cell(35,8,"",1,1,"C");
 }

$desc =round(($subto * 6)/100,2);
 $iva=round((($subto - $desc)*12)/100,2);

 $subtotal=$subto-$iva;

 $pdf->SetFont('Helvetica','i',10);
 $pdf->Cell(120,24,"Esta Factura No es Valida Sin El Sello y la Firma Autorizada",1,0,"C");
 $pdf->SetFont('Helvetica','B',13);
     $pdf->Cell(35,8,"SubTotal:",1,0,"C");
 $pdf->SetFont('Helvetica','',13);
       $pdf->Cell(35,8,round($subto,2),1,1,"C");

       $pdf->Cell(120,8,"",0,0,"C");
      $pdf->SetFont('Helvetica','B',13);

      $pdf->Cell(35,8,"Desc 6%:",1,0,"C");
      $pdf->SetFont('Helvetica','',13);
        $pdf->Cell(35,8,$desc,1,1,"C");

        $pdf->Cell(120,8,"",0,0,"C");
       $pdf->SetFont('Helvetica','B',13);

     $pdf->Cell(35,8,"Iva 12%:",1,0,"C");
 $pdf->SetFont('Helvetica','',13);

       $pdf->Cell(35,8,$iva,1,1,"C");

       $pdf->Cell(120,8,"",0,0,"C");
     $pdf->SetFont('Helvetica','B',13);
     $pdf->Cell(35,8,"Total:",1,0,"C");
 $pdf->SetFont('Helvetica','',13);

       $pdf->Cell(35,8,$tmp->__get('FACCabTotal'),1,1,"C");
       $pdf->Cell(190,15,"",0,1,"L");
        $pdf->SetFont('Helvetica','B',13);
        $pdf->Cell(190,8,"__________________",0,1,"C");
         $pdf->Cell(190,5," FIRMA AUTORIZADA",0,1,"C");


 $pdf->Output('Factura:'.$codigo.'.pdf','D');

  //header("location:ListarFacturas.php");
 ?>
