<?php
  if(!isset($_SESSION['n_usuario'])){
    $link='location:'.$ruta.'apps/main/vista/login.php';
      header($link);
  }
  ?>
<div id="wrapper">
    <!-- Brand and toggle get grouped for better mobile display -->


    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="navbar-header">
                <div class="left_col">
                    <div class="col-lg-12">
                        <div class="col-lg-3" >
                          <a href=" <?php echo $ruta;?>Apps/Main/vista/menu.php">
                            <img  class="img-rounded logomain" width="190px" height="50px" src="<?php echo $ruta ?>/img/logo2.png" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <a class="navbar-brand" href= " <?php echo $ruta;?>Apps/Main/index.php"> Sistema Clinico </a> -->
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-messages">
                    <li>
                        <a href="#">
                            <div>
                                <strong>John Smith</strong>
                                <span class="pull-right text-muted">
                                    <em>Yesterday</em>
                                </span>
                            </div>
                            <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <strong>John Smith</strong>
                                <span class="pull-right text-muted">
                                    <em>Yesterday</em>
                                </span>
                            </div>
                            <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <strong>John Smith</strong>
                                <span class="pull-right text-muted">
                                    <em>Yesterday</em>
                                </span>
                            </div>
                            <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a class="text-center" href="#">
                            <strong>Read All Messages</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
                <!-- /.dropdown-messages -->
            </li>
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-tasks">
                    <li>
                        <a href="#">
                            <div>
                                <p>
                                    <strong>Task 1</strong>
                                    <span class="pull-right text-muted">40% Complete</span>
                                </p>
                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                        <span class="sr-only">40% Complete (success)</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <p>
                                    <strong>Task 2</strong>
                                    <span class="pull-right text-muted">20% Complete</span>
                                </p>
                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                        <span class="sr-only">20% Complete</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <p>
                                    <strong>Task 3</strong>
                                    <span class="pull-right text-muted">60% Complete</span>
                                </p>
                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                        <span class="sr-only">60% Complete (warning)</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <p>
                                    <strong>Task 4</strong>
                                    <span class="pull-right text-muted">80% Complete</span>
                                </p>
                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                        <span class="sr-only">80% Complete (danger)</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a class="text-center" href="#">
                            <strong>See All Tasks</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
                <!-- /.dropdown-tasks -->
            </li>
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-alerts">
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-comment fa-fw"></i> New Comment
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                <span class="pull-right text-muted small">12 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-envelope fa-fw"></i> Message Sent
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-tasks fa-fw"></i> New Task
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a class="text-center" href="#">
                            <strong>See All Alerts</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
                <!-- /.dropdown-alerts -->
            </li>
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">

                  <li><img style="height:150px"class="img img-circle"src="<?php echo "a/a/".$rutaFoto.$_SESSION['foto']; ?>" >
                  </li>
                  <li><a href="<?php echo $ruraPerfil ?>usuario/vista/ManUsuario.php?opc=editar&obc=si&per=si&usua=<?php echo $_SESSION['n_usuario'] ?>"><i class="fa fa-gear fa-fw"></i><?php echo $_SESSION['n_usuario']; ?></a>
                  </li>

                    <li><a href="<?php echo $ruraPerfil ?>usuario/vista/ManUsuario.php?opc=ver&obc=si&per=si&usua=<?php echo $_SESSION['n_usuario'] ?>"><i class="fa fa-user fa-fw"></i> Ver Perfil</a>
                    <!-- </li>
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                    </li> -->
                    <li class="divider"></li>
                    <!-- ../Seguridad/Controlador/CtrUsuario.php?opc=logout -->
                    <li><a href="<?php echo $rut ?>Seguridad/cerrarSesion.php?opc=logout"><i class="fa fa-sign-out fa-fw"></i> Cerrar Sesion</a>
                      <!-- ../../../Seguridad/cerrarSesion.php -->

                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                        </div>
                        <!-- /input-group -->
                    </li>
                    <li>
                        <a href=" <?php echo $ruta;?>Apps/Main/vista/menu.php"><i class="fa fa-dashboard fa-fw"></i> Inicio</a>
                    </li>
                    <?php if($_SESSION['id_rol']=='1'): ?>
                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Seguridad<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo $ruta;?>Apps/seguridad/usuario/vista/ListarUsuarios.php">Usuario</a>
                            </li>
                            <li>
                                <a href="<?php echo $ruta;?>Apps/seguridad/usuario/vista/ListarUsuarios.php">Roles</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                  <?php endif ?>
                    <li>
                        <!-- <a href="#"><i class="fa fa-table fa-fw"></i> Farmacia</a> -->
                        <a href="#"><i class="fa fa-edit fa-fw"></i> Farmacia<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                          <li>
                            <!-- ?usua='$_SESSION[n_usuario]'&rol='$_SESSION[id_rol]'&imagen='$_SESSION[foto]' -->
                              <a href="<?php echo $ruta;?>Apps/seguridad/farmacia/vista/ListarProveedor.php"><i class="fa fa-ambulance fa-fw"></i> Proveedores</a>
                          </li>
                            <li>
                              <!-- ?usua='$_SESSION[n_usuario]'&rol='$_SESSION[id_rol]'&imagen='$_SESSION[foto]' -->
                                <a href="<?php echo $ruta;?>Apps/seguridad/Farmacia/Vista/ListarProducto.php"><i class="fa fa-stethoscope fa-fw"></i> Productos</a>
                            </li>
                            <li>
                                <a href="<?php echo $ruta;?>Apps/seguridad/Farmacia/Vista/ListarCompra.php"><i class="fa fa-shopping-cart fa-fw"></i> Compras</a>
                            </li>
                            <li>
                                <a href="<?php echo $ruta;?>Apps/seguridad/Farmacia/Vista/ListarDevolucion.php"><i class="fa fa-history fa-fw"></i> Devoluciones</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-file-o fa-fw"></i> Facturacion<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                  <li>
                                      <a href="<?php echo $ruta;?>Apps/seguridad/Factura/Vista/ListarFacturas.php">Factura</a>
                                  </li>
                                  <li>
                                      <a href="<?php echo $ruta;?>Apps/seguridad/Factura/Vista/ListarCliente.php"><i class="fa fa-users fa-fw"></i> Cliente</a>
                                  </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-edit fa-fw"></i> Compras</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-edit fa-fw"></i> Odontologia</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-edit fa-fw"></i> Facturacion<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                              <!-- ?usua='$_SESSION[n_usuario]'&rol='$_SESSION[id_rol]'&imagen='$_SESSION[foto]' -->
                                <a href="<?php echo $ruta;?>Apps/seguridad/Factura/Vista/ListarFacturas.php">Factura</a>
                            </li>
                            <li>
                                <a href="<?php echo $ruta;?>Apps/seguridad/Factura/Vista/ListarCliente.php">Cliente</a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>
</div>
