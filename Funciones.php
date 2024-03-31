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
    
    ini_set('display errors',1);
    ini_set('log errors','On');
    error_reporting(E_ALL);
    
    function creaArrayAleatorios($numElementos) {
      
        $array = array ();

        for($i = 0; $i < $numElementos; $i++) {
            $array [$i] = random_int(1,100);
        }
        return $array;
        }



    function valorMinimo($array) {

        
        $iminim = $array[0];
                     
        foreach ( $array as $mielemento) { 
                
            if( $mielemento < $iminim)  $iminim = $mielemento;   
        
        }
        return $iminim;
        }

    function valorMaximo($array) {
        
        $imax = $array[0];
                     
        foreach ( $array as $mielemento) { 
                
            if( $mielemento > $imax)  $imax = $mielemento;   
        
        }
        return $imax; 
        }

    function sumaDeDos($int1,$int2) {
        return $int1 + $int2; 
            
        }
        
    function sumaArray($array) {
            $suma=0;
            $count = count($array) - 1;
            for($i = 0; $i < $count; $i++) $suma = $suma + $array[$i];
            return $suma;
        }
             
    
    
    $elemens = creaArrayAleatorios (20);
    print_r ($elemens);
    echo "<br>";
       
    $iminim = valorMinimo ($elemens);
    echo 'Valor minimo de $elemens = '.$iminim.".<br>";
    
    $iminim = valorMaximo ($elemens);
    echo 'Valor maximo de $elemens = '.$iminim.".<br>";

    $suma = sumaArray ($elemens);
    echo 'Suma de $elemens = '.$suma.".<br>";
    
      
        
    ?>




</body>


</html>