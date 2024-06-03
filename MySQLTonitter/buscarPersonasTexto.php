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
    $title ="Busqueda de Personas";
    include ("header.php");
    include_once "funciones.php";
    
    session_start();
    $error= $texto= "";
    $usuarios = [];
  
    if (isset($_SESSION["usuario"])) { // Identificación Correcta . En XarxaPrivada
        $usuario =$_SESSION["usuario"];
        $idUsuario =$_SESSION["idUsuario"]; 

    } else {
        echo "La sesión no esta abierta o no tengo todavia ningun resultado"  ;
        header ("location:formLogin.php ");
    };
    

    if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST['signIn'])) { // verificar entrada por formulario
    
        if (empty($_POST["texto"]))  {
            $error= "Introduzca Texto";
        } else {
            $texto = $_POST["texto"];
            $usuarios = busca_usuarios_porTexto($texto);
            if (is_null($usuarios)) {
                $error = " No hay usuarios con este texto en su nombre";
            
            };
        };
    };
    ?>
    <div class="row">
    <div class="col-3"></div>
    <div class="col-6">

<!--    <div  id="laXarxa" class = "container pt-3 pb-3 mt-3 bg-light shadow-lg"> -->
    <p name=" usuario"><strong>HOLA <?=$usuario;?> !</strong></p>
    <div  id="buscarMensajes" class = "container pt-3 pb-3 mt-3 bg-light shadow-lg">
            <form method="post" ref="">
            <span><?=$error;?></span>
            <div class="form-floating mb-3 mt-3">
                <input type="text" class="form-control"  id= "texto" name="texto" value= "<?=$texto;?>" placeholder="Introduzca usuario"> 
                <label for ="texto">Texto</label> 
            </div> 
            <div>
                <input class="btn btn-primary" type="submit" name="signIn" value="Buscar">
            </div>
            </form>
            <div class = "container pt-3 pb-3 mt-3 bg-light shadow-lg">
                <a class="btnStack" href = "laXarxaTonitter.php"> Cerrar Buscador </a>
            </div>
    </div>
    
    <?php  
    
    if (count($usuarios) != 0) {
        // output data of each row
            foreach($usuarios as $row) {
                
    ?>
               <div  id="soyUsuario" class = "container pt-3 pb-3 mt-3 bg-light shadow-lg">
                <div class="card-header"></div>
                <div class="card-body bg-light">
<!-- >              <img class="card-img-top" src="<?= $row["imagenURL"];?>" alt="<?= $row["imagenURL"];?>"> <-->
                    <h6 class = "card-title"></h6>
                    <p class  = "card-text"><?= $row["nombre"]." ".$row["apellido"];?></p> 
                                          
                </div>
                <div class="card-footer">Usuario número :<?= $row["id"]; ?></div>
                </div>
    <?php
            };
        } else {
            $error = " No se han encontrado usuarios con este texto";
            unset($_POST["signIn"]);   
        };
    
    ?>
    
    </div>
    <div class="col-3"></div>
    </div>
    <?php include ("footer.php");?>
</body>
</html>