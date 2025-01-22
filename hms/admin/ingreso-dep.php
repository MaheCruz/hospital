<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

$totalIngresos = 0;
if (isset($_POST['submit'])) {
    $fromdate = $_POST['fromdate'];
    $todate = $_POST['todate'];
    $especialidad = $_POST['especialidad']; // Recibir la especialidad del formulario

    if ($especialidad == 'all') {
        // Consulta para todas las especialidades
        $query = "SELECT SUM(consultancyFees) AS totalIncome FROM appointment WHERE appointmentDate BETWEEN ? AND ?";
        $stmt = $con->prepare($query);
        $stmt->bind_param("ss", $fromdate, $todate);
    } else {
        // Consulta para una especialidad específica
        $query = "SELECT SUM(consultancyFees) AS totalIncome FROM appointment WHERE appointmentDate BETWEEN ? AND ? AND doctorSpecialization=?";
        $stmt = $con->prepare($query);
        $stmt->bind_param("sss", $fromdate, $todate, $especialidad);
    }

    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    if ($row) {
        $totalIngresos = $row['totalIncome'] ? $row['totalIncome'] : 0; // Asegurarse de asignar 0 si es NULL
    } else {
        echo "<script>alert('No se encontraron ingresos para esta especialidad y rango de fechas.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Admin | Ingresos por Especialidad y Fechas</title>
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
                            <h1 class="mainTitle">Admin | Ingresos por Especialidad y Fechas</h1>
                        </div>
                        <ol class="breadcrumb">
                            <li><span>Admin</span></li>
                            <li class="active"><span>Visualizar Ingresos</span></li>
                        </ol>
                    </div>
                </section>
                <div class="container-fluid container-fullw bg-white">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-hover" id="sample-table-1">
                                <thead>
                                    <tr>
                                        <th style="font-size: 20px;">Total Ingresos para <i> <?php echo isset($_POST['especialidad']) && $_POST['especialidad'] != 'all' ? htmlspecialchars($_POST['especialidad']) : 'Todas las Especialidades'; ?>: </i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="font-size: 24px;"><b><?php echo $totalIngresos ? '$' . $totalIngresos : 'No se registraron ingresos.'; ?></b></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php include('include/footer.php'); ?>
</div><!-- start: FOOTER -->
	<?php include('include/footer.php');?>
			<!-- end: FOOTER -->
		
			<!-- start: SETTINGS -->
	<?php include('include/setting.php');?>
			
			<!-- end: SETTINGS -->
		</div>
		<!-- start: MAIN JAVASCRIPTS -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="vendor/autosize/autosize.min.js"></script>
		<script src="vendor/selectFx/classie.js"></script>
		<script src="vendor/selectFx/selectFx.js"></script>
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="assets/js/form-elements.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
</div>
</body>
</html>
