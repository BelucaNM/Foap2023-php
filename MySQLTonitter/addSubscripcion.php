<html>
<head>
    <title> AddSubscripcion.php </title>
    <meta charset="utf-8">
    <meta description="Basecon favicon">
    <link rel="shortcut icon" href="laXarxaFavicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> 
    <script src="./funciones.js"></script>
</head>

<body>

<?php

$title ="Subscripcion";
include ("header.php");
include_once ("funciones.php");
session_start();
$idUser = $_SESSION["idUsuario"]; 
$subscripciones  = obtener_subscripciones($idUser);
$subscripciones += obtener_target($idUser);
$subscripcionErr="";


?>
<div id="entradaDatos" class = "container pt-3 pb-3 mt-3 bg-light shadow-lg">
<form method="POST" action = "">
        <div id= "tSubscripciones" class="form-check">      
            
<?php     foreach ($subscripciones as $row) {
    
    echo '<div id="div'.$row["id"].'" class="form-check"> ';
    echo' <input class="form-check-input" type ="checkbox" id = "check' 
            .$row["id"]. '" name="option' .$row["id"]. '" value=' 
            .$row["id"].' '.$row["estado"].'>';
    echo '<label class ="form-check-label">'. $row["nombre"] .' '.$row["apellido"].'</label></div>';
};

?>
        </div>    
		<span class="error" style="color:red;"><?=$subscripcionErr;?></span>
        <div class="form-floating mb-1 mt-3"> 
            <input class="btn btn-primary"type="submit" name="submit" value="Aceptar" href="javascript:subscripciones.js">
        </div>
</form>
</div>

<div class = "container pt-3 pb-3 mt-3 bg-light shadow-lg">
    <a class="btnStack" href = "laXarxaTonitter.php"> Cerrar editor </a>
</div>
<?php include ("footer.php") ?>
<body>
</html>


