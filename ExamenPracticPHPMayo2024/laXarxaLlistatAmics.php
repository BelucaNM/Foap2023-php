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

    $amicsTodos = array(
        array(
            "nom"=> "Pepito",
            "cognom"=> "Grillo",
            "imatge"=> "https://images.pexels.com/photos/774909/pexels-photo-774909.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
             ),
        array    (
            "nom"=> "Pinocho",
            "cognom"=> "nas llarg",
            "imatge"=> "https://images.pexels.com/photos/1222271/pexels-photo-1222271.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
            ),
        array    (
            "nom"=> "Geppeto",
            "cognom"=> "constructor de ninots",
            "imatge"=> "https://images.pexels.com/photos/91227/pexels-photo-91227.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
            ),
        array    (
            "nom"=> "Pepito",
            "cognom"=> "Pérez",
            "imatge"=> "https://images.unsplash.com/photo-1547425260-76bcadfb4f2c?w=400&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8cGVyc29uYXxlbnwwfHwwfHx8MA%3D%3D",
            ),
        array    (
            "nom"=> "Pepet",
            "cognom"=> "i Marierta",
            "imatge"=> "https://plus.unsplash.com/premium_photo-1664536392896-cd1743f9c02c?w=400&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MzN8fHBlcnNvbmF8ZW58MHx8MHx8fDA%3D",
            )
            
        );
    // $amicsTodos = $_SESSION["arrayAmics"]; //otra Posible implementacion .Los datos se recuperan de la sesion 
    
    $nom = $cognom = $error= "";
    $amics = $amicsTodos;

    if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST['submit'])) { // verificar entrada por formulario
    
    //  print_r ( $_POST);
        

    if (empty($_POST["nom"]) && empty($_POST["cognom"])) {

        $error= "Debe introducir almenos un campo : Nombre o Apellido";
    
    } else { //seleccion

        $amics = array ();

        function validate_input($input){ // sanear datos
            $input = trim ($input);
            $input = htmlspecialchars ($input);
            $input = stripslashes ($input);
            return $input;
        };
    
        $nom = validate_input ($_POST['nom']);
        $cognom = validate_input ($_POST['cognom']);
        
        foreach ($amicsTodos as $amic) {
                    
            if (($amic["nom"] == $nom) || ($amic["cognom"] == $cognom)) {
                array_push ( $amics, $amic); // añade el array en seleccion
                };
        
        };
    };
    };

    if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST['submitAvan'])) { // verificar entrada por formulario
    
        //  print_r ( $_POST);
            
    
        if ((empty($_POST["nom"]) && empty($_POST["cognom"])) || 
            (strlen($_POST["nom"])<3) && (strlen($_POST["cognom"])<3))  {
    
            $error= "Debe introducir al menos tres caracteres de uno de los campos" ;
        
        } else { //seleccion
    
            $amics = array ();
    
            function validate_input($input){ // sanear datos
                $input = trim ($input);
                $input = htmlspecialchars ($input);
                $input = stripslashes ($input);
                return $input;
            };
        
            $patternNom = "/".validate_input ($_POST['nom'])."/";
            $patternCognom = "/".validate_input ($_POST['cognom'])."/";

           foreach ($amicsTodos as $amic) {
                
                
                if ( ($patternNom !="//") && (preg_match($patternNom, $amic["nom"])) || 
                     ($patternCognom !="//") &&(preg_match($patternCognom, $amic["cognom"])) ){
                    array_push ($amics, $amic) ; // añade el array en seleccion
                };
                        
            };
        };
    };


    ?>
    <div id="buscarAmics">
        <h3><?=$error ?></h3>
        <form method="post">
            <div>
                <label >Nombre:</label>   
                <input type="text" name="nom" value= "<?=$nom;?>"> 
            </div> <br>
            <div>
                <label>Apellido: </label> 
                 <input type="text" name="cognom" value= "<?=$cognom;?>">   
            </div> <br>
           <input type="submit" name="submit" value="Buscar">
           <input type="submit" name="submitAvan" value="Buscador Avanzado">
            <!-- > value es el txt que muestra el boton. Es "Enviar" por defecto. 
            El indice en el POST es el name <-->
        </form>
    </div>
    <div id="llistaAmics">
        <p name=" usuario"><strong>HOLA <?=$user;?> !</strong></p>
        <a class="btnStack" href="logOut.php">Log Out</a>
    </div>
    <div class="lasCards"> 
    <?php  

    
    foreach ( $amics as $amic){

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