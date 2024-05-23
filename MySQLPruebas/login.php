<html>

    <head>
        <title> laXarxaIndex.php </title>
        <meta charset="utf-8" >
        <meta description="Basecon favicon">
<!-- > <link rel="canonical" href="https://multitod.com/iconos-para-paginas-web-codigo-php.php" />
        <link rel="stylesheet" type="text/css" href="laXarxa.css" title="style" /><-->
          
 
    
    <?php
//        include ("header.php");
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

            
            if (empty($_POST["user"]) || empty($_POST["pwd"])) {
                $error= "Introduzca Usuario y Password";
            } else {
                // arranca conexion a BD
                $servername = "localhost";
                $adminuser = "root";
                $adminpwd = "";
                $dbname = "test";

                // Create connection
                $conn = new mysqli($servername, $adminuser, $adminpwd, $dbname);

                // Check connection

                if ($conn->connect_error) {
                    die("Connection failed: No se puede acceder a la Xarxa".$conn->connect_error);
                    
                } else {
                    $sql = "SELECT * FROM users WHERE username LIKE '$username' AND password LIKE '$password';";
                    echo ($sql);
                    $result = $conn->query($sql);
                    print_r ($result);
                    if ($result->num_rows ==1) 
                        {
                        session_start([
                            'use_only_cookies'=> 1,
                            'cookie_lifetime'=> 0,
                            'cookie_secure'=> 1,
                            'cookie_httponly'=> 1
                            ]);
                        $_SESSION["usuario"] = $_POST["user"]; // inicia session

                        if (isset($_POST['recordar'])) { // crear una cookie para recordar el usuario con password encriptada

                            $cookie_name ="remember_me[0]";
                            $cookie_value =$username;
                            $cookie_expiry_time = time() + (24*3600); // un dia
                            setcookie($cookie_name,$cookie_value,$cookie_expiry_time,"/","",true,true);
                            
                        };
                        // echo "Entro en aplicacion";
                        // header("Location:laXarxaPrivada.php");          
                    }else{   
                
                        $error = 'Error en validación. Reintroduzca datos'; // credenciales no correctas
                        unset($_POST["signIn"]);
                    };
               
                    if (isset($_POST["user"])) {$user = $username;};
                    if (isset($_POST["pwd"]))  {$pwd = $password;};
                    if (isset($_POST["recordar"]))  {$checked = 1;};
                    $conn->close();
                };
                
            };
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
<!-- >   
< //?php include ("footer.php"); ?>  
<-->

</body>
</html>           