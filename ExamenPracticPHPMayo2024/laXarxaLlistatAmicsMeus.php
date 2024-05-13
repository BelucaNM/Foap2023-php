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
            "amics"=> array (
                    array ( 
                        "nom"=> "Ikram",
                        "cognom"=> "Bghiel",
                        "imatge"=> "https://images.unsplash.com/photo-1438761681033-6461ffad8d80?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        ),
                        array (
                        "nom" =>  "Toni",
                        "cognom"=> "Oller",
                        "imatge"=> "https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
                        ),
                        array (
                        "nom"=> "Neus",
                        "cognom" => "Vidal",
                        "imatge" => "https://images.pexels.com/photos/733872/pexels-photo-733872.jpeg?cs=srgb&dl=pexels-olly-733872.jpg&fm=jpg",
                        ))

        ),
        array (
                "username" => "Ikram",
                "password" => "12345",
                "amics"=> array (
                        array ( 
                        "nom"=> "Pepito",
                        "cognom"=> "Grillo",
                        "imatge"=> "https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        ),
                        array (
                        "nom" => "Pinoxo",
                        "cognom" => "nas llarg",
                        "imatge"=> "https://images.unsplash.com/photo-1547425260-76bcadfb4f2c?w=400&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8cGVyc29uYXxlbnwwfHwwfHx8MA%3D%3D"
                        ),
                        array(
                        "nom"=> "Geppeto",
                        "cognom"=> "constructor de ninots",
                        "imatge"=> "https://plus.unsplash.com/premium_photo-1664536392896-cd1743f9c02c?w=400&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MzN8fHBlcnNvbmF8ZW58MHx8MHx8fDA%3D"
                        ))
        )
);

  
//   print_r ($amicsPwd) ;
    $nom = $cognom = $error= "";
    $arrayAmics = array ();

    ?>
    <div id="verAmics">
        <h3><?=$error ?></h3>
        
    </div>
    <div id="llistaAmicsMeus">
        <p name=" usuario"><strong> Lista de amigos de <?=$user;?></strong></p>
        <a class="btnStack" href="laXarxaPrivada.php">Volver</a>
    </div>
    <div class="lasCards"> 
    <?php  

    for ($i =0; $i < count($amicsPwd); $i++) {
        if (($amicsPwd[$i]["username"] == $user)) {
            $arrayAmics = $amicsPwd[$i]["amics"];
        
            };
        };
      
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

    <div class="lasCards">
    <p ><strong>SON AMIGOS DE TUS AMIGOS..</strong></p>
    <?php  

        $arrayPropuestas = array();

        foreach ( $arrayAmics as $amic){
            
            $nomAmic = $amic["nom"];
            
            for ($i =0; $i < count($amicsPwd); $i++) { 
      
                if (($amicsPwd[$i]["username"] === $nomAmic)) {

                    $arrayPropuestas = $amicsPwd[$i]["amics"];        
                    foreach ( $arrayPropuestas as $propuesta){
                        $nomPropuesta = $propuesta["nom"];
                        $cognomPropuesta = $propuesta["cognom"];
                        $imagenPropuesta = $propuesta ["imatge"];
    
    ?>
       
    <div class="card">
        <h2>Propuesta</h2>
        <img src="<?= $imagenPropuesta ?>">
        <div class="container">
            <h4><b><?= $nomPropuesta. " es amigo de ". $nomAmic ?></b></h4> 
            <p><?= $cognomPropuesta ?></p>     
        </div>
    </div>
    <?php
                    };
                };
            };
        };
    ?>
    </div>

<?php include ("footer.php") ?>
</body>
</html>