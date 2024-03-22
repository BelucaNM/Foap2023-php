<<html>

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
        $i=0;
        $final=100;
        $array = array ();

        for($i = 0; $i < $numElementos; $i++) {
            $array [$i] = random_int(1,$final);
        }
        return $array;
        }

    function valorMinimo($array) {
        $elems = $array;
        $iminim = 0;
                     
        foreach ( $elems as $mielemento) { 
                
            if( $mielemento < $iminim)  $iminim = $mielemento;   
        
        }
        return $iminim;
        }

    function valorMaximo($array) {
        $elems = $array;
        $imax = 0;
                     
        foreach ( $elems as $mielemento) { 
                
            if( $mielemento > $imax)  $imax = $mielemento;   
        
        }
        return $imax; 
        }

    function sumaDeDos($int1,$int2) {
        return $int1 + $int2; 
            
        }
        
    /*function sumaArray($array) {

            $elems = $array;
            for($i = 0; $i < 10; $i++) { $suma = $suma + $elems [$i] }
        }*/
             
    
    
    $elemens = creaArrayAleatorios (1,100);
    echo '$elemens = '.$iminim.".<br>";

    $iminim = valorMinimo ($elemens);
    echo 'Valor minimo de $elemens = '.$iminim.".<br>";
    
    $iminim = valorMinimo ($elemens);
    echo 'Valor minimo de $elemens = '.$iminim.".<br>";

    /*$suma = sumaArray ($elemens);
    echo 'Suma de $elemens = '.$iminim.".<br>";*/
    
      
        
    ?>




</body>


</html>