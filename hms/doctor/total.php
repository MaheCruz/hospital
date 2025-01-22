<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

function getCitasDetalle($periodo) {
    global $con;  // Usar la conexión a la base de datos global
    $sql = "";
    $today = date('Y-m-d');
    $startOfWeek = date('Y-m-d', strtotime('Monday this week'));
    $endOfWeek = date('Y-m-d', strtotime('Sunday this week'));
    $doctorId = $_SESSION['id'];  // Asegurarse de usar el ID del doctor de la sesión

    if ($periodo == 'diario') {
        $sql = "SELECT doctors.doctorName, users.fullName as patientName, appointment.appointmentTime, appointment.appointmentDate, doctors.consultorio
                FROM appointment
                JOIN doctors ON doctors.id = appointment.doctorId
                JOIN users ON users.id = appointment.userId
                WHERE appointment.doctorId = '{$doctorId}' AND DATE(appointment.appointmentDate) = '{$today}'";
    } else if ($periodo == 'semanal') {
        $sql = "SELECT doctors.doctorName, users.fullName as patientName, appointment.appointmentTime, appointment.appointmentDate, doctors.consultorio
                FROM appointment
                JOIN doctors ON doctors.id = appointment.doctorId
                JOIN users ON users.id = appointment.userId
                WHERE appointment.doctorId = '{$doctorId}' AND DATE(appointment.appointmentDate) BETWEEN '{$startOfWeek}' AND '{$endOfWeek}'";
    }

    $result = $con->query($sql);
    $citas = [];
    while ($result && $row = $result->fetch_assoc()) {
        $citas[] = $row;  // Cada fila se añade correctamente al array
    }
    return $citas;
}


// Recuperando detalles de citas
$citasDiarias = getCitasDetalle('diario');
$citasSemanales = getCitasDetalle('semanal');
?>

<!-- Código HTML sigue igual, asegúrate de que los datos se muestran correctamente en la tabla -->


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Citas</title>
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
                            <h1 class="mainTitle">Admin | Reportes de Citas</h1>
                        </div>
                        <ol class="breadcrumb">
                            <li><span>Admin</span></li>
                            <li class="active"><span>Consultas por area</span></li>
                        </ol>
                    </div>
                </section>
                <div class="container-fluid container-fullw bg-white">
                    <div class="row">
    <div class="container">
        <h2>Citas del Día (Total: <?php echo count($citasDiarias); ?>)</h2>
        <?php if (count($citasDiarias) > 0): ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre del Doctor</th>
                    <th>Nombre del Paciente</th>
                    <th>Día de la Cita</th>
                    <th>Hora</th>
                    <th>Consultorio</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($citasDiarias as $index => $cita): ?>
                <tr>
                    <td><?php echo $index + 1; ?></td>
                    <td><?php echo htmlspecialchars($cita['doctorName']); ?></td>
                    <td><?php echo htmlspecialchars($cita['patientName']); ?></td>
                    <td><?php echo date('d-m-Y', strtotime($cita['appointmentDate'])); ?></td>
                    <td><?php echo htmlspecialchars($cita['appointmentTime']); ?></td>
                    <td><?php echo htmlspecialchars($cita['consultorio']); ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <?php else: ?>
        <p>No hay citas para hoy.</p>
        <?php endif; ?>

        <h2>Citas de la Semana (Total: <?php echo count($citasSemanales); ?>)</h2>
        <?php if (count($citasSemanales) > 0): ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre del Doctor</th>
                    <th>Nombre del Paciente</th>
                    <th>Día de la Cita</th>
                    <th>Hora</th>
                    <th>Consultorio</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($citasSemanales as $index => $cita): ?>
                <tr>
                    <td><?php echo $index + 1; ?></td>
                    <td><?php echo htmlspecialchars($cita['doctorName']); ?></td>
                    <td><?php echo htmlspecialchars($cita['patientName']); ?></td>
                    <td><?php echo date('d-m-Y', strtotime($cita['appointmentDate'])); ?></td>
                    <td><?php echo htmlspecialchars($cita['appointmentTime']); ?></td>
                    <td><?php echo htmlspecialchars($cita['consultorio']); ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <?php else: ?>
        <p>No hay citas para esta semana.</p>
        <?php endif; ?>
    </div>
		</div>
    <?php include('include/footer.php'); ?>
</div><!-- start: FOOTER -->
		
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
	</body>
</html>

