<?php

class CtrRol
{
  private $modelo;
  private $dao;

  public function __construct()
  {
    //require_once("../Dao/DaoRol.php");

    $this->dao = new DaoUsuarioModel();

  }

  public function getRoles()
  {
    $this->dao = new DaoUsuarioModel();
    return $this->dao->consultarRoles();
  }


}
?>

<div class="panel-body">
  <div class="row"><!-- Cuerpo de Tabla-->
    <div class="col-sx-12 col-md-12 table-responsive">

        <table class="table table-bordered table-hover table-condensed table-fixed" style="width:50%">
              <thead>
                  <tr >
                    <th>Codigo</th>
                      <th>Usuario</th>
                   </tr>
              </thead>
              <tbody>
                 <?php
                      //equire_once('../Controlador/CtrRol.php');
                      $ctrRol = new CtrRol();
                      $registros = $ctrRol->getRoles();
                      foreach ($registros as $registro) {
                          ?>
                 <tr>
                   <td><?php echo $registro->__get('idRol'); ?></td>
                      <td><?php echo $registro->__get('rolDescripcion'); ?></td>

                      <!-- <td >
                           <a href='ManUsuario.php?usua=<?php echo $registro->__get('idRol'); ?>&opc=editar'
                            class="btn btn-primary btn-sm glyphicon glyphicon glyphicon-pencil"></a>

                            <a href='InterfazUsuario.php?id=<?php echo $registro->__get('idRol'); ?>&opc=eliminar'
                            class="btn btn-danger btn-sm glyphicon glyphicon glyphicon-trash"></a>

                            <a class="delete-button btn btn-warning btn-sm glyphicon glyphicon-remove-circle"  value="<?php echo $registro->__get('idRol'); ?>" id=<?php echo $registro->__get('rolDescripcion'); ?>></a>

                            <a href='ManUsuario.php?usua=<?php echo $registro->__get('rolDescripcion'); ?>&opc=ver'
                            class="btn btn-info btn-sm glyphicon glyphicon-eye-open"  value="<?php $registro->__get('usrolDescripcionuLogin'); ?>"></a>
                      </td> -->
                 </tr>
                 <?php
                      } ?>
                </tbody>
            </table>
    </div>
  </div>
</div>
