<html>

	<head>
		<title> Ejercicio 6 </title>
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
        
      
    	$elString = "Buenos dias";
        echo $elString."\n";
			
		$elArray = str_split ($elString);
        print_r ($elArray)."\n";

        $laFrecuenciaEnArray = array_count_values($elArray);
        print_r ( $laFrecuenciaEnArray)."\n";
		
        $i= 0;
        $imaxim = 0;
        $iminim = 0;
        $Lmaxim ="";
        $Lminim ="";
	        
	
		foreach ( $laFrecuenciaEnArray as $letra => $valor) { 
			if( $valor > $imaxim) {$imaxim = $valor ; $Lmaxim = $letra;}
			if( $valor < $iminim) {$iminim = $valor ; $Lminim = $letra;}
        }


        echo " La letra más repetida es : ".$Lmaxim."\n";
		echo " La letra menor repetida es : ".$Lminim."\n";	
			
		?>



	
	</body>


</html>