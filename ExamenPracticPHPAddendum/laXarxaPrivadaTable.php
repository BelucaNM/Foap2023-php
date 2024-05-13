<html>
<head>
    <title> La Xarxa Privada</title>
    <meta charset="utf-8">
    <meta description="Basecon favicon">
    <link rel="shortcut icon" href="laXarxaFavicon.png">
    <link rel="canonical" href="https://multitod.com/iconos-para-paginas-web-codigo-php.php" />
        
    <style>
        <?php include "laXarxa.css"; ?>
    </style>
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
        <p name=" usuario"><strong>HOLA <?=$user;?></strong></p>
        <a href="logOut.php">LogOut</a>
    </div>

    <a href='addPostForm.php' > Añadir una publicacion </a></td> 
        
    <table> 
    <?php  
    /* Los datos se guardan en sesion  al abrir la sesion 
    $posts = array(
        array(
            "titulo"=> "id labore ex et quam laborum",
            "descripcion"=> "laudantium enim quasi est quidem magnam voluptate ipsam eos\ntempora quo m",
            "imagen" => "./laXarxaImagenes/red-delicious_22_645x400.jpeg"
        ),
        array(
            "titulo" => "quo vero reiciendis velit simil",
            "descripcion" => "est natus enim nihil est doloreostrum voluptatem reiciendis et",
            "imagen"  => "./laXarxaImagenes/taronges-1kg-aprox-.jpg"
        ),
        array(
            "titulo"=> "odio adipisci rerum aut animi",
            "descripcion"=> "quia molestiae reprehenderit quasi aspernatur\naut expedita occ ratione",
            "imagen" => "./laXarxaImagenes/cireres-600.gif",
        )
            
    );
    */
    $posts = $_SESSION["arrayPosts"]; //Los datos se guardan en la sesion 

    foreach ( $posts as $post){

        $titulo = $post["titulo"];
        $descripcion = $post["descripcion"];
        $imagen = $post ["imagen"];
    ?>
    <tr>
    <td><strong><?= $titulo ?></strong></td>
    <td><?= $descripcion ?></td>
    <td><img src="<?= $imagen ?>" width="50" height="50"</td>
    <td><a href='' ><span class="icoLike">&#128077;</span></a></td>
    <td><input placeholder = "introduzca su comentario"></td>
    </tr>
    <?php
    };
    ?>
    </table>

    

    
    <?php include ("footer.php") ?>
</body>
</html>