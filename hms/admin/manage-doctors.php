<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

if(isset($_GET['del']))
{
    mysqli_query($con,"delete from doctors where id = '".$_GET['id']."'");
    $_SESSION['msg']="Datos eliminados !!";
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Admin | Gestionar Doctores</title>
        
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
                                    <h1 class="mainTitle">Admin | Gestionar Doctores</h1>
                                                                    </div>
                                <ol class="breadcrumb">
                                    <li>
                                        <span>Admin</span>
                                    </li>
                                    <li class="active">
                                        <span>Gestionar Doctores</span>
                                    </li>
                                </ol>
                            </div>
                        </section>
                        <!-- fin: TÍTULO DE LA PÁGINA -->
                        <!-- inicio: EJEMPLO BÁSICO -->
                        <div class="container-fluid container-fullw bg-white">
                        

                                    <div class="row">
                                <div class="col-md-12">
                                    <h5 class="over-title margin-bottom-15">Gestionar <span class="text-bold">Doctores</span></h5>
                                    <p style="color:red;"><?php echo htmlentities($_SESSION['msg']);?>
                                <?php echo htmlentities($_SESSION['msg']="");?></p>    
                                    <table class="table table-hover" id="sample-table-1">
                                        <thead>
                                            <tr>
                                                <th class="center">#</th>
                                                <th>Especialización</th>
                                                <th class="hidden-xs">Nombre del Doctor</th>
                                                <th>Fecha de Creación</th>
                                                <th>Acción</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
<?php
$sql=mysqli_query($con,"select * from doctors");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>

                                            <tr>
                                                <td class="center"><?php echo $cnt;?>.</td>
                                                <td class="hidden-xs"><?php echo $row['specilization'];?></td>
                                                <td><?php echo $row['doctorName'];?></td>
                                                <td><?php echo $row['creationDate'];?>
                                                </td>
                                                
                                                <td >
                                                <div class="visible-md visible-lg hidden-sm hidden-xs">
                            <a href="edit-doctor.php?id=<?php echo $row['id'];?>" class="btn btn-transparent btn-xs" tooltip-placement="top" tooltip="Editar"><i class="fa fa-pencil"></i></a>
                                                    
    <a href="manage-doctors.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('¿Estás seguro que deseas eliminar?')"class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Eliminar"><i class="fa fa-times fa fa-white"></i></a>
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
