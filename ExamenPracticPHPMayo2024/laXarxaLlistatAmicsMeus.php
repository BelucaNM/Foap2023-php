<html>
<head>
    <title> laXarxaLlistatAmics </title>
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

    $amicsPwd = array(
        array(
            "username"=> "juan",
            "password"=> "12345",
            "amics"=> array
                        (array ( 
                        "nom"=> "Ikram",
                        "cognom"=> "Bghiel",
                        "imatge"=> "https://unsplash.com/es/fotos/fotografia-de-enfoque-superficial-de-mujer-al-aire-libre-durante-el-dia-rDEOVtE7vOs",
                        ),
                        array (
                        "nom" =>  "Toni",
                        "cognom"=> "Oller",
                        "imatge"=> "https://unsplash.com/es/fotos/foto-en-escala-de-grises-de-un-hombre-c_GmwfHBDzk",
                        ),
                        array (
                        "nom"=> "Neus",
                        "cognom" => "Vidal",
                        "imatge" => "http=>https://unsplash.com/es/fotos/fotografia-de-enfoque-superficial-de-mujer-al-aire-libre-durante-el-dia-rDEOVtE7vOs",
                        ))

        ),
        array (
                "username" => "ikram",
                "password" => "12345",
                "amics"=> array (
                        array ( 
                        "nom"=> "Pepito",
                        "cognom"=> "Grillo",
                        "imatge"=> "https://unsplash.com/es/fotos/foto-en-escala-de-grises-de-un-hombre-c_GmwfHBDzk",
                        ),
                        array (
                        "nom" => "Pinoxo",
                        "cognom" => "nas llarg",
                        "imatge"=> "https://images.unsplash.com/photo-1547425260-76bcadfb4f2c?w=400&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8cGVyc29uYXxlbnwwfHwwfHx8MA%3D%3D",
                        ),
                        array(
                        "nom"=> "Geppeto",
                        "cognom"=> "constructor de ninots",
                        "imatge"=> "https://plus.unsplash.com/premium_photo-1664536392896-cd1743f9c02c?w=400&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MzN8fHBlcnNvbmF8ZW58MHx8MHx8fDA%3D",
                        ))
        )
);

  
//   print_r ($amicsPwd) ;
    $nom = $cognom = $error= "";
    $arrayAmics = array ();
    $arrayTemp = array();
   

    ?>
    <div id="verAmics">
        <h3><?=$error ?></h3>
        
    </div>
    <div id="llistaAmicsMeus">
        <p name=" usuario"><strong>HOLA <?=$user;?> !</strong></p>
        <a class="btnStack" href="logOut.php">Log Out</a>
    </div>
    <div class="lasCards"> 
    <?php  

    for ($i =0; $i < count($amicsPwd); $i++) {
        echo ($amicsPwd[$i]["username"]);
        echo($user."<br>");

        if (($amicsPwd[$i]["username"] == $user)) {
            $arrayAmics = $amicsPwd[$i]["amics"];
            echo("******************<br>");
            print_r ($arrayAmics) ; 
            echo("******************<br>");
            

    }};
    print_r ($arrayAmics) ;  
 
    $amic = array ();        
    foreach ( $arrayAmics as $amic){
        $nom = $amic["nom"];
        $cognom = $amic["cognom"];
        $imagen = $amic ["imatge"];
    
    ?>
    
    <div class="card">
        <h2>Card</h2>
        <img src="<?= $imagen ?>">
        <div class="container">
            <h4><b><?= $nom ?></b></h4> 
            <p><?= $cognom ?></p> 
        </div>
    </div>
    <?php
    };
    ?>
    </div>
    <?php include ("footer.php") ?>
</body>
</html>