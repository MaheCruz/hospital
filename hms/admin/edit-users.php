<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
if(isset($_POST['submit'])) {
    $eid = intval($_GET['editid']);
    $fullName = $_POST['fullName']; // Asegúrate de que este campo se llame igual en el formulario.
    $address = $_POST['address']; // Asegúrate de que este campo se llame igual en el formulario.
    $city = $_POST['city']; // Asegúrate de que este campo se llame igual en el formulario.
    $gender = $_POST['gender']; // Asegúrate de que este campo se llame igual en el formulario.
    $email = $_POST['email']; // Asegúrate de que este campo se llame igual en el formulario.

	// Asegúrate de que los nombres de las variables en la consulta coincidan con los utilizados en el formulario.
	$sql=mysqli_query($con,"update users set fullName='$fullName', address='$address', city='$city', gender='$gender', email='$email' where ID='$eid'");

    if($sql) {
        echo "<script>alert('Información del usuario actualizada con éxito');</script>";
		header('location:manage-users.php');
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Admin | Editar Usuario</title>
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
        
        <div class="main-content">
            <div class="wrap-content container" id="container">
                <!-- Contenido de la página -->
                <section id="page-title">
                    <div class="row">
                        <div class="col-sm-8">
                            <h1 class="mainTitle">Usuario | Actualizar datos</h1>
                        </div>
                        <ol class="breadcrumb">
                            <li>
                                <span>Usuarios</span>
                            </li>
                            <li class="active">
                                <span>Actualizar datos</span>
                            </li>
                        </ol>
                    </div>
                </section>
                <div class="container-fluid container-fullw bg-white">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row margin-top-30">
                                <div class="col-lg-8 col-md-12">
                                    <div class="panel panel-white">
                                        <div class="panel-heading">
                                            <h5 class="panel-title">Actualizar datos</h5>
                                        </div>
                                        <div class="panel-body">
                                            <form role="form" method="post">
                                                <?php
                                                $eid=$_GET['editid'];
                                                $ret=mysqli_query($con,"select * from users where ID='$eid'");
                                                while ($row=mysqli_fetch_array($ret)) {
                                                ?>
                                                <div class="form-group">
                                                    <label for="fullName">Nombre Completo:</label>
                                                    <input type="text" name="fullName" class="form-control"  value="<?php  echo $row['fullName'];?>" required="true">
                                                </div>
                                                <div class="form-group">
                                                    <label for="address">Domicilio:</label>
                                                    <textarea name="address" class="form-control" required="true"><?php  echo $row['address'];?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="city">Ciudad:</label>
                                                    <input type="text" name="city" class="form-control"  value="<?php  echo $row['city'];?>" required="true">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Género:</label>
                                                    <input type="radio" name="gender" value="Masculino" <?php echo ($row['gender']=="Masculino") ? 'checked' : ''; ?>> Masculino
                                                    <input type="radio" name="gender" value="Femenino" <?php echo ($row['gender']=="Femenino") ? 'checked' : ''; ?>> Femenino
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Correo Electrónico:</label>
<input type="email" id="email" name="email" class="form-control"  value="<?php  echo $row['email'];?>" readonly='true'>
<span id="email-availability-status"></span>
</div>
                                <?php } ?>
<button type="submit" name="submit" id="submit" class="btn btn-o btn-primary">
Actualizar datos
</button>
</form>
</div>
</div>
</div>
</div>
</div>
<div class="col-lg-12 col-md-12">
<div class="panel panel-white">
</div>
</div>
</div>
</div>
</div>
</div>				
</div>
</div>
</div>
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
	</body>
</html>

