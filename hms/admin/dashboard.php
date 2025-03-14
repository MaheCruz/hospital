<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Admin | Panel de Control</title>
		
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
						
				<!-- fin: BARRA SUPERIOR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- inicio: TÍTULO DE LA PÁGINA -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">Admin | Panel de Control</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>Admin</span>
									</li>
									<li class="active">
										<span>Panel de Control</span>
									</li>
								</ol>
							</div>
						</section>
						<!-- fin: TÍTULO DE LA PÁGINA -->
						<!-- inicio: EJEMPLO BÁSICO -->
						<div class="container-fluid container-fullw bg-white">
						<div class="row">
							<div class="col-sm-4">
								<div class="panel panel-white no-radius text-center">
									<div class="panel-body">
										<span class="fa-stack fa-2x"> 
											<i class="fa fa-square fa-stack-2x text-primary"></i> 
											<i class="fa fa-smile-o fa-stack-1x fa-inverse"></i> 
										</span>
										<h2 class="StepTitle">Administrar Usuarios</h2>
										<p class="links cl-effect-1">
											<a href="manage-users.php">
												<?php
												$result = mysqli_query($con, "SELECT * FROM users");
												$num_rows = mysqli_num_rows($result);
												echo "Total de Usuarios: " . htmlentities($num_rows);
												?>
											</a>
										</p>
									</div>
								</div>
							</div>

							<div class="col-sm-4">
								<div class="panel panel-white no-radius text-center">
									<div class="panel-body">
										<span class="fa-stack fa-2x">
											<i class="fa fa-square fa-stack-2x text-primary"></i>
											<i class="fa fa-users fa-stack-1x fa-inverse"></i>
										</span>
										<h2 class="StepTitle">Administrar Doctores</h2>
										<p class="cl-effect-1">
											<a href="manage-doctors.php">
												<?php
												$result1 = mysqli_query($con, "SELECT * FROM doctors");
												$num_rows1 = mysqli_num_rows($result1);
												echo "Total de Doctores: " . htmlentities($num_rows1);
												?>
											</a>
										</p>
									</div>
								</div>
							</div>

							<div class="col-sm-4">
								<div class="panel panel-white no-radius text-center">
									<div class="panel-body">
										<span class="fa-stack fa-2x">
											<i class="fa fa-square fa-stack-2x text-primary"></i>
											<i class="fa fa-terminal fa-stack-1x fa-inverse"></i>
										</span>
										<h2 class="StepTitle">Citas</h2>
										<p class="links cl-effect-1">
											<a href="appointment-history.php">
												<?php
												$sql = mysqli_query($con, "SELECT * FROM appointment");
												$num_rows2 = mysqli_num_rows($sql);
												echo "Total de Citas: " . htmlentities($num_rows2);
												?>
											</a>
										</p>
									</div>
								</div>
							</div></div>
							<div class="col-sm-4">
									<div class="panel panel-white no-radius text-center">
										<div class="panel-body">
											<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-smile-o fa-stack-1x fa-inverse"></i> </span>
											<h2 class="StepTitle">Administrar Pacientes</h2>
											
											<p class="links cl-effect-1">
												<a href="manage-patient.php">
												<?php $result = mysqli_query($con,"SELECT * FROM tblpatient ");
												$num_rows = mysqli_num_rows($result);
												{
												?>
												Total de Pacientes :<?php echo htmlentities($num_rows);  
												} ?>		
												</a>
											</p>
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="panel panel-white no-radius text-center">
										<div class="panel-body">
											<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-money fa-stack-1x fa-inverse"></i> </span>
											<h2 class="StepTitle">Ingresos</h2>
											
											<p class="links cl-effect-1">
												<a href="ingreso-area.php">	Ingreso por especialidad</a>
											</p>
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="panel panel-white no-radius text-center">
										<div class="panel-body">
											<span class="fa-stack fa-2x"> <i class="ti-files fa-1x text-primary"></i> <i class="fa fa-terminal fa-stack-1x fa-inverse"></i> </span>
											<h2 class="StepTitle">Consultas Nuevas</h2>
											
											<p class="links cl-effect-1">
												<a href="book-appointment.php">
													<a href="unread-queries.php">
												<?php 
												$sql= mysqli_query($con,"SELECT * FROM tblcontactus where  IsRead is null");
												$num_rows22 = mysqli_num_rows($sql);
												?>
											Total de Consultas :<?php echo htmlentities($num_rows22);   ?>	
												</a>
												</a>
											</p>
										</div>
									</div>
								</div>

							<!-- Añadir más paneles según sea necesario -->

						</div>
					</div>

					
						<!-- fin: CAJAS DE SELECCIÓN -->
						
					</div>
				</div>
			</div>
			<!-- inicio: PIE DE PÁGINA -->
	<?php include('include/footer.php');?>
			<!-- fin: PIE DE PÁGINA -->
		
			<!-- inicio: CONFIGURACIONES -->
	<?php include('include/setting.php');?>
			<>
			<!-- fin: CONFIGURACIONES -->
		</div>
		<!-- inicio: JAVASCRIPTS PRINCIPALES -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<!-- fin: JAVASCRIPTS PRINCIPALES -->
		<!-- inicio: JAVASCRIPTS REQUERIDOS PARA ESTA PÁGINA SOLAMENTE -->
		<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="vendor/autosize/autosize.min.js"></script>
		<script src="vendor/selectFx/classie.js"></script>
		<script src="vendor/selectFx/selectFx.js"></script>
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<!-- fin: JAVASCRIPTS REQUERIDOS PARA ESTA PÁGINA SOLAMENTE -->
		<!-- inicio: CLIP-TWO JAVASCRIPTS -->
		<script src="assets/js/main.js"></script>
		<!-- inicio: Manejadores de Eventos de JavaScript para esta página -->
		<script src="assets/js/form-elements.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>
		<!-- fin: Manejadores de Eventos de JavaScript para esta página -->
		<!-- fin: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
