
<?php
    if (isset($_SESSION["usuario"])) { // Identificación Correcta 
        $user =$_SESSION["usuario"]; 

        session_destroy();
    } else {
        echo "La sesión no esta abierta "  ;
        header ("location:laXarxa.php ");
    };
?>           