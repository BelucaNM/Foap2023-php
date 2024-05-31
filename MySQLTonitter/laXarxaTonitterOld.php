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

    ?>
    <div  id="laXarxaTonitter" class = "container pt-3 pb-3 mt-3 bg-light shadow-lg">
    <p name=" usuario"><strong>HOLA <?=$usuario;?> !</strong></p>
    <div class = "btn-group btn-group-sm">        
        <a type="button" class="btn btn-dark" href="logOut.php">Log Out</a>
        <a type="button" class="btn btn-light" href='addMensaje.php' >Añadir Mensajes</a>
        <a type="button" class="btn btn-light" href='addSubscripcion.php' >Añadir/borrar Subscripcion</a>  
    </div>
    <div class = "btn-group btn-group-sm">
        <a type="button" class="btn btn-light" href='buscarMensajes.php' >Buscar: Mensajes</a> 
        <a type="button" class="btn btn-light" href='buscarPersonas.php' >Personas</a>
        <a type="button" class="btn btn-light" href='buscarMensajesPersona.php' >Mensajes/Persona</a>  
    </div>
    <div class = "btn-group btn-group-sm"> 
        <a type="button" class="btn btn-light" href="llistatAmics.php">Listado de  Amics</a>
    </div>
    </div>
    
    
    
    <?php  
    
    include 'conn_BD.php'; // conexion a BD
             
    $sql ="SELECT mensajes.id, mensajes.fecha, personas.nombre as nombre_user, personas.apellido as apellido_user,mensajes.titulo, 
                mensajes.contenido,mensajes.imagenURL 
                FROM mensajes 
                JOIN
                personas ON mensajes.idUser = personas.id ORDER BY fecha LIMIT 10";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
            while($row = $result->fetch_assoc()) {
    
                $id = $row["id"];
                $fecha = $row["fecha"];
                $nombre_user = $row["nombre_user"];
                $apellido_user = $row["apellido_user"];
                $titulo = $row["titulo"];
                $contenido = $row["contenido"];
                $imagenURL = $row ["imagenURL"];
                
    ?>
               <div  id="soyMensaje" class = "container pt-3 pb-3 mt-3 bg-light shadow-lg">
                <div class="card-header"></div>
                <div class="card-body bg-light">
                    <img class="card-img-top" src="<?= $imagenURL?>" alt="Card Image">
                    <h4 class = "card-title"><?= $titulo ?></h4>
                    <p class= "card-text"><?= $nombre_user." ".$apellido_user?></p> 
                    <p class= "card-text"><?= $fecha ?></p> 
                    <p class= "card-text"><?= $contenido ?></p>                        
                </div>
                <div class="card-footer"></div>
                </div>
    <?php
            };
        };
    
    include 'connClose_BD.php'; // cierra conexion a BD
    ?>
    </div>
    <?php include ("footer.php"); ?>
</body>
</html>