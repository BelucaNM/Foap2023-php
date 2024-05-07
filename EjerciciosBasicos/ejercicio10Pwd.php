<html>

	<head>
		<title> Ejerciio 10 </title>
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
    $name="introduzca password";
    ?>
    <div id="contraseña">
    <form action="CompruebaPwd.php" method="post">
        Password: <input type="text" name="pwd" value="<?php echo $name;?>"><br>
        <input type="submit">
    </form>
    </div>

    
    <?php     
		
	?>
	<!-- > <footer></footer> <-->
	<?php include ("footer.php")?>
	</body>


</html>