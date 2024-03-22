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
		/*
		ini_set('display errors',1);
		ini_set('log errors','On');
		error_reporting(E_ALL);
        
        $variable= "Hola";
		echo( $variable); */


		$elems = array(2,11,9,8,-1,33,2,45,1,2);
		$i= 0;
		$iminim = 0;
		$imaxim = 0;
		$suma = 0;
		foreach($elems as $i) {
			if( $elems [$i] > $imaxim) { $imaxim = $elems [$i]};
			if( $elems [$i] < $iminim) { $iminim = $elems [$i]};
			$suma == $suma + $elems [$i] ;
		}
				
		echo '$iminim = '.$iminim.".<br>";	
		echo '$imaxim = '.$imaxim.".<br>";
		echo '$total = '.$total.".<br>";	
		
			
		?>



	
	</body>


</html>