<html>
<head>
    <title> Votar las encuestas </title>
    <meta charset="utf-8">
    <meta description="Basecon favicon">
    <link rel="shortcut icon" href=".\imgCodigo\laXarxaFavicon.png">
    <link rel="canonical" href="https://multitod.com/iconos-para-paginas-web-codigo-php.php" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> 
    

<!-- >    <link rel="stylesheet" type="text/css" href="estilo.css" title="style" /> <-->
        
</head>
<body>

    <?php
    $title ="Se muestran las encuestas activas";
    include ("header.php");
    include_once "funciones.php";
    
    session_start();
  
    if (isset($_SESSION["usuario"])) { // Identificación Correcta . En XarxaPrivada
        $usuario =$_SESSION["usuario"];
        $idUsuario =$_SESSION["idUsuario"]; 

    } else {
        echo "La sesión no esta abierta o no tengo todavia ningun resultado"  ;
        header ("location:formLogin.php ");
    };
    
    $encuestasArray = obtener_encuestas(); // devuelve las subscripciones existentes del usuario logeado 
    //ver formato del array en funcion obtener_; hay que obtener los id's
    // 
    
    ?>
    <div class="row">
    <div class="col-3"></div>
    <div class="col-6">

    <div  id="laXarxaTonitter" class = "container pt-3 pb-3 mt-3 bg-light shadow-lg">
    <p name=" usuario"><strong>HOLA <?=$usuario;?> !</strong></p>
    <a class="btnStack" href = "laXarxaTonitter.php"> Cerrar editor </a>
    </div>
    <div id="laTable" >
        <table class="table table-striped table-bordered table-sm">
            <thead class="thead-dark">
                
                <th scope="col">idEncuesta</th>
                <th scope="col">Titulo</th>
                <th scope="col">ElPregunton</th>
                <th scope="col">votar</th>
                
            </thead>
            <tbody>
    <?php  
    
    if ($encuestasArray->num_rows > 0) {
        // output data of each row
            while($row = $encuestasArray->fetch_assoc()) {
                
    ?>
    
        <tr>
            <td><?=$row["idEncuesta"];?> </td> <!-- Titulo de la encuesta -->
            <td><?=$row["titulo"];?> </td> <!-- Titulo de la encuesta -->
            <td><?=$row["username"];?> </td> <!-- Descripcion de la encuesta -->
            <td><a class="btnStack" href="timelineUsuario.html?enq=<?=$row['idEncuesta'];?>&usu=<?=$idUsuario;?>">Votar</a></td><!-- Ver la encuesta -->

        </tr>

    <?php
            };
        };
    
    ?>
            </tbody>
        </table
    </div>
    </div>
    <div class="col-3"></div>
    </div>
    <?php include ("footer.php"); ?>
</body>
</html>