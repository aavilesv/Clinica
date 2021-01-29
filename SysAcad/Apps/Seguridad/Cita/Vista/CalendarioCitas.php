<?php session_start();
require_once('../Controlador/CtrCita.php'); ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Calendario</title>
        <?php
        $rutaValidacion="../../../../";
        $rutaFoto="../../";
        $ruraPerfil="../../";
        $rut="../../../";
        $ruta = "../../../../";
        require_once("../../../../Apps/Main/head.php");
        ?>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
        <link  href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" >

    </head>



    <?php
    $thejson = null;

    $ctrCita = new CtrCita();
    $events = $ctrCita->getCitasC();
    foreach ($events as $event) {
        $thejson[] = array("title" => $event->PAC_Id, "url" => "./?view=citaEdit&id=" . $event->CIT_Id, "start" => $event->CIT_Fecha . "T" . $event->CIT_Turno);
    }
    ?>
    <script>
        $(document).ready(function () {

            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                defaultDate: '<?php echo date('Y-m-d'); ?>',
                editable: false,
                eventLimit: true, // allow "more" link when too many events
                events: <?php echo json_encode($thejson); ?>
            });

        });

    </script>




    <body>
        <?php require_once("../../../../Apps/Main/header.php"); ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="row">
                            <div class="col-lg-12">
                                <h1 class="page-header">Calendario Citas</h1>
                            </div><!-- /.col-lg-12 -->
                        </div><!-- /.row -->

                        <div style="position: relative; top: -14px; right: 43px;" class="row">
                            <a class="btn btn-success col-md-offset-11" href='ManCita.php?usua=0&opc=nuevo' role="button" align="right">
                                <i class="glyphicon glyphicon-plus-sign"> </i>
                                Nueva Cita
                            </a>
                        </div>

                        <div class="container-fluid">


                            <div class="panel panel-default panel-table panel-success">
                                <div class="panel-body">
                                    <div class="row">


                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header" data-background-color="orange">
                                                    <h4 class="title">Calendario de Citas</h4>
                                                </div>
                                                <div class="card-content table-responsive">
                                                    <div id="calendar"></div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once("../../../../Apps/Main/footer.php"); ?>
    </body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
