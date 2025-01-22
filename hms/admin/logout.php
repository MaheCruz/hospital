<?php
session_start(); // Inicia una nueva sesión o reanuda la existente
$_SESSION['login']=="";
session_unset(); // Libera todas las variables de sesión
session_destroy(); // Destruye toda la información registrada de una sesión
?>
<script language="javascript">
// Redirige al navegador a la página de inicio
document.location="../../index.html";
</script>
