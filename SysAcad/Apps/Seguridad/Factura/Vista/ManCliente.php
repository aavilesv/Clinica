<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registro de Cliente</title>

        <?php session_start();
         $ruta = "../../../../";
         require_once("../../../../Apps/Main/head.php");
         require_once('../Controlador/CtrCliente.php');
        ?>

    </head>
    <body>
        <?php
          require_once("../../../../Apps/Main/header.php");
          if (isset($_GET['opc'])) {
              switch ($_GET['opc']) {
               case 'nuevo':
                     # Para nuevo registro
                     $FACCliId='';
                     $FACCliNombre="";
                     $FACCliApellido="";
                     $FACCliCedula='';
                     $FACCliDireccion='';
                     $FACCliCelular='';
                     $FACCliEmail='';
                     $FACCliUsuarioCrea = $_SESSION['n_usuario'];
                     $FACCliUsuaModif="";
                     $FACCliEstado='';
                     $FACCliFechaCrea='';
                     $FACCliFechaFechaUltima='';
                     $hidden='';
                     $disabled = '';
               break;
               case 'editar':
                     # Para Editar datos
                     $Cliente = new CtrCliente();
                     $registros = $Cliente->getCliente($_GET['usua']);
                     $FACCliId=$registros->__get('FACCliId');
                     $FACCliNombre=$registros->__get('FACCliNombre');
                     $FACCliApellido=$registros->__get('FACCliApellido');
                     $FACCliCedula=$registros->__get('FACCliCedula');
                     $FACCliDireccion=$registros->__get('FACCliDireccion');
                     $FACCliCelular=$registros->__get('FACCliCelular');
                     $FACCliEmail=$registros->__get('FACCliEmail');
                     $FACCliUsuarioCrea = $registros->__get('FACCliUsuarioCrea');
                     $FACCliUsuaModif= $_SESSION['n_usuario'];
                     $FACCliEstado=$registros->__get('FACCliEstado');
                     $FACCliFechaCrea=$registros->__get('FACCliFechaCrea');
                     $FACCliFechaFechaUltima=$registros->__get('FACCliFechaFechaUltima');
                     $hidden='hidden';
                     $disabled = '';
               break;
               case 'ver':
                     # Para Visualizar los datos
                     $Cliente = new CtrCliente();


                     $registros = $Cliente->getCliente($_GET['usua']);
                     $FACCliId=$registros->__get('FACCliId');
                     $FACCliNombre=$registros->__get('FACCliNombre');
                     $FACCliApellido=$registros->__get('FACCliApellido');
                     $FACCliCedula=$registros->__get('FACCliCedula');
                     $FACCliDireccion=$registros->__get('FACCliDireccion');
                     $FACCliCelular=$registros->__get('FACCliCelular');
                     $FACCliEmail=$registros->__get('FACCliEmail');
                     $FACCliUsuarioCrea = $registros->__get('FACCliUsuarioCrea');
                     $FACCliUsuaModif=$registros->__get('FACCliUsuaModif');
                     $FACCliEstado=$registros->__get('FACCliEstado');
                     $FACCliFechaCrea=$registros->__get('FACCliFechaCrea');
                     $FACCliFechaFechaUltima=$registros->__get('FACCliFechaFechaUltima');

                     $hidden='';
                     $disabled = 'disabled';
               break;
             }
          }
        ?>


            <?php require_once("../../../../Apps/Main/header.php"); ?>
            <div id="page-wrapper">
                <div class="container-fluid">
                      <div class="row">
                        <div class="col-lg-12">

                          <br> <br>
                
                          <div class="row-fluid">
                              <div class="col-lg-12">
                                  <h1 class="page-header">Registro  de Cliente</h1>
                              </div><!-- /.col-lg-12 -->
                          </div><!-- /.row -->

                          <div class="container-fluid">
                               <div class="col-xs-12 col-md-2"></div>
                               <div class="col-xs-12 col-md-7">
                                 <br>
                                 <div class="panel panel-default">
                                   <div class="panel-heading">
                                         Registro de Cliente
                                   </div>

                                   <div class="panel-body">
                                     <div class="row">
                                         <div class="col-lg-10">
                                               <form class="form-horizontal" name="frmUsuario"  method="post" action="InterfazCliente.php" onsubmit="return todo()">
                                                 <div class="form-group">
                                                     <div class="col-md-9">
                                                         <input type="hidden" class="form-control " name="FACCliFechaCrea" maxlength="45"
                                                                id="FACCliFechaCre" required="true" value='<?= $FACCliFechaCrea; ?>'>
                                                     </div>
                                                 </div>
                                                 <div class="form-group">
                                                     <div class="col-md-9">
                                                         <input type="hidden" class="form-control " name="FACCliId" maxlength="45"
                                                                id="FACCliId" required="true" value='<?= $FACCliId; ?>'>
                                                     </div>
                                                 </div>

                                                 <div class="form-group">
                                                     <div class="col-md-9">
                                                         <input type="hidden" class="form-control " name="FACCliFechaFechaUltima" maxlength="45"
                                                                id="FACCliFechaFechaUltim" required="true" value='<?= $FACCliFechaFechaUltima; ?>'>
                                                     </div>
                                                 </div>
                                                 <div class="form-group">
                                                      <label class="control-label col-md-3">Nombre:</label>
                                                     <div class="col-md-9">
                                                         <input type="text" class="form-control " name="FACCliNombre" maxlength="20" onKeyPress="return sololetras(event)"
                                                                id="Nombre" value ='<?= $FACCliNombre; ?>' required="true" <?php echo $disabled ?>>
                                                     </div>
                                                 </div>

                                                 <div class="form-group">
                                                     <label class="control-label col-md-3">Apellido:</label>
                                                     <div class="col-md-9">
                                                         <input type="text" class="form-control " name="FACCliApellido" maxlength="50"  onKeyPress="return sololetras(event)"
                                                         id="Apellido" value ='<?= $FACCliApellido; ?>'  <?php echo $disabled ?>>
                                                     </div>
                                                 </div>
                                                      <div class="form-group">
                                                        <label class="control-label col-md-3">Cedula:</label>
                                                          <div class="col-md-9">
                                                              <input type="text" class="form-control " name="FACCliCedula" maxlength="10" onKeyPress="return soloNumeros(event)"
                                                                       id="Cedula" value ='<?= $FACCliCedula; ?>' <?php echo $disabled ?>>
                                                          </div>
                                                      </div>



                                                      <div class="form-group">
                                                          <label class="control-label col-md-3">Dirección:</label>
                                                          <div class="col-md-9">
                                                              <input type="text" class="form-control " name="FACCliDireccion" maxlength="20"
                                                                     id="Direccion" value ='<?= $FACCliDireccion; ?>' required="true" <?php echo $disabled ?>>
                                                          </div>
                                                      </div>
                                                      <div class="form-group">
                                                          <label class="control-label col-md-3">Celular:</label>
                                                          <div class="col-md-9">
                                                              <input type="text" class="form-control " name="FACCliCelular" maxlength="10" onKeyPress="return soloNumeros(event)"
                                                                     id="Celular" value ='<?= $FACCliCelular; ?>' required="true" <?php echo $disabled ?>>
                                                          </div>
                                                      </div>

                                                      <div class="form-group">
                                                          <label class="control-label col-md-3">Email:</label>
                                                          <div class="col-md-9">
                                                              <input type="text" class="form-control " name="FACCliEmail" maxlength="20"
                                                                     id="Email" value ='<?= $FACCliEmail; ?>' required="true" <?php echo $disabled ?>>
                                                          </div>
                                                      </div>
                                                      <div class="form-group">
                                                          <div class="col-md-9">
                                                              <input type="hidden" class="form-control " name="FACCliUsuarioCrea" maxlength="45"
                                                                     id="FACCliUsuarioCre" required="true" value='<?= $FACCliUsuarioCrea; ?>'>
                                                                     <input type="hidden" class="form-control " name="FACCliUsuaModif" maxlength="45"
                                                                            id="FACCliUsuaModi" required="true" value='<?= $FACCliUsuaModif; ?>'>

                                                                                <input type="hidden" class="form-control " name="FACCliEstado" maxlength="45"
                                                                                       id="FACCliEstad" required="true" value='<?= $FACCliEstado; ?>'>
                                                          </div>
                                                      </div>


                                                      <?php if (isset($_GET['opc']) && ($_GET['opc'] =='nuevo' || $_GET['opc'] =='editar')) {
            ?>
                                                      <div class="btn btn-group col-md-offset-3 ">
                                                          <div class="col-md-2">

                                                 <button type="submit" id="btnsend" class=" btn btn-primary "><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
                                                          </div>

                                                          <div class="col-md-2 col-md-offset-3">
                                                              <a href="ListarCliente.php" id="btnSalir" class="btn btn-danger"> <i class="glyphicon glyphicon-remove"></i> Cancelar</a>
                                                           </div>
                                                      </div>
                                                      <?php
        } else {
            ?>
                                                          <div class="col-md-2 col-md-offset-3 ">
                                                              <a href="ListarCliente.php" id="btnSalir" class="btn btn-primary" <i class="glyphicon glyphicon-remove"></i> Regresar</a>
                                                          </div>
                                                      <?php
        } ?>
                                                      <input type="hidden"  name="opc" id="opc" value='<?=$_GET['opc'];?>' /><br>

                                        </div>
                                     </div>
                                       </form>
                                    </div>
                                    <div class="panel-footer">
                                        <div class="row"> <!-- Paginación de Registros-->
                                          <br>
                                        </div>
                                    </div>
                            </div>
                                  </div>
                          </div>
                        </div>
                      </div>
                </div>
            </div>





    </body>
