<html>

    <head>
        <title> MySQLPruebas loginForm.php </title>
        <meta charset="utf-8" >
        <meta description="Basecon favicon">
<!-- > <link rel="canonical" href="https://multitod.com/iconos-para-paginas-web-codigo-php.php" />
        <link rel="stylesheet" type="text/css" href="estilo.css" title="style" /><-->
 
    
    <?php
//      include ("header.php");
        include_once "funciones.php";
        $user = $pwd = $sql = $error= $result = "";

    
        if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST['signIn'])) { // verificar entrada por formulario
    
            if (empty($_POST["user"]) || empty($_POST["pwd"])) {
                $error= "Introduzca Usuario y Password";
            } else {
                $username = validate_input ($_POST['user']);
                $password = validate_input ($_POST['pwd']);

                $error = existe_User ($username, $password) ;
                if ($error !== "") { // credenciales  correctas 
                    
                        unset($_POST["signIn"]);
                        if (isset($_POST["user"])) {$user = $username;};
                        if (isset($_POST["pwd"]))  {$pwd = $password;};
                    };
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
                <label>Password: </label> 
                <input type="text" name="pwd" value= "<?=$pwd;?>">   // text para que se vea
            </div> <br>
                <input type="submit" name="signIn" value="Sign In">
            <div>
                
                EL ERROR = <span>"<?=$error;?>"</span><br>
            </div> <br>
            <!-- > value es el txt que muestra el boton. Es "Enviar" por defecto. 
            El indice en el POST es el name <-->
        </form>
    </div>
<!-- >   
< //?php include ("footer.php"); ?>  
<-->

</body>
</html>           