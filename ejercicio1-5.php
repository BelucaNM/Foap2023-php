<html>

	<head>
		<title> Ejercicio 1.5</title>
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
    <div id="frase">
    <form  method="post">
        Entra una frase: <input type="text" name="laFrase" value="<?php echo '';?>"><br>
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
        $laFrase = $_POST["laFrase"];
        if ($laFrase == "") 
        echo "<p style='color:green;'> Por favor , introduzca una frase </p> ";
        else  {
            $array = explode(" ",$laFrase);
            $palabras = count ($array);
            print_r($array);
            echo $palabras. "<br>";
            $i =0;

            $resultado = true;
            do {    $dosUltimasLetras = substr($array[$i], -2, 2);
                    echo "<p style='color:red;'> dos letras ultimas de ".$i." son : ". $dosUltimasLetras." </p> ";
                                      
                    $dosPrimerasSiguientePalabra = substr($array[++$i],0,2);
                    echo "<p style='color:red;'> dos letras primeras de ".$i. "son : ".$dosPrimerasSiguientePalabra." </p> ";

                    if ($dosUltimasLetras !== $dosPrimerasSiguientePalabra) {

                        $resultado = false;
                        break;}
                } while ($i < $palabras-1);
        
            echo "<p style='color:red;'> Su frase es : ".$laFrase." </p> ";
            echo "<p style='color:red;'> El resultado es : ".$resultado." </p> ";

            unset($_POST["enviar"]);
            print_r($_POST);
            }
        }
    ?>
    
   <!-- > <footer></footer> <-->
	<?php include ("footer.php")?>
	</body>


</html>