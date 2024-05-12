<html>

    <head>
        <title> laXarxaIndex.php </title>
        <meta charset="utf-8" >
        <meta description="Basecon favicon">
        <link rel="shortcut icon" href="laXarxaFavicon.png">
        <link rel="canonical" href="https://multitod.com/iconos-para-paginas-web-codigo-php.php" />
        <link rel="stylesheet" type="text/css" href="laXarxa.css" title="style" />
          
 
    
    <?php
        include ("header.php");
       
        // $pwdGuardado = "8a86ac34c87befc560c6b596117c91cd"; corresponde a "beluca"
        // $pwdGuardado = "a94652aa97c7211ba8954dd15a3cf838"; corresponde a "juan"
        // $pwdGuardado = "aefe34008e63f1eb205dc4c4b8322253"; corresponde a "toni"
        // $pwdGuardado= md5('nombre');

        //Utilizo un array de tres usuarios
    
        $usuarios = array(
            array( "nombre" => "beluca", "password" => "8a86ac34c87befc560c6b596117c91cd" ),
            array( "nombre" => "juan",   "password" => "a94652aa97c7211ba8954dd15a3cf838" ),
            array( "nombre" => "toni",   "password" => "aefe34008e63f1eb205dc4c4b8322253" )
        );
           
        $user = $pwd = $error= $checked = "";
        function validate_input($input){ // sanear datos
            $input = trim ($input);
            $input = htmlspecialchars ($input);
            $input = stripslashes ($input);
            return $input;
        
        }
        if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST['signIn'])) { // verificar entrada por formulario
    
            $username = validate_input ($_POST['user']);
            $password = validate_input ($_POST['pwd']);

            
//            print_r ( $_POST);

            if (empty($_POST["user"]) || empty($_POST["pwd"])) {
                $error= "Introduzca Usuario y Password";
            } else {

                $md5_password = md5($password);
    
                foreach ($usuarios as $usuario) {
                    
                    if (($usuario["nombre"] == $username) && ($usuario["password"] == $md5_password)) 
                {
                    session_start([
                        'use_only_cookies'=> 1,
                        'cookie_lifetime'=> 0,
                        'cookie_secure'=> 1,
                        'cookie_httponly'=> 1
                    ]);
                    $_SESSION["usuario"] = $_POST["user"]; // inicia session

            // Se trabaja sin DB
            // Se guarda en SESSION un array con tres publicaciones para simulacion

                    $_SESSION["arrayPosts"] = array(
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

                    if (isset($_POST['recordar'])) { // crear una cookie para recordar el usuario con password encriptada

                        $cookie_name ="remember_me[0]";
                        $cookie_value =$md5_password;
                        $cookie_expiry_time = time() + (24*3600); // un dia
                        setcookie($cookie_name,$cookie_value,$cookie_expiry_time,"/","",true,true);
                        
                        $cookie_name ="remember_me[1]";
                        $cookie_value =$username;
                        setcookie($cookie_name,$cookie_value,$cookie_expiry_time,"/","",true,true);
                        
                    }
                    // echo "Entro en xarxa Privada ";
                        header("Location:laXarxaPrivada.php");          
                } }   
                
                $error = 'Error en validación. Reintroduzca datos'; // credenciales no correctas
                unset($_POST["signIn"]);
               
                if (isset($_POST["user"])) {$user = $username;};
                if (isset($_POST["pwd"]))  {$pwd = $password;};
                if (isset($_POST["recordar"]))  {$checked = 1;};
                
            }
        };

        if (isset($_GET['nuevoRegistro'])){ //vengo desde laXarxaRegistro 
            $error = "Se ha dado de alta en La Xarxa. Por favor introduzca credenciales para acceso.";
        };
        ?>


</head>
<body>

    <div id="login">
        <h3><?=$error ?></h3>
        <form method="post">
            <div>
                <label >Usuario:</label>   
                <input type="text" name="user" value= "<?=$user;?>"> 
            </div> <br>
            <div>
                <label>Password: </label> 
                 <input type="password" name="pwd" value= "<?=$pwd;?>">   
            </div> <br>
            Seleccione para recordar: <input type="checkbox" name="recordar" value="Si" <?php if ($checked) echo "checked"; ?>><br><br>
            <input type="submit" name="signIn" value="Sign In">
            <!-- > value es el txt que muestra el boton. Es "Enviar" por defecto. 
            El indice en el POST es el name <-->
        </form>
    </div>
    <div>
        <a class = "btnStack"  href = "laXarxaRegistro.php" name="signUp" value="Sign Up">Sign Up </a> 
    </div>
    <?php include ("footer.php"); ?>

</body>
</html>           