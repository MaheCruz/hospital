<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

$doctorId = $_SESSION['id'];  // ID del doctor desde la sesión

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Doctor | Consultas Programadas</title>
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
    <link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
    <link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
    <link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
    <link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
    <link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/plugins.css">
    <link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
</head>
<body>
<div id="app">
    <?php include('include/sidebar.php'); ?>
    <div class="app-content">
        <?php include('include/header.php'); ?>
        <div class="main-content">
            <div class="wrap-content container" id="container">
                <section id="page-title">
                    <div class="row">
                        <div class="col-sm-8">
                            <h1 class="mainTitle">Doctor | Consultas Programadas</h1>
                        </div>
                        <ol class="breadcrumb">
                            <li><span>Doctor</span></li>
                            <li class="active"><span>Consultas Programadas</span></li>
                        </ol>
                    </div>
                </section>
                <div class="container-fluid container-fullw bg-white">
                    <div class="row">
                        <div class="col-md-12">
                            <form role="form" method="post" action="filtro-pac.php"> <!-- Asegúrate de que este archivo procese los datos del formulario correctamente -->
                                <div class="form-group">
                                    <label for="searchName">Buscar Paciente:</label>
                                    <input type="text" class="form-control" name="searchName" placeholder="Ingrese nombre del paciente">
                                </div>

                                <div class="form-group">
                                    <label for="fromdate">Fecha Desde:</label>
                                    <input type="date" class="form-control" name="fromdate" required>
                                </div>
                                <div class="form-group">
                                    <label for="todate">Fecha Hasta:</label>
                                    <input type="date" class="form-control" name="todate" required>
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    Ver Consultas
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('include/footer.php'); ?>
</div>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/modernizr/modernizr.js"></script>
<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="vendor/switchery/switchery.min.js"></script>
<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
<script src="assets/js/main.js"></script>
<script>
    jQuery(document).ready(function() {
        Main.init();
        FormElements.init();
    });
</script>
</body>
</html>
