<?php
session_start();
include('include/config.php');
include('include/checklogin.php');
check_login();

$doctorId = $_SESSION['id']; // Asumiendo que el ID del doctor está correctamente almacenado en $_SESSION['id']

$searchName = $_POST['searchName'];
$fromdate = $_POST['fromdate'];
$todate = $_POST['todate'];

// Preparar y ejecutar la consulta SQL segura
$stmt = $con->prepare("SELECT a.appointmentDate, a.appointmentTime, u.fullName, d.consultorio FROM appointment a JOIN users u ON a.userId = u.id JOIN doctors d ON a.doctorId = d.id WHERE a.doctorId = ? AND u.fullName LIKE ? AND a.appointmentDate BETWEEN ? AND ?");
$searchParam = "%" . $searchName . "%";
$stmt->bind_param("isss", $doctorId, $searchParam, $fromdate, $todate);
$stmt->execute();
$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Doctor | Resultados de Consultas</title>
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
                            <h1 class="mainTitle">Doctor | Resultados de Consultas</h1>
                        </div>
                        <ol class="breadcrumb">
                            <li><span>Doctor</span></li>
                            <li class="active"><span>Resultados de Consultas</span></li>
                        </ol>
                    </div>
                </section>
                <div class="container-fluid container-fullw bg-white">
                    <div class="row">
                        <div class="col-md-12">
                            <h5>Resultados:</h5>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Hora</th>
                                        <th>Nombre del Paciente</th>
                                        <th>Consultorio</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if ($result->num_rows > 0): ?>
                                    <?php while ($row = $result->fetch_assoc()): ?>
                                    <tr>
                                        <td><?php echo date('d-m-Y', strtotime($row['appointmentDate'])); ?></td>
                                        <td><?php echo $row['appointmentTime']; ?></td>
                                        <td><?php echo htmlspecialchars($row['fullName']); ?></td>
                                        <td><?php echo htmlspecialchars($row['consultorio']); ?></td>
                                    </tr>
                                    <?php endwhile; ?>
                                <?php else: ?>
                                    <tr><td colspan="4">No se encontraron citas.</td></tr>
                                <?php endif; ?>
                                </tbody>
                            </table>
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
