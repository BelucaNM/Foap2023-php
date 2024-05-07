<html>

	<head>
		<title> MI PAGINA </title>
		<meta charset="utf-8" >
  		<meta description="Basecon favicon">
  		<link rel="shortcut icon" href="./imagenes/faviconTest.png">
  		
  	<style>
	</style>
	</head>

	
	<body>
	<?php

    ini_set('display_errors', 1);
    ini_set('log_errors', 'On');
    error_reporting(E_ALL);

    $productes = array(
    array(
        "nom" => "Pomes",
        "imatge" => "https://www.cuina.cat/uploads/s1/65/74/83/red-delicious_22_645x400.jpeg",
        "preu" => 10.99
    ),
    array(
        "nom" => "Taronges",
        "imatge" => "https://botiga.mercatfontetes.cat/598-large_default/taronges-1kg-aprox-.jpg",
        "preu" => 20.49
    ),
    array(
        "nom" => "Cireres",
        "imatge" => "https://etselquemenges.cat/wp-content/media/2012/05/cireres-600.gif",
        "preu" => 15.79
    )
    );

    echo "<table>";	
    ;
        foreach ( $productes as $producte) { 
            echo "<tr>";
            echo "<th>".$producte ["nom"]."</th>";
        //   echo "<th> <image src='".$producte ["imatge"]."'</th>";
            echo "<th> <image src='".$producte ["imatge"]."' width='100'></th>";
            echo "<th>".$producte ["preu"]."</th>";
            echo "</tr>";
        }
    
	echo "</table>";	
	?>
    
    </body>


</html>