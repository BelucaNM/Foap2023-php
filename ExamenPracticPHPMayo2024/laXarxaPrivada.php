<html>
<head>
    <title> La Xarxa Privada </title>
    <meta charset="utf-8">
    <meta description="Basecon favicon">
    <link rel="shortcut icon" href="laXarxaFavicon.png">
    <link rel="canonical" href="https://multitod.com/iconos-para-paginas-web-codigo-php.php" />
    <link rel="stylesheet" type="text/css" href="laXarxa.css" title="style" />
        
</head>

<body>

    <?php
    include ("header.php");
    session_start();
  
    if (isset($_SESSION["usuario"])) { // Identificación Correcta . En XarxaPrivada
        $user =$_SESSION["usuario"]; 

    } else {
        echo "La sesión no esta abierta o no tengo todavia ningun resultado"  ;
        header ("location:laXarxaIndex.php ");
    };

    ?>
    <div id="laXarxaPrivada">
        <p name=" usuario"><strong>HOLA <?=$user;?> !</strong></p>
        <a class="btnStack" href="logOut.php">Log Out</a>
    </div>
    <a class="btnStack" href='addPostForm.php' > Añadir una publicacion </a> 
    <div class="lasCards"> 
    <?php  
    /* Los datos se guardan en sesion  al abrir la sesion 
    $posts = array(
        array(
            "titulo"=> "id labore ex et quam laborum",
            "descripcion"=> "laudantium enim quasi est quidem magnam voluptate ipsam eos\ntempora quo m",
            "imagen" => "./laXarxaImagenes/red-delicious_22_645x400.jpeg",
            "comentario" => ""
        ),
        array(
            "titulo" => "quo vero reiciendis velit simil",
            "descripcion" => "est natus enim nihil est doloreostrum voluptatem reiciendis et",
            "imagen"  => "./laXarxaImagenes/taronges-1kg-aprox-.jpg",
            "comentario" => ""
        ),
        array(
            "titulo"=> "odio adipisci rerum aut animi",
            "descripcion"=> "quia molestiae reprehenderit quasi aspernatur\naut expedita occ ratione",
            "imagen" => "./laXarxaImagenes/cireres-600.gif",
            "comentario" => ""
        )
            
    );
    */
    $posts = $_SESSION["arrayPosts"]; //Los datos se recuperan de la sesion 

    foreach ( $posts as $post){

        $titulo = $post["titulo"];
        $descripcion = $post["descripcion"];
        $imagen = $post ["imagen"];
        $comentario = $post ["comentario"];
    ?>
    
    <div class="card">
        <h2>POST</h2>
        <img src="<?= $imagen ?>">
        <div class="container">
            <h4><b><?= $titulo ?></b></h4> 
            <p><?= $descripcion ?></p> 
        </div>
        <div>
            <a href='' ><span class="icoLike">&#128077;</span></a>
            <input placeholder = "introduzca su comentario" value= "<?=$comentario;?>">
        </div>
    </div>
    <?php
    };
    ?>
    </div>
    <?php include ("footer.php") ?>
</body>
</html>