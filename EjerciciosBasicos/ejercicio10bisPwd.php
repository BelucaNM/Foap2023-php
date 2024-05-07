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
    <div id="contraseña">
    <form  method="post">
        Password: <input type="text" name="pwd" value="<?php echo '';?>"><br>
        <input type="submit" name= "enviar" value="Submit"> 
        <!-- > value es el txt que muestra el boton. Es "Enviar" por defecto. 
            El indice en el POST es el name <-->
    </form>
    </div>
    <?php
        echo "<p style='background-color:blue;'> Entro en rutina de verificacion con ".$_POST["enviar"]. "</p> ";
        print_r($_POST);
        
        If ($_POST["enviar"]=="Submit")
        {
        $guardado = "8a86ac34c87befc560c6b596117c91cd";
        if (md5($_POST["pwd"])== $guardado) 
        echo "<p style='background-color:green;'> Todo es correcto </p> ";
        else  echo "<p style='background-color:red;'> Contraseña incorrecta </p> ";
        unset($_POST["enviar"]);
        print_r($_POST);
        }
    ?>
    
   <!-- > <footer></footer> <-->
	<?php include ("footer.php")?>
	</body>


</html>