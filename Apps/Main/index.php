<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <?php
        $ruta = "../../";
        require_once("head.php");
        ?>
    </head>
    <body>

        <?php
        ?>
        <?php require_once("header.php"); ?>

        <div id="page-wrapper">        
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Módulos de Clinica </h1>
                </div><!-- /.col-lg-12 -->
            </div><!-- /.row -->

            <div class="row">
                <div class="col-lg-3 col-md-7">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-2">
                                    <i class="fa fa-ambulance fa-4x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">Enfermedad</div>
                                    <div>Grupos de Enfermedades</div>
                                </div>
                            </div>
                        </div>

                        <a <?php echo "href=../Enfermedades/Vista/ListarEnfermedades.php"; ?>>
                            <div class="panel-footer">
                                <span class="pull-left">Ir a </span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>


                    </div>
                </div>

                <div class="col-lg-3 col-md-7">
                    <div class="panel panel-cyan">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-2">
                                    <i class="fa fa-hospital-o fa-4x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">Clinica</div>
                                    <div>Catalogo de Clinicas Registradas</div>
                                </div>
                            </div>
                        </div>

                        <a <?php echo "href=../Clinica/Vista/ListarClinica.php"; ?>>
                            <div class="panel-footer">
                                <span class="pull-left">Ir a </span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>    
                    </div>
                </div>

                <div class="col-lg-3 col-md-7">
                    <div class="panel panel-black">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-2">
                                    <i class="fa fa-medkit fa-4x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">Servicio</div>
                                    <div>Servicios</div>
                                    <div>Registradas</div>
                                </div>
                            </div>
                        </div>

                        <a <?php echo "href=../Servicio/Vista/ListarServicio.php"; ?>>
                            <div class="panel-footer">
                                <span class="pull-left">Ir a </span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>    
                    </div>
                </div>

                <div class="col-lg-3 col-md-7">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-2">
                                    <i class="fa fa-users fa-4x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">Pacientes</div>
                                    <div>Pacientes</div>
                                    <div>Registradas</div>
                                </div>
                            </div>
                        </div>

                        <a <?php echo "href=../Paciente/Vista/ListarPaciente.php"; ?>>
                            <div class="panel-footer">
                                <span class="pull-left">Ir a </span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>    
                    </div>
                </div>

                <div class="col-lg-3 col-md-7">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-2">
                                    <i class="fa fa-stethoscope fa-4x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">Profesionales</div>
                                    <div>Catalogo de Profesionales</div>
                                </div>
                            </div>
                        </div>

                        <a <?php echo "href=../Profesional/Vista/ListarProfesional.php"; ?>>
                            <div class="panel-footer">
                                <span class="pull-left">Ir a </span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>    
                    </div>
                </div>       

                <div class="col-lg-3 col-md-7">
                    <div class="panel panel-violeta">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-2">
                                    <i class="fa fa-book fa-4x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">Ficha Medica</div>
                                    <div>Catalogo de Fichas Registradas</div>
                                </div>
                            </div>
                        </div>

                        <a <?php echo "href=../FichaMedica/Vista/ListarFicha.php"; ?>>
                            <div class="panel-footer">
                                <span class="pull-left">Ir a </span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>

                    </div>
                </div>

            </div>
        </div> 

        <?php require_once("footer.php"); ?>
    </body>
</html>
