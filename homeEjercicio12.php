<html>

	<head>
		<title> Ejercicio 12 Home</title>
		<meta charset="utf-8" >
  		<meta description="Basecon favicon">
  		<link rel="shortcut icon" href="./imagenes/faviconTest.png">
  		
  	<style>
	</style>
	</head>

	
<body>
	
	<?php 
    include ("header.php");
    session_start();
    if  ( isset($_SESSION["laSesion"]) && 
        ($_SESSION["laSesion"]=="prueba") && 
        isset($_SESSION["elResultado"]) )
    {
        echo "Estoy en la sesion:". $_SESSION["laSesion"]."<br>";
        echo "He recibido la siguiente noticia : <br>";
        echo "la noticia: ". $_SESSION["titulo"]."<br>";
        echo  "con el texto ".$_SESSION["texto"]."<br>";
        echo  "de fecha ".$_SESSION["fecha"]."<br>";
        echo  "mi nombre es ".$_SESSION["nombre"]."<br>";
    }
    else
    {
    echo "La sesión no esta abierta o no tengo todavia ningun resultado . Vaya a Añadir <br> ";

    }
    
    ?>
    <div id="entradaDatos">

   
    <a href="destinoEjercicio12.php?pagina=1">Consultar</a>;
    <a href="destinoEjercicio12.php?pagina=2">Añadir</a>;
    <a href="destinoEjercicio12.php?pagina=3">Borrar</a>
    <a href="destinoEjercicio12.php?pagina=4">Cerrar</a>


    </div>

   <!-- > <footer></footer> <-->
	<?php include ("footer.php")?>
	</body>


</html>