</html>
<script  type="text/javascript">
$(document).on('click', '#btnsend', function(event) {
  if (valCedula()==false){
    event.preventDefault();
  }else {
    this.submit();
  }
});
/*
function validaCmbTipCli() {
  var indice = document.getElementById('cboTipCli').selectedIndex;
  if (indice == null || indice == 0) {
    //alertify.error("Debe seleccionar Tipo de cliente");
    alertify.alert("Debe seleccionar Tipo de cliente", function(){
      alertify.message('OK');
    });

    return false;
  }
}*/

function valida() {
  var nombre = document.getElementById('Celular').value;
  if (nombre == null || nombre.length < 9|| nombre.length > 11 || /^\s+$/.test(nombre)) {
    // document.getElementById('apellido_help').style.color = "red";
    // document.getElementById('apellido').focus();
    alert("Debe ingresar su celular, el campo es requerido!");
    return false;
  }
}

function sololetras(e) {
    tecla = (document.all) ? e.keyCode : e.which; // 2
    if (tecla == 8)
        return true; // 3
    patron = /[A-Za-z\s]/; // 4
    te = String.fromCharCode(tecla); // 5
    return patron.test(te); // 6
}
function soloNumeros(e) {
    var key = window.Event ? e.which : e.keyCode
    return (key >= 48 && key <= 57)
}
function todo()
{
  if (valCedula()==false||valida()==false) {

       return false;
  }else {

       return true;
  }


}
function valCedula() {
  var cedula = document.getElementById("Cedula").value;
    if(cedula.length == 10){
         //Obtenemos el digito de la region que sonlos dos primeros digitos
         var digito_region = cedula.substring(0,2);
         //Pregunto si la region existe ecuador se divide en 24 regiones
         if( digito_region >= 1 && digito_region <=24 ){
           var dig;
           var suma_total=0;
           for (var i=0;i<9;i++){
             dig = parseInt(cedula.substring(i,i+1));
             if (i%2==0){
               dig = dig*2 ;
               if ( dig > 9)
                  dig = dig - 9;
             }
             suma_total = suma_total + dig;
           }
           // Extraigo el ultimo digito
           var ultimo_digito   = parseInt(cedula.substring(9,10));
           //Obtenemos la decena inmediata
           var z = 0;
           while (suma_total % 10 != 0) {
                     suma_total++;
                     z++;
           }
           //Validamos que el digito validador sea igual al de la cedula
           if(z == ultimo_digito){
            // alert('la cedula:' + cedula + ' es correcta');
             return true;
           }else{
             alert('la cedula:' + cedula + ' es incorrecta');
                return false;
           }
         }else{
           // imprimimos en consola si la region no pertenece
           alert('Esta cedula no pertenece a ninguna region');
              return false;
         }
       }
       alert("Debe ingresar su cedula, el campo es requerido!"+cedula);
                 return false;

}

</script>
