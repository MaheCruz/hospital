<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
date_default_timezone_set('Asia/Kolkata');// cambia según la zona horaria
$currentTime = date( 'd-m-Y h:i:s A', time () );
if(isset($_POST['submit']))
{
$sql=mysqli_query($con,"SELECT password FROM  admin where password='".$_POST['cpass']."' && username='".$_SESSION['login']."'");
$num=mysqli_fetch_array($sql);
if($num>0)
{
 $con=mysqli_query($con,"update admin set password='".$_POST['npass']."', updationDate='$currentTime' where username='".$_SESSION['login']."'");
$_SESSION['msg1']="¡Contraseña Cambiada Satisfactoriamente!";
}
else
{
$_SESSION['msg1']="¡La contraseña antigua no coincide!";
}
}
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Admin | Cambiar Contraseña</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="" name="description" />
		<meta content="" name="author" />
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
<script type="text/javascript">
function valid()
{
if(document.chngpwd.cpass.value=="")
{
alert("¡El campo de la contraseña actual está vacío!");
document.chngpwd.cpass.focus();
return false;
}
else if(document.chngpwd.npass.value=="")
{
alert("¡El campo de la nueva contraseña está vacío!");
document.chngpwd.npass.focus();
return false;
}
else if(document.chngpwd.cfpass.value=="")
{
alert("¡El campo de confirmación de contraseña está vacío!");
document.chngpwd.cfpass.focus();
return false;
}
else if(document.chngpwd.npass.value!= document.chngpwd.cfpass.value)
{
alert("¡Los campos de contraseña y confirmación de contraseña no coinciden!");
document.chngpwd.cfpass.focus();
return false;
}
return true;
}
</script>

	</head>
	<body>
		<div id="app">		
<?php include('include/sidebar.php');?>
			<div class="app-content">
				
						<?php include('include/header.php');?>
		
				</header>
				<!-- fin: BARRA SUPERIOR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- inicio: TÍTULO DE LA PÁGINA -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">Admin | Cambiar Contraseña</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>Admin</span>
									</li>
									<li class="active">
										<span>Cambiar Contraseña</span>
									</li>
								</ol>
							</div>
						</section>
						<!-- fin: TÍTULO DE LA PÁGINA -->
						<!-- inicio: EJEMPLO BÁSICO -->
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
									
									<div class="row margin-top-30">
										<div class="col-lg-8 col-md-12">
											<div class="panel panel-white">
												<div class="panel-heading">
													<h5 class="panel-title">Cambiar Contraseña</h5>
												</div>
												<div class="panel-body">
								<p style="color:red;"><?php echo htmlentities($_SESSION['msg1']);?>
								<?php echo htmlentities($_SESSION['msg1']="");?></p>	
													<form role="form" name="chngpwd" method="post" onSubmit="return valid();">
														<div class="form-group">
															<label for="exampleInputEmail1">
																Contraseña Actual
															</label>
							<input type="password" name="cpass" class="form-control"  placeholder="Ingresa Contraseña Actual">
														</div>
														<div class="form-group">
															<label for="exampleInputPassword1">
																Nueva Contraseña
															</label>
					<input type="password" name="npass" class="form-control"  placeholder="Nueva Contraseña">
														</div>
														
<div class="form-group">
															<label for="exampleInputPassword1">
																Confirmar Contraseña
															</label>
									<input type="password" name="cfpass" class="form-control"  placeholder="Confirmar Contraseña">
														</div>
														
														
														
														<button type="submit" name="submit" class="btn btn-o btn-primary">
															Enviar
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
						<!-- fin: EJEMPLO BÁSICO -->
			
					
					
						
						
					
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
