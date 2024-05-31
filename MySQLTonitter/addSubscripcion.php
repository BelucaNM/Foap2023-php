<html>
<head>
    <title> AddSubscripcion.php </title>
    <meta charset="utf-8">
    <meta description="Basecon favicon">
    <link rel="shortcut icon" href="laXarxaFavicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> 

</head>

<body>

<?php

$title ="Subscripcion";
include ("header.php");
include_once "funciones.php";
session_start();
$idUser = $_SESSION["idUsuario"]; 

if (isset($_POST['submit'])) { // validaciones

};

?>
<div id="entradaDatos" class = "container pt-3 pb-3 mt-3 bg-light shadow-lg">
<form method="POST" action = "">
        <div class="form-check">      
            <?php $subscripcionErr = creaSelSubscripcion($idUser);?>
        </div>    
		<span class="error" style="color:red;"><?=$subscripcionErr;?></span>
        <div class="form-floating mb-1 mt-3"> 
            <input class="btn btn-primary"type="submit" name="submit" value="Aceptar">
        </div>
</form>
</div>

<div class = "container pt-3 pb-3 mt-3 bg-light shadow-lg">
    <a class="btnStack" href = "laXarxaTonitter.php"> Cerrar editor </a>
</div>
<?php include ("footer.php") ?>
</body>
</html>