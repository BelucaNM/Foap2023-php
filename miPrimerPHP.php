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
			echo "Hola Mundo";
			}
		 	$nota = 6;
			echo $nota;
			$valoracion="suspenso";
			if ( $nota >= 5 & $nota < 6 ){ $valoracion ="suficiente"; }
			else if ( $nota >= 6 & $nota < 8) {$valoracion ="aprobado";}
			else if ( $nota >= 8 & $nota < 9) {$valoracion ="notable";}
			else if ( $nota >= 9) {$valoracion ="sobresaliente";
			} 
			echo $valoracion;

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
			/* imprimir tabla de multiplicar 
			$linea= array();
			for($i=1; $i<=9; $i++) {
				for($j=1; $i<=9; $i++)
					{array($i) = $i*$j;


				print("<LI>Elemento $i</LI>\n");
				print("</UL>\n");
				print("<LI>Elemento $i</LI>\n");
				print("</UL>\n");}
			}*/

			$fecha= date ("j-n-Y H:i");
			print("$fecha");
			echo "<br>";
			echo Strtotime ($fecha);
			echo "<br>";

			$date1="22/03/2024";
			echo "La primera fecha es : ".$date1."<br>";
			$date2="22/07/2023";
			echo "La segunda fecha es : ".$date2."<br>";
			$time1=Strtotime($date1);
			$time2=Strtotime($date2);
			if ($time1 > $time2) echo $date1." es la fecha mayor ". "<br>";
			else echo $date1." es la fecha mayor ". "<br>";



		 ?>



	<!-- > <footer></footer> <-->
	<?php include ("footer.html")?>
	</body>


</html>