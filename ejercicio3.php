<html>

	<head>
		<title> Ejercicio 2</title>
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
        $resultado = 0;
        function sumaDeDos($int1,$int2) {
        return $int1 + $int2; 
        }
        function productoDeDos($int1,$int2) {
            return $int1 * $int2; 
            }
        
        If (isset($_POST["suma"]) || isset($_POST["producto"]) ) {
            echo "<p style='background-color:blue;'> Entro en rutina de verificacion </p> <br>";
            print_r($_POST);
        
            if (    isset ($_POST["numero1"]) & is_numeric($_POST["numero1"]) 
                    & isset($_POST["numero2"]) & is_numeric($_POST["numero2"])) { 
                if (isset($_POST["suma"]))       $resultado = sumaDeDos ( $_POST["numero1"], $_POST["numero2"]); 
                if (isset($_POST["producto"]))   $resultado = productoDeDos ( $_POST["numero1"], $_POST["numero2"]);  
               
                echo "<p style='color:red;'> El resultado es : ".$resultado." </p> ";} 
            else 
                echo "<p style='color:green;'> Por favor , introduzca dos enteros </p> ";
                
            unset($_POST["suma"]);
            unset($_POST["producto"]);
        }
    ?>
    <div id="frase">
    <form  method="post">
        Entre un número: <input type="integer" name="numero1" value="<?php echo '';?>"><br>
        Entre un número: <input type="integer" name="numero2" value="<?php echo '';?>"><br>
        <input type="submit" name= "suma" value="Suma"> 
        <input type="submit" name= "producto" value="Producto"> 
   
        <!-- > value es el txt que muestra el boton. Es "Enviar" por defecto. 
            El indice en el POST es el name <-->
    </form>
    </div>
    
   <!-- > <footer></footer> <-->
	<?php include ("footer.php")?>
	</body>


</html>