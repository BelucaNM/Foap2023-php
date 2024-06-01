<html>
<head>
    <title> Buscar mensajes de un usuario </title>
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
    $title ="Busqueda de mensajes";
    include ("header.php");
    include_once "funciones.php";
    
    session_start();
    $error= $user= $mensajes = "";
  
    if (isset($_SESSION["usuario"])) { // Identificación Correcta . En XarxaPrivada
        $usuario =$_SESSION["usuario"];
        $idUsuario =$_SESSION["idUsuario"]; 

    } else {
        echo "La sesión no esta abierta o no tengo todavia ningun resultado"  ;
        header ("location:formLogin.php ");
    };
    

    if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST['signIn'])) { // verificar entrada por formulario
    
        if (empty($_POST["user"]))  {
            $error= "Introduzca Usuario y Password";
        } else {
            $user = $_POST["user"];
            $identificador = busca_idPersona_porUser($user);
            if (is_null($identificador)) {
                $error = " No hay mensajes desde este perfil ";
            }else{
                $usuarioYsubs[] = $identificador; // se mostraran los mensajes de usuario logeado
                $mensajes = obtener_mensajes($usuarioYsubs); // busca mensajes del user 
            };
        };
    };
    ?>

    <div  id="laXarxa" class = "container pt-3 pb-3 mt-3 bg-light shadow-lg">
    <p name=" usuario"><strong>HOLA <?=$usuario;?> !</strong></p>
    <div  id="buscarMensajes" class = "container pt-3 pb-3 mt-3 bg-light shadow-lg">
            <form method="post" ref="">
            <span><?=$error;?></span>
            <div class="form-floating mb-3 mt-3">
                <input type="text" class="form-control"  id= "user" name="user" value= "<?=$user;?>" placeholder="Introduzca usuario"> 
                <label for ="user">Usuario</label> 
            </div> 
            <div>
                <input class="btn btn-primary" type="submit" name="signIn" value="Sign In">
            </div>
            </form>
    
    <?php  
    
    if (property_exists($mensajes,'num_rows')&& ($mensajes->num_rows > 0)) {
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
        } else {
            $error = " No se han encontrado mensajes de este usuario";
            unset($_POST["signIn"]);   
        };
    
    ?>
    </div>
    <?php include ("footer.php");?>
</body>
</html>