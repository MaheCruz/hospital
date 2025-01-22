<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

$result = false;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $fromdate = $_POST['fromdate'];
    $todate = $_POST['todate'];
    $especialidad = $_POST['especialidad'];

    // Convertir fechas de varchar a DATE para comparar correctamente
    $fromdate = date('Y-m-d', strtotime($fromdate));
    $todate = date('Y-m-d', strtotime($todate));

    if ($especialidad === 'all') {
        $sql = "SELECT d.doctorName AS docname, u.fullName AS pname, a.*, d.consultorio 
                FROM appointment a
                JOIN doctors d ON d.id = a.doctorId 
                JOIN users u ON u.id = a.userId 
                WHERE DATE(a.appointmentDate) BETWEEN ? AND ?
                ORDER BY a.appointmentDate DESC";
    } else {
        $sql = "SELECT d.doctorName AS docname, u.fullName AS pname, a.*, d.consultorio 
                FROM appointment a
                JOIN doctors d ON d.id = a.doctorId 
                JOIN users u ON u.id = a.userId 
                WHERE DATE(a.appointmentDate) BETWEEN ? AND ? AND d.specilization = ?
                ORDER BY a.appointmentDate DESC";
    }

    $stmt = $con->prepare($sql);
    if (!$stmt) {
        echo 'Error al preparar la consulta: ' . htmlspecialchars($con->error);
        exit;
    }

    if ($especialidad === 'all') {
        $stmt->bind_param("ss", $fromdate, $todate);
    } else {
        $stmt->bind_param("sss", $fromdate, $todate, $especialidad);
    }

    $stmt->execute();
    $result = $stmt->get_result();

    if (!$result || $result->num_rows == 0) {
        echo "<script>alert('No se encontraron consultas para esta especialidad y rango de fechas.');</script>";
    }
}
?>

<!-- Continuación del código HTML para mostrar los resultados -->


<!DOCTYPE html>
<html lang="es">
<head>
    <title>Pacientes | Historial de Citas</title>
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
        <?php include('include/sidebar.php');?>
        <div class="app-content">
            <?php include('include/header.php');?>
            <div class="main-content" >
                <div class="wrap-content container" id="container">
                    <section id="page-title">
                        <div class="row">
                            <div class="col-sm-8">
                                <h1 class="mainTitle">Pacientes | Historial de Citas</h1>
                            </div>
                            <ol class="breadcrumb">
                                <li><span>Pacientes</span></li>
                                <li class="active"><span>Historial de Citas</span></li>
                            </ol>
                        </div>
                    </section>
                    <div class="container-fluid container-fullw bg-white">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-hover" id="sample-table-1">
                                    <thead>
                                        <tr>
                                            <th class="center">#</th>
                                            <th>Nombre del Doctor</th>
                                            <th>Nombre del Paciente</th>
                                            <th>Especialización</th>
                                            <th>Honorarios de Consulta</th>
                                            <th>Consultorio</th>
                                            <th>Fecha/Hora de la Cita</th>
                                            <th>Fecha de Creación de la Cita</th>
                                            <th>Estado Actual</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ($result && $result->num_rows > 0): ?>
                                            <?php while ($row = $result->fetch_assoc()): ?>
                                                <tr>
                                                    <td class="center"><?php echo htmlspecialchars($row['appointmentId']); ?></td>
                                                    <td><?php echo htmlspecialchars($row['docname']); ?></td>
                                                    <td><?php echo htmlspecialchars($row['pname']); ?></td>
                                                    <td><?php echo htmlspecialchars($row['doctorSpecialization']); ?></td>
                                                    <td><?php echo htmlspecialchars($row['consultancyFees']); ?></td>
                                                    <td><?php echo htmlspecialchars($row['consultorio']); ?></td>
                                                    <td><?php echo htmlspecialchars($row['appointmentDate']) . ' / ' . htmlspecialchars($row['appointmentTime']); ?></td>
                                                    <td><?php echo htmlspecialchars($row['postingDate']); ?></td>
                                                    <td><?php echo ($row['userStatus'] == 1 && $row['doctorStatus'] == 1) ? "Activo" : "Cancelado"; ?></td>
                                                    <td>No hay acciones disponibles</td>
                                                </tr>
                                            <?php endwhile; ?>
                                        <?php else: ?>
                                            <tr><td colspan="10">No se encontraron citas para los criterios seleccionados.</td></tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include('include/footer.php');?>
        </div>
    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/modernizr/modernizr.js"></script>
    <script src="vendor/jquery-cookie/jquery.cookie.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="vendor/switchery/switchery.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/form-elements.js"></script>
    <script>
        jQuery(document).ready(function() {
            Main.init();
            FormElements.init();
        });
    </script>
</body>
</html>
