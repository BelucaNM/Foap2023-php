<html>

	<head>
		<title> Ejercicio 12 Login</title>
		<meta charset="utf-8" >
  		<meta description="Basecon favicon">
  		<link rel="shortcut icon" href="./imagenes/faviconTest.png">
  		
  	<style>
	</style>
	</head>

	
<body>
	<!-- ><header></header> <-->
	<?php 
    include ("header.php");
        // phpinfo();
		 /* comentario 
		 varias lineas */
		 // comentario una linea

         // Print "\n"  Salto de página; con doble comilla "" se interpretan las variables $ dentro
         // Echo "<br>" Saldo de pagina
    
    
 
    ?>
    <?php
    // $pwdGuardado = "8a86ac34c87befc560c6b596117c91cd"; //beluca
    // $pwdGuardado = "319f4d26e3c536b5dd871bb2c52e3178";

    //$pwdGuardado= md5('beluca');
    $usuarios = array(
        array(
            "nombre" => "beluca",
            "password" => "beluca"
        ),
        array(
            "nombre" => "juan",
            "password" => "juan"
    
        ),
        array(
            "nombre" => "toni",
            "password" => "toni",
        )
        );


   
    $user = $pwd = "";

    If (isset($_POST["enviar"]))
    {
        echo "Entro en rutina de verificacion <br> ";
        print_r($_POST);
                
        If (isset ($_POST["user"]) && isset ($_POST["pwd"])) 
        {
            
            foreach ($usuarios as $usuario) 
            {
                if ($usuario["nombre"] == $_POST["user"]) 
                {
                   
                    if ($usuario["password"] == $_POST["pwd"]) 
                    {
                        echo "Todo es correcto ";
                        session_start();
                        $_SESSION["laSesion"] = "prueba";

                        header("Location:homeEjercicio12.php");



                        
                    }
                    else  
                    {
                        echo "Contraseña/User incorrecto <br> ";
                    }
                    
                } 
              
                else 
                {
                    echo "User incorrecto <br> ";
                }
            }
           
        
        
        unset ( $_POST["enviar"]);
        $user = $_POST['user'];
        $pwd = $_POST['pwd'];

    }
    }
    ?>
    <div id="login">
    <form  method="post">
        Usuario: <input type="text" name="user" value="<?php echo $user;?>"><br>
        Password: <input type="text" name="pwd" value="<?php echo $pwd;?>"><br>
        <input type="submit" name= "enviar" value="Submit"> 
        <!-- > value es el txt que muestra el boton. Es "Enviar" por defecto. 
            El indice en el POST es el name <-->
    </form>
    </div>
     
        
   <!-- > <footer></footer> <-->
	<?php include ("footer.php")?>
	</body>


</html>