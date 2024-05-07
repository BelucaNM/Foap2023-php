<html>

	<head>
		<title> Ejercicio 3</title>
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
        $num1=$num2="";

        function sumaDeDos($int1,$int2) {
        return $int1 + $int2; 
        }
        function productoDeDos($int1,$int2) {
            return $int1 * $int2; 
        }
        
            
        if (isset($_POST["ejecutar"])) {
                echo "<p> Entro en rutina de verificacion </p> <br>";
                print_r($_POST);

        if (  isset($_POST["numero1"]) & is_numeric($_POST["numero1"]) 
            & isset($_POST["numero2"]) & is_numeric($_POST["numero2"])) { 
                  
                if  ($_POST ['operacion'] == 'suma')  {
                     $resultado = sumaDeDos ( $_POST["numero1"], $_POST["numero2"]); }
                if  ($_POST ['operacion'] == 'producto')  {     
                    $resultado = productoDeDos ( $_POST["numero1"], $_POST["numero2"]);}  
                $num1= $_POST["numero1"];
                $num2= $_POST["numero2"];
               
                echo "<p> El resultado es : ".$resultado." </p> ";} 
        else 
                echo "<p> Por favor , introduzca dos enteros </p> ";
        }    
        
        
    ?>
    <div id="frase">
    <form  method="post">
        Entre un número: <input type="integer" name="numero1" value="<?php echo $num1;?>"><br>
        Entre un número: <input type="integer" name="numero2" value="<?php echo $num2;?>"><br>
        <p> Seleccione operación: </p>
        Suma <input type="radio" name= "operacion" value="suma"> 
        Producto <input type="radio" name= "operacion" value ="producto"> 
        <input type="submit" name= "ejecutar" value="Ejecutar"> 
   
        <!-- > value es el txt que muestra el boton. Es "Enviar" por defecto. 
            El indice en el POST es el name <-->
    </form>
    </div>
    
   <!-- > <footer></footer> <-->
	<?php include ("footer.php")?>
	</body>


</html>