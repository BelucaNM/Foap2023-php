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
    
         $nombreErr = $apellidosErr = $edadErr = $emailErr = "";
         $nombre = $apellidos = $edad = $email = $comentario= "";
         $error= false;
 
    if (isset($_POST["enviar"]))
    {
        echo "<p style='background-color:blue;'> Entro en rutina de verificacion </p> ";
        print_r($_POST);

       

        if (!isset ($_POST["nombre"]) || empty ($_POST["nombre"])) 
            {$nombreErr= " Nombre requerido"; $error = true;}
            else $nombre = $_POST["nombre"];
        if (!isset ($_POST["apellidos"]) || empty ($_POST["apellidos"])) 
            {$apellidosErr= " Apellidos requerido"; $error = true;}
            else $apellidos = $_POST["apellidos"];
        if (!isset ($_POST["email"]) || empty ($_POST["email"])) 
            {$emailErr=  " Email requerido";$error = true;}
            else $email = $_POST["email"];
        if (isset ($_POST["edad"]) && ($_POST["edad"] <18)) 
            {$edadErr=  " Debe ser mayor de 18 años";$error = true;}
            else $edad = $_POST["edad"];
        if (isset ($_POST["comentario"])) 
            {$comentario = $_POST["comentario"];    }
        if (!$error)  echo "<p style='color:green;'> Todo parece correcto </p> ";
        else unset($_POST["enviar"]);
    }
    ?>
    <div id="entradaDatos">
        <form  method="post">
        
        Nombre: <input type="text" name="nombre" value="<?php echo $nombre;?>"> 
                <span class="error" style="color:red;">* <?php echo $nombreErr;?></span><br><br>
        Apellidos: <input type="text" name="apellidos" value="<?php echo $apellidos;?>">
                <span class="error" style="color:red;">* <?php echo $apellidosErr;?></span><br><br>
        Edad: <input type="integer" name="edad" value="<?php echo $edad;?>">
                <span class="error" style="color:red;"> <?php echo $edadErr;?></span><br><br>
        email: <input type="text" name="email" value="<?php echo $email;?>">
                <span class="error" style="color:red;">* <?php echo $emailErr;?></span><br><br>
        Comentario: <textarea cols="40" rows="5" name="comentario"><?php echo $comentario;?></textarea><br><br>
        <input type="submit" name= "enviar" value="Submit"> 
        <!-- > value es el txt que muestra el boton. Es "Enviar" por defecto. 
                El indice en el POST es el name <-->
        </form>
    </div>
        
   <!-- > <footer></footer> <-->
	<?php include ("footer.php")?>
	</body>


</html>