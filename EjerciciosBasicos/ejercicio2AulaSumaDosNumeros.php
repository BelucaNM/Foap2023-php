<html>

	<head>
		<title> Ejercicio 2 en Aula</title>
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
        function sumaDeDos($int1,$int2) {
        return $int1 + $int2; 
        }

       $num1 = $num2 = $suma = "";
        
        If (isset($_POST["suma"])) {
        echo "<p> Entro en rutina de verificacion </p> <br>";
        print_r($_POST);
        print $num1;
        
        if (isset ($_POST["numero1"]) & is_numeric($_POST["numero1"]) 
          & isset($_POST["numero2"]) & is_numeric($_POST["numero2"])) 
        {
               $suma = sumaDeDos ( $_POST["numero1"], $_POST["numero2"]); 
               $num1 =   $_POST["numero1"];
               $num2 =   $_POST["numero2"];
               echo "<p> El resultado es : ".$suma." </p> "; 
               echo "<p> num1 es : ".$num1." </p> ";
            } 
                
            else 
                echo "<p> Por favor , introduzca dos enteros </p> ";
                
    
        }
    ?>
    
    
    <div id="formulario">
    <form  method="post">
        Entre un número: <input type="number" name="numero1" value="<?php echo $num1;?>"><br>
        Entre un número: <input type="number" name="numero2" value="<?= $num2;?>"><br> <!-- > otra sintaxis <-->
        El resultado es: <input type="number" value="<?php echo $suma;?>"><br> <!-- > no tiene name para que no se envie <-->
        <input type="submit" name= "suma" value="Suma"> 
        <!-- > value es el txt que muestra el boton. Es "Enviar" por defecto. 
            El indice en el POST es el name <-->
    </form>
    </div>

    
   <!-- > <footer></footer> <-->
	<?php include ("footer.php")?>
	</body>


</html>