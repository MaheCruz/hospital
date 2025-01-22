<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
// Verifica si el ID y del están presentes en la URL
if(isset($_GET['id']) && $_GET['del'] == 'delete'){
    $id = intval($_GET['id']); // Obtiene el ID y lo convierte a entero para seguridad

    // Consulta SQL para eliminar el paciente basado en el ID
    $query = mysqli_query($con, "DELETE FROM tblpatient WHERE ID = $id");

    // Verifica si la consulta fue exitosa
    if($query){
        echo "<script>alert('Paciente eliminado exitosamente.'); window.location.href='manage-patient.php';</script>";
    } else {
        echo "<script>alert('Error al eliminar el paciente.'); window.location.href='manage-patient.php';</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Admin | Ver Pacientes</title>
        
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
                        <!-- inicio: TÍTULO DE LA PÁGINA -->
<section id="page-title">
<div class="row">
<div class="col-sm-8">
<h1 class="mainTitle">Admin | Ver Pacientes</h1>
</div>
<ol class="breadcrumb">
<li>
<span>Admin</span>
</li>
<li class="active">
<span>Ver Pacientes</span>
</li>
</ol>
</div>
</section>
<div class="container-fluid container-fullw bg-white">
<div class="row">
<div class="col-md-12">
<h5 class="over-title margin-bottom-15">Ver <span class="text-bold">Pacientes</span></h5>
    
<table class="table table-hover" id="sample-table-1">
<thead>
<tr>
<th class="center">#</th>
<th>Nombre del Paciente</th>
<th>Número de Contacto del Paciente</th>
<th>Género del Paciente</th>
<th>Fecha de Creación</th>
<th>Fecha de Actualización</th>
<th>Acción</th>
</tr>
</thead>
<tbody>
<?php

$sql=mysqli_query($con,"select * from tblpatient");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>
<tr>
<td class="center"><?php echo $cnt;?>.</td>
<td class="hidden-xs"><?php echo $row['PatientName'];?></td>
<td><?php echo $row['PatientContno'];?></td>
<td><?php echo $row['PatientGender'];?></td>
<td><?php echo $row['CreationDate'];?></td>
<td><?php echo $row['UpdationDate'];?>
</td>
<td>

<a href="edit-patient.php?editid=<?php echo $row['ID'];?>"><i class="fa fa-edit"></i></a> | <a href="view-patient.php?viewid=<?php echo $row['ID'];?>"><i class="fa fa-eye"></i></a>
|
<a href="manage-patient.php?id=<?php echo $row['ID']?>&del=delete" onClick="return confirm('¿Estás seguro de que quieres eliminar?')"class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Remove"><i class="fa fa-times fa fa-white"></i></a>
</td>
</tr>
<?php 
$cnt=$cnt+1;
 }?></tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
            <!-- inicio: FOOTER -->
    <?php include('include/footer.php');?>
            <!-- fin: FOOTER -->
        
            <!-- inicio: CONFIGURACIONES -->
    <?php include('include/setting.php');?>
            
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
        <!-- inicio: Controladores de Eventos de JavaScript para esta página -->
        <script src="assets/js/form-elements.js"></script>
        <script>
            jQuery(document).ready(function() {
                Main.init();
                FormElements.init();
            });
        </script>
        <!-- fin: Controladores de Eventos de JavaScript para esta página -->
        <!-- fin: CLIP-TWO JAVASCRIPTS -->
    </body>
</html>
