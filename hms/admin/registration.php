<?php
include_once('include/config.php');
if(isset($_POST['submit']))
{
$fname=$_POST['full_name'];
$address=$_POST['address'];
$city=$_POST['city'];
$gender=$_POST['gender'];
$email=$_POST['email'];
$password=md5($_POST['password']);
$query=mysql_query("insert into users(fullname,address,city,gender,email,password) values('$fname','$address','$city','$gender','$email','$password')");
if($query)
{
    echo "<script>alert('Registro exitoso. Ahora puedes iniciar sesión');</script>";
}
}
?>


<!DOCTYPE html>
<html lang="es">

    <head>
        <title>Registro de Usuario</title>
        
        <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
        <link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
        <link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
        <link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="assets/css/styles.css">
        <link rel="stylesheet" href="assets/css/plugins.css">
        <link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
        
    </head>

    <body class="login">
        <!-- inicio: REGISTRO -->
        <div class="row">
            <div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
                <div class="logo margin-top-30">
                    <img src="assets/images/logo.png" alt="Clip-Two"/>
                </div>
                <!-- inicio: CAJA DE REGISTRO -->
                <div class="box-register">
                    <form name="registration" id="registration"  method="post">
                        <fieldset>
                            <legend>
                                Regístrate
                            </legend>
                            <p>
                                Ingresa tus datos personales a continuación:
                            </p>
                            <div class="form-group">
                                <input type="text" class="form-control" name="full_name" placeholder="Nombre Completo" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="address" placeholder="Dirección" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="city" placeholder="Ciudad" required>
                            </div>
                            <div class="form-group">
                                <label class="block">
                                    Género
                                </label>
                                <div class="clip-radio radio-primary">
                                    <input type="radio" id="rg-female" name="gender" value="female" >
                                    <label for="rg-female">
                                        Femenino
                                    </label>
                                    <input type="radio" id="rg-male" name="gender" value="male">
                                    <label for="rg-male">
                                        Masculino
                                    </label>
                                </div>
                            </div>
                            <p>
                                Ingresa los detalles de tu cuenta a continuación:
                            </p>
                            <div class="form-group">
                                <span class="input-icon">
                                    <input type="email" class="form-control" name="email" id="email" onBlur="userAvailability()"  placeholder="Correo Electrónico" required>
                                    <i class="fa fa-envelope"></i> </span>
                                     <span id="user-availability-status1" style="font-size:12px;"></span>
                            </div>
                            <div class="form-group">
                                <span class="input-icon">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" required>
                                    <i class="fa fa-lock"></i> </span>
                            </div>
                            <div class="form-group">
                                <span class="input-icon">
                                    <input type="password" class="form-control" name="password_again" placeholder="Repetir Contraseña" required>
                                    <i class="fa fa-lock"></i> </span>
                            </div>
                            <div class="form-group">
                                <div class="checkbox clip-check check-primary">
                                    <input type="checkbox" id="agree" value="agree">
                                    <label for="agree">
                                        Estoy de acuerdo
                                    </label>
                                </div>
                            </div>
                            <div class="form-actions">
                                <p>
                                    ¿Ya tienes una cuenta?
                                    <a href="user-login.php">
                                        Iniciar sesión
                                    </a>
                                </p>
                                <button type="submit" class="btn btn-primary pull-right" id="submit" name="submit">
                                    Enviar <i class="fa fa-arrow-circle-right"></i>
                                </button>
                            </div>
                        </fieldset>
                    </form>

                    <div class="copyright">
                        &copy; <span class="current-year"></span><span class="text-bold text-uppercase"> HMS</span>. <span>Todos los derechos reservados</span>
                    </div>

                </div>

            </div>
        </div>
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="vendor/modernizr/modernizr.js"></script>
        <script src="vendor/jquery-cookie/jquery.cookie.js"></script>
        <script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
        <script src="vendor/switchery/switchery.min.js"></script>
        <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
        <script src="assets/js/main.js"></script>
        <script src="assets/js/login.js"></script>
        <script>
            jQuery(document).ready(function() {
                Main.init();
                Login.init();
            });
        </script>
        
    <script>
function userAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'email='+$("#email").val(),
type: "POST",
success:function(data){
$("#user-availability-status1").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>    
        
    </body>
    <!-- fin: BODY -->
</html>
