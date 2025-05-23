<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
$id=intval($_GET['id']); // obtener valor
if(isset($_POST['submit']))
{
$docspecialization=$_POST['doctorspecilization'];
$sql=mysqli_query($con,"update  doctorSpecilization set specilization='$docspecialization' where id='$id'");
$_SESSION['msg']="Especialización del doctor actualizada correctamente !!";
}

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Admin | Editar Especialización del Doctor</title>
        
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
                                    <h1 class="mainTitle">Admin | Editar Especialización del Doctor</h1>
                                                                    </div>
                                <ol class="breadcrumb">
                                    <li>
                                        <span>Admin</span>
                                    </li>
                                    <li class="active">
                                        <span>Editar Especialización del Doctor</span>
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
                                        <div class="col-lg-6 col-md-12">
                                            <div class="panel panel-white">
                                                <div class="panel-heading">
                                                    <h5 class="panel-title">Editar Especialización del Doctor</h5>
                                                </div>
                                                <div class="panel-body">
                                <p style="color:red;"><?php echo htmlentities($_SESSION['msg']);?>
                                <?php echo htmlentities($_SESSION['msg']="");?></p> 
                                                    <form role="form" name="dcotorspcl" method="post" >
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">
                                                                Editar Especialización del Doctor
                                                            </label>

    <?php 

$id=intval($_GET['id']);
    $sql=mysqli_query($con,"select * from doctorSpecilization where id='$id'");
while($row=mysqli_fetch_array($sql))
{                                                       
    ?>      <input type="text" name="doctorspecilization" class="form-control" value="<?php echo $row['specilization'];?>" >
    <?php } ?>
                                                        </div>
                                                    
                                                        
                                                        
                                                        
                                                        <button type="submit" name="submit" class="btn btn-o btn-primary">
                                                            Actualizar
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
            
            <!-- fin: CONFIGURACIONES -->
        </div>
        <!-- inicio: JAVASCRIPT PRINCIPAL -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="vendor/modernizr/modernizr.js"></script>
        <script src="vendor/jquery-cookie/jquery.cookie.js"></script>
        <script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
        <script src="vendor/switchery/switchery.min.js"></script>
        <!-- fin: JAVASCRIPT PRINCIPAL -->
        <!-- inicio: JAVASCRIPT REQUERIDO PARA ESTA PÁGINA SOLO -->
        <script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
        <script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
        <script src="vendor/autosize/autosize.min.js"></script>
        <script src="vendor/selectFx/classie.js"></script>
        <script src="vendor/selectFx/selectFx.js"></script>
        <script src="vendor/select2/select2.min.js"></script>
        <script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
        <script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
        <!-- fin: JAVASCRIPT REQUERIDO PARA ESTA PÁGINA SOLO -->
        <!-- inicio: JAVASCRIPTS DE CLIP-TWO -->
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
        <!-- fin: JAVASCRIPTS DE CLIP-TWO -->
    </body>
</html>
