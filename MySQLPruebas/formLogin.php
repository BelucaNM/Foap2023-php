<html>

    <head>
        <title> MySQLPruebas loginForm.php </title>
        <meta charset="utf-8" >
        <meta description="Basecon favicon">
<!-- > <link rel="canonical" href="https://multitod.com/iconos-para-paginas-web-codigo-php.php" /> <-->
        <link rel="stylesheet" type="text/css" href="estilo.css" title="style" />
 
    
    <?php
      
        include_once "funciones.php";
        $user = $pwd = $sql = $error= $result = "";

    
        if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST['signIn'])) { // verificar entrada por formulario
    
            if (empty($_POST["user"]) || empty($_POST["pwd"])) {
                $error= "Introduzca Usuario y Password";
            } else {
                $username = validate_input ($_POST['user']);
                $password = validate_input ($_POST['pwd']);

                $error = existe_User ($username, $password) ;
                if ($error !== "") { // credenciales  correctas  , abre session y cookies
                    session_start([
                        'use_only_cookies'=> 1,
                        'cookie_lifetime'=> 0,
                        'cookie_secure'=> 1,
                        'cookie_httponly'=> 1
                    ]);
                    $_SESSION["usuario"] = $_POST["user"]; // inicia session
                    $cookie_name ="remember_me[0]";
                        $cookie_value =$md5_password;
                        $cookie_expiry_time = time() + (24*3600); // un dia
                        setcookie($cookie_name,$cookie_value,$cookie_expiry_time,"/","",true,true);

                    header("Location:laXarxaTonitter.php"); 
                } else {
                    
                    $error = 'Error en validación. Reintroduzca datos'; // credenciales no correctas
                    unset($_POST["signIn"]);
                    if (isset($_POST["user"])) {$user = $username;};
                    if (isset($_POST["pwd"]))  {$pwd = $password;};
                    if (isset($_POST["recordar"]))  {$checked = 1;};
                    };
                }
            };
                     

        if (isset($_GET['nuevoRegistro'])){ //vengo desde formRegistro 
            $error = "Se ha dado de alta en APP. Por favor introduzca credenciales para acceso.";
        };
        ?>


</head>
<body>

    
<?php include ("header.php");?> 
    <div id="login">
            <form method="post">
            <div>
                <label >Usuario:</label>   
                <input type="text" name="user" value= "<?=$user;?>"> 
            </div> <br>
            <div>
                <label>Password: </label> 
                <input type="text" name="pwd" value= "<?=$pwd;?>">   
            </div> <br>
            Seleccione para recordar: <input type="checkbox" name="recordar" value="Si" <?php if ($checked) echo "checked"; ?>><br><br>
            
                
            <div>
                <input type="submit" name="signIn" value="Sign In">
                <br><span><?=$error;?></span><br>

            </div>
            <!-- > value es el txt que muestra el boton. Es "Enviar" por defecto. 
            El indice en el POST es el name <-->
        </form>
    </div>
    <div>
        <a class = "btnStack"  href = "formRegistro.php" name="signUp" value="Sign Up">Sign Up</a> 
    </div>
  
<?php include ("footer.php");?>  

</body>
</html>           