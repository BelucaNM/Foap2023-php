<html>
<head>
    <title> AddSubscripcion.php </title>
    <meta charset="utf-8">
    <meta description="Basecon favicon">
    <link rel="shortcut icon" href="./imgCodigo/laXarxaFavicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
 
    
</head>

<body>

<?php

$title ="Subscripcion";
include ("header.php");
include_once ("funciones.php");
session_start();
$idUser = $_SESSION["idUsuario"];
$usuario =$_SESSION["usuario"]; 
$array1 = obtener_subscripciones($idUser);
$array2 = obtener_target($idUser);
$subscripciones = array_merge($array1,$array2);


$subscripcionErr="";


?>
<div class="row">
    <div class="col-3"></div>
    <div class="col-6">


<div id="entradaDatos" class = "container pt-3 pb-3 mt-3 bg-light shadow-lg">
<p name=" usuario"><strong>HOLA <?=$usuario;?>. Aqui puedes actualizar tus subscripciones! </strong></p>
<form method="" action = "">
        <div id= "tSubscripciones" class="form-check">      
            
<?php     foreach ($subscripciones as $row) {
    
    echo '<div id="div'.$row["id"].'" class="form-check"> ';
    echo '<span id= "span'.$row["id"].'" hidden >'.$row["existe"].'</span>';
    echo' <input class="form-check-input" type ="checkbox" id = "check' 
            .$row["id"]. '" name="checkBox" value=' 
            .$row["id"].' ';
    if ($row["activa"] == 1){ echo ' checked';};
    echo '>';
    echo '<label class ="form-check-label">'. $row["nombre"] .' '.$row["apellido"].'</label></div>';
};

?>
        </div>    
		<span class="error" style="color:red;"><?=$subscripcionErr;?></span>
        <div class="form-floating mb-1 mt-3"> 
            <input class="btn btn-primary"type="button" name="submit" value="Aceptar"  onclick="javascript:upSubscripciones(<?=$idUser;?>);">
<!-- el input debe ser de tipo button para que no refresque la pagina -->
        </div>
</form>
</div>


<div class = "container pt-3 pb-3 mt-3 bg-light shadow-lg">
    <a class="btnStack" href = "laXarxaTonitter.php"> Cerrar editor </a>
</div>
</div>
<div class="col-3"></div>
</div>
<?php include ("footer.php") ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script language="JavaScript" type="text/javascript" src="funciones.js"></script>

<body>
</html>


