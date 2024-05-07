<html>

	<head>
		<title> Ejercicio 10 bis Como el 10 pero todo en el mismo codigo</title>
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

    $pwdGuardado= md5('beluca');

    $usuario = $pwd = "";
    If (isset($_POST["enviar"]))
    {
        echo "<p style='background-color:blue;'> Entro en rutina de verificacion </p> ";
        print_r($_POST);
                
        If (isset ($_POST["usuario"]) && ($_POST["usuario"]=="USER"))
        {
            
            if (md5($_POST["pwd"])== $pwdGuardado) 
                echo "<p style='color:green;'> Todo es correcto </p> ";
            else  
            echo "<p style='color:red;'> Contraseña/User incorrecto </p> ";
        
        } else echo "<p style='color:red;'> User incorrecto </p> ";
        unset ( $_POST["enviar"]);
        $usuario = $_POST['usuario'];
        $pwd = $_POST['pwd'];

    }
    ?>
    <div id="login">
    <form  method="post">
        Usuario: <input type="text" name="usuario" value="<?php echo $usuario;?>"><br>
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