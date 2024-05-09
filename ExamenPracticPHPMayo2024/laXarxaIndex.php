<html>

    <head>
        <title> VerFiles.php Lee lista de ficheros en un directorio y presenta tabla PHP con links a Delete y Rename</title>
        <meta charset="utf-8" >
        <meta description="Basecon favicon">
        <link rel="shortcut icon" href="laXarxaFavicon.png">
        <link rel="canonical" href="https://multitod.com/iconos-para-paginas-web-codigo-php.php" />
       
        <style>
          
        </style>
   
    
    <?php
        include ("header.php");
       
        // $pwdGuardado = "8a86ac34c87befc560c6b596117c91cd"; //beluca
        // $pwdGuardado = "a94652aa97c7211ba8954dd15a3cf838"; // juan
        // $pwdGuardado = "aefe34008e63f1eb205dc4c4b8322253"; // toni
        // $pwdGuardado= md5('nombre');
    
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

                    $_SESSION["arrayPosts"] = array(
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
                unset($_POST["signIN"]);
               
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
            Usuario  : <input type="text" name="user" value= "<?=$user;?>"> <br><br>
            Password: <input type="password" name="pwd" value= "<?=$pwd;?>">   <br>
            Recordar: <input type="checkbox" name="recordar" value="Si" <?php if ($checked) echo "checked"; ?>><br><br>
            <button type="submit" name="signIn" value="SignIn">Sign In </button>
            <a href = "laXarxaRegistro.php" name="signUp" value="Sign Up">Sign Up </a> 
            <!-- > value es el txt que muestra el boton. Es "Enviar" por defecto. 
            El indice en el POST es el name <-->
        </form>
    </div>
</body>
</html>           