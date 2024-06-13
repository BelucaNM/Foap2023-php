<html>
<head>
    <title> La Xarxa Tonitter </title>
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
    $title ="Estás en LA XARXA";
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
    
    $usuarioYsubs = [$idUsuario]; // se mostraran los mensajes de usuario logeado
    $usersArray = obtener_subscripciones($idUsuario); // devuelve las subscripciones existentes del usuario logeado 
    //ver formato del array en funcion obtener_; hay que obtener los id's
    // 
    foreach ($usersArray as $valor) { // hay que seleccionar las subscripciones activas
        if ($valor['activa'] == 1) {$usuarioYsubs[] = $valor['id'];}
    }
    $mensajes = obtener_mensajes($usuarioYsubs); // busca mensajes del user y de sus subscriptores

    ?>
    <div class="row">
    <div class="col-3"></div>
    <div class="col-6">

    <div  id="laXarxaTonitter" class = "container pt-3 pb-3 mt-3 bg-light shadow-lg">
    <p name=" usuario"><strong>HOLA <?=$usuario;?> !</strong></p>
    <div class = "btn-group btn-group-sm">        
        <a type="button" class="btn btn-dark" href="logOut.php">Log Out</a>
        <a type="button" class="btn btn-light" href='addMensaje.php' >Añadir Mensajes</a>
        <a type="button" class="btn btn-light" href='addSubscripcion.php' >Añadir/borrar Subscripcion</a>  
        <a type="button" class="btn btn-light" href='registraEncuestaBS.html'>Añadir encuesta</a>
        <a type="button" class="btn btn-light" href='votarBDEncuesta.php'>Votar encuesta</a>  
    </div>
    <div class = "btn-group btn-group-sm">
        <a type="button" class="btn btn-light" href='buscarMensajesTexto.php' >Buscar: Mensajes</a> 
        <a type="button" class="btn btn-light" href='buscarPersonasTexto.php' >Personas</a>
        <a type="button" class="btn btn-light" href='buscarMensajesUsuario.php' >Mensajes/Persona</a>  
    </div>
    </div>

    
    <?php  
    
    if ($mensajes->num_rows > 0) {
        // output data of each row
            while($row = $mensajes->fetch_assoc()) {
                
    ?>
               <div  id="soyMensaje" class = "container pt-3 pb-3 mt-3 bg-light shadow-lg">
                <div class="card-header"></div>
                <div class="card-body bg-light">
                    <img class="card-img-top" src="<?= $row["imagenURL"];?>" alt="<?= $row["imagenURL"];?>">
                    <h4 class = "card-title"><?= $row["titulo"]; ?></h4>
                    <p class  = "card-text"><?= $row["nombre_user"]." ".$row["apellido_user"];?></p> 
                    <p class  = "card-text"><?= $row["fecha"]; ?></p> 
                    <p class  = "card-text"><?= $row["contenido"];?></p>                        
                </div>
                <div class="card-footer"></div>
                </div>
    <?php
            };
        };
    
    ?>
    </div>
    </div>
    <div class="col-3"></div>
    </div>
    <?php include ("footer.php"); ?>
</body>
</html>