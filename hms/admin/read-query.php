<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

if(isset($_GET['del']))
{
    mysqli_query($con,"delete from doctors where id = '".$_GET['id']."'");
    $_SESSION['msg']="¡Datos eliminados!";
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Administrador | Gestionar Consultas Leídas</title>
        
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
                    
                <!-- fin: BARRA DE NAVEGACIÓN SUPERIOR -->
                <div class="main-content" >
                    <div class="wrap-content container" id="container">
                        <!-- inicio: TÍTULO DE LA PÁGINA -->
                        <section id="page-title">
                            <div class="row">
                                <div class="col-sm-8">
                                    <h1 class="mainTitle">Administrador | Gestionar Consultas Leídas</h1>
                                                                    </div>
                                <ol class="breadcrumb">
                                    <li>
                                        <span>Administrador</span>
                                    </li>
                                    <li class="active">
                                        <span>Consultas Leídas</span>
                                    </li>
                                </ol>
                            </div>
                        </section>
                        <!-- fin: TÍTULO DE LA PÁGINA -->
                        <!-- inicio: EJEMPLO BÁSICO -->
                        <div class="container-fluid container-fullw bg-white">
                        

                                    <div class="row">
                                <div class="col-md-12">
                                    <h5 class="over-title margin-bottom-15">Gestionar <span class="text-bold">Consultas Leídas</span></h5>
                                    <table class="table table-hover" id="sample-table-1">
                                        <thead>
                                            <tr>
                                                <th class="center">#</th>
                                                <th>Nombre</th>
                                                <th class="hidden-xs">Correo Electrónico</th>
                                                <th>Número de Contacto</th>
                                                <th>Mensaje</th>
                                                <th>Acción</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
<?php
$sql=mysqli_query($con,"select * from tblcontactus where IsRead is not null");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>

                                            <tr>
                                                <td class="center"><?php echo $cnt;?>.</td>
                                                <td class="hidden-xs"><?php echo $row['fullname'];?></td>
                                                <td><?php echo $row['email'];?></td>
                                                <td><?php echo $row['contactno'];?></td>
                                                <td><?php echo $row['message'];?></td>
                                                
                                                <td >
                                                <div class="visible-md visible-lg hidden-sm hidden-xs">
                            <a href="query-details.php?id=<?php echo $row['id'];?>" class="btn btn-transparent btn-lg" title="Ver Detalles"><i class="fa fa-file"></i></a>
                                                </div>
                                                <div class="visible-xs visible-sm hidden-md hidden-lg">
                                                    <div class="btn-group" dropdown is-open="status.isopen">
                                                        <button type="button" class="btn btn-primary btn-o btn-sm dropdown-toggle" dropdown-toggle>
                                                            <i class="fa fa-cog"></i>&nbsp;<span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu pull-right dropdown-light" role="menu">
                                                            <li>
                                                                <a href="#">
                                                                    Editar
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    Compartir
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    Eliminar
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div></td>
                                            </tr>
                                            
                                            <?php 
$cnt=$cnt+1;
                                             }?>
                                            
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                                </div>
                            </div>
                        </div>
                        <!-- fin: EJEMPLO BÁSICO -->
                        <!-- fin: SELECT BOXES -->
                        
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
        <!-- inicio: JAVASCRIPT PRINCIPALES -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="vendor/modernizr/modernizr.js"></script>
        <script src="vendor/jquery-cookie/jquery.cookie.js"></script>
        <script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
        <script src="vendor/switchery/switchery.min.js"></script>
        <!-- fin: JAVASCRIPT PRINCIPALES -->
        <!-- inicio: JAVASCRIPT REQUERIDOS PARA ESTA PÁGINA SOLAMENTE -->
        <script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
        <script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
        <script src="vendor/autosize/autosize.min.js"></script>
        <script src="vendor/selectFx/classie.js"></script>
        <script src="vendor/selectFx/selectFx.js"></script>
        <script src="vendor/select2/select2.min.js"></script>
        <script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
        <script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
        <!-- fin: JAVASCRIPT REQUERIDOS PARA ESTA PÁGINA SOLAMENTE -->
        <!-- inicio: JAVASCRIPTS DE CLIP-TWO -->
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
        <!-- fin: JAVASCRIPTS DE CLIP-TWO -->
    </body>
</html>
