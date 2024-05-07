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
/*imprimir tabla de multiplicar */
			
			for($i=1; $i<10; $i++) 
			{
			print "Tabla del $i \n";
			print "<ul>";
				for($j=1; $j<10; $j++) {
					$multiplicacion = $i*$j;
					print "<tr>$i x $j = $multiplicacion <br></tr>";
				}
				print"</ul>";
			}


			$fecha= date ("j-n-Y H:i");
			print("$fecha");
			echo "<br>";
			echo Strtotime ($fecha);
			echo "<br>";

	// ejercicio 8 Que fecha es mayor. Tiene que estar en formato americano
	

			$date1="03/22/2024";
			echo "La primera fecha es : ".$date1."<br>";
			$time1=Strtotime($date1);
			echo "Strtotime de La primera fecha es : ".$time1."<br>";
			$date2="07/22/2023";
			echo "La segunda fecha es : ".$date2."<br>";
			$time2=Strtotime($date2);
			echo "Strtotime de La segunda fecha es : ".$time2."<br>";

			if ($time1 > $time2) echo $date1." es la fecha mayor ". "<br>";
			else echo $date1." es la fecha mayor ". "<br>";
	echo "<br>"; 

	// ejercicios de fecha Formato americano a europeo con funcion Date
	// las funciones de fecha funcionan con formato americano
	 
	
	$famericana = "03/22/2024";
	print "la fecha americana es :".$famericana;
	echo "<br>";
	$time1=Strtotime($famericana);
	print  "el Time es :".$time1."<br>";
	$feuropea= date ("d-m-y",$time1);
	print "la fecha europea es :".$feuropea ;
	echo "<br><br>"; 

	//cambiar entre formato europeo a americano con explode
	$fecha = "22-03-2024";
	print "la fecha europea es :".$fecha ;
	$fecha_array = explode('-', $fecha);
	print_r ($fecha_array);
	echo "<br>";
	$fechaamericana = $fecha_array[1]."/".$fecha_array[0]."/".$fecha_array[2];
	print "La fecha  americana es:".$fechaamericana;
	echo "<br>";

	//Ejercicio 9 de la presentacion

	
	$hoy = date("d/m/Y"); // con y se presenta el año con dos dígitos, con Y se presenta con 4 digitos
	 
	Print "La fecha de hoy es :".$hoy;
	echo "<br>";
	$fecha_array = explode('/', $hoy);
	print_r ($fecha_array);
	echo "<br>";

	$diaSemanaIngles = date ('l');
	$diaSemanaEspañol = ""; //inicializa var

	// Con if

	/*if  	($diaSemanaIngles == "Sunday") 		$diaSemanaEspañol = "Domingo";
	else if ($diaSemanaIngles == "Monday") 		$diaSemanaEspañol = "Lunes";
	else if ($diaSemanaIngles == "Tuesday") 	$diaSemanaEspañol = "Martes";
	else if ($diaSemanaIngles == "Wednesday")	$diaSemanaEspañol = "Miercoles";
	else if ($diaSemanaIngles == "Thursday") 	$diaSemanaEspañol = "Jueves";
	else if  ($diaSemanaIngles == "Friday") 	$diaSemanaEspañol = "Viernes";
	else if  ($diaSemanaIngles == "Saturday") 	$diaSemanaEspañol = "Sabado"; */

	// con Array

	$traductor = array ( "Sunday" => "Domingo","Monday"=>"Lunes", 
						 "Tuesday"=>"Martes","Wednesday"=>"Miercoles",
						 "Thursday"=>"Jueves","Friday"=>"Viernes", "Saturday"=>"Sabado");
	$diaSemanaEspañol = $traductor[$diaSemanaIngles];

	$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio",
	"Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
	$elMes = $meses[(int)$fecha_array[1]];

	Print "La fecha  en el formato pedido es:".$diaSemanaEspañol.", ".$fecha_array[0]." de ".$elMes." de ".$fecha_array[2];
	echo "<br>";

	?>
	<!-- > <footer></footer> <-->
	<?php include ("footer.html")?>
	</body>


</html>