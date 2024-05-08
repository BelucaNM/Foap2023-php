<html>

    <head>
        <title> VerFiles.php Lee lista de ficheros en un directorio y presenta tabla PHP con links a Delete y Rename</title>
        <meta charset="utf-8" >
        <meta description="Basecon favicon">
        <link rel="shortcut icon" href="laXarxaFavicon.png">
        <link rel="canonical" href="https://multitod.com/iconos-para-paginas-web-codigo-php.php" />
       
        <style>
            
            
            td { border: 2px solid red;}
            table {border:  collapse; }
            
            
            
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
           
        $user = $pwd = $error= "";
        function validate_input($input){ // sanear datos
            $input = trim ($input);
            $input = htmlspecialchars ($input);
            $input = stripslashes ($input);
            return $input;
        
        }
        if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST['signIN'])) { // verificar entrada por formulario
    
            $username = validate_input ($_POST['user']);
            $password = validate_input ($_POST['pwd']);
            

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

                    if (isset($_POST['recordar'])) { // crear una cookie para recordar el usuario

                        $cookie_name ="remember_me";
                        $cookie_value =1;
                        $cookie_expiry_time = time() + (24*3600); // un dia
                        setcookie($cookie_name,$cookie_value,$cookie_expiry_time,"/","",true,true);
                        
                    }
                    // echo "Entro en xarxa Privada ";
                        header("Location:laXarxaPrivada.php");          
                } }   
                
                $error = 'Error en validación. Reintroduzca datos'; // credenciales no correctas
                unset($_POST["signIN"]);
               
                if (isset($_POST["user"])) {$user = $username;};
                if (isset($_POST["pwd"]))  {$pwd = $password;};
                
            }
        };
        ?>


</head>
<body>

    <div id="login">
        <h3><?=$error ?></h3>
        <form method="post">
            Usuario  : <input type="text" name="user" value= "<?=$user;?>"> <br><br>
            Password: <input type="password" name="pwd" value= "<?=$pwd;?>">   <br>
            Recordar: <input type="checkbox" name="recordar" value="0"><br>
            <button type="submit" name="signIN" value="Sign In">Sign In </button>
            <button type="submit" name="signUp" value="Sign Up">Sign Up </button> 
            <!-- > value es el txt que muestra el boton. Es "Enviar" por defecto. 
            El indice en el POST es el name <-->
        </form>
    </div>
</body>
</html>           