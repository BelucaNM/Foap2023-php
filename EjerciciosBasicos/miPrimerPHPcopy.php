<html>

	<head>
		<title> Mi primer PHP Copy </title>
		<meta charset="utf-8" >
  		<meta description="Basecon favicon">
  		<link rel="shortcut icon" href="./imagenes/faviconTest.png">
  		
  	<style>
	</style>
	</head>

	
	<body>
	<!-- ><header></header> <-->
	<?php include ("header.php")?>

         <?php 
		 echo "<h1> Hola Mundo:</h1>\n"; 
		 echo "<p>  Hola Mundo: </p>\n";
		// phpinfo();
		 /* comentario 
		 varias lineas */
		 // comentario una linea
		/* <img src="<?= './imagenes/fresas.jpg' ?>" ></img>
		 <img src="./imagenes/fresas.jpg"></img>*/
		 ?> 
		 <?php 
			$mostrarMensaje = true;
			if($mostrarMensaje == true) {
			echo "Hola Mundo \n";
			}
		 	$nota = 8;
			echo " La nota ". $nota. " es ";
			$valoracion="suspenso";
			if 		( $nota >= 5 & $nota < 6 )	{ $valoracion ="suficiente"; }
			else if ( $nota >= 6 & $nota < 8) 	{$valoracion ="aprobado";}
			else if ( $nota >= 8 & $nota < 9) 	{$valoracion ="notable";}
			else if ( $nota >= 9) 				{$valoracion ="sobresaliente";
			} 
			echo $valoracion. "\n";

			/* prueba de Switch */
			$dia = 3; // asigna el valor 0 a $i
			switch ($dia) {
			case (1) :
			 echo 'Es lunes dia '.$dia." de la semana.<br>";
			break;
			case (2) :
			 echo 'Es martes dia '.$dia." de la semana.<br>";
			break;
			case (3) :
			echo 'Es miercoles dia '.$dia." de la semana.<br>";
			break;
			}
			/* imprimir tabla de multiplicar */
			print("<table>");
			for($i=1; $i<=9; $i++) {
				print("<tr><td>Tabla del $i \ \ </td>");
				
				for($j=1; $j<=9; $j++) {
					print("<td>". $i*$j. "</td>\n");
					};
				print("</tr>");

				};
				print("</table>");
	?>

	<!-- > <footer></footer> <-->
	<?php include ("footer.php")?>
	</body>


</html>