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
            <a style="font-size: 30px;"class="navbar-brand" href= " <?php echo $ruta; ?>Apps/Main/index.php"> Sistema Clinico </a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">  
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">                  
                    <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">

                    <li>
                        <a href=" <?php echo $ruta; ?>Apps/Main/index.php"><i class="fa fa-dashboard fa-fw"></i> Inicio</a>
                    </li>
                  
                    <li>
                        <a href="#"><i class="fa fa-user fa-fw"></i> Seguridad<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href=" <?php echo $ruta; ?>Apps/Seguridad/Vista/ListarUsuarios.php"><i class="fa fa-user fa-fw"></i> Usuarios</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-hospital-o fa-fw"></i> Clinica<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href=" <?php echo $ruta; ?>Apps/Enfermedades/Vista/ListarEnfermedades.php"><i class="fa fa-ambulance fa-fw"></i> Enfermedades</a>
                            </li>
                            <li>
                                <a href=" <?php echo $ruta; ?>Apps/Clinica/Vista/ListarClinica.php"><i class="fa fa-hospital-o fa-fw"></i> Clinica</a>
                            </li>
                            <li>
                                <a href=" <?php echo $ruta; ?>Apps/FichaMedica/Vista/ListarFicha.php"><i class="fa fa-book fa-fw"></i> Ficha Medica</a>
                            </li>
                             <li>
                                <a href=" <?php echo $ruta; ?>Apps/Servicio/Vista/ListarServicio.php"><i class="fa fa-medkit fa-fw"></i>Servicios</a>
                            </li>
                            <li>
                                <a href=" <?php echo $ruta; ?>Apps/Paciente/Vista/ListarPaciente.php"><i class="fa fa-users fa-fw"></i>Pacientes</a>
                            </li>
                            <li>
                                <a href=" <?php echo $ruta; ?>Apps/Profesional/Vista/ListarProfesional.php"><i class="fa fa-stethoscope fa-fw"></i>Profesionales</a>
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
