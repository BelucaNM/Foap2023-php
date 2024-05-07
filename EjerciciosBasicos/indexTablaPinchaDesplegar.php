<html>

	<head>
		<title> Index Prueba</title>
		<meta charset="utf-8" >
  		<meta description="Basecon favicon">
  		<link rel="shortcut icon" href="./imagenes/faviconTest.png">
  		
  	</head>

	
	<body>
    <?php 
    $contactos = [
        ["name" => "Juan Lopex", "email" => "juan@upc.edu", "telefono" => "654121314"
    ],
        ["name" => "Toni Oller", "email" => "toni@upc.edu", "telefono" => "743542367"
    ], 
        ["name" => "Ikram", "email" => "ikram@upc.edu", "telefono" => "456456456"
    ]

    ];
  
    ?>

<table id= miTable border="1">
<?php
    $contacto = null;
    $fila = 0;
    foreach ($contactos as $contacto) {
    ?>
    <tr><td> <a href="indexTablaPinchaDesplegar.php?fila=<?= $fila ?>" > <?= $contacto["name"] ?>  </td>
    <?php 
        if ((isset($_GET["fila"])) && ($_GET["fila"] == $fila)) {
    ?>
    <td><?= $contacto["email"] ?></td>
    <td><?= $contacto["telefono"] ?></td>
    <?php 
    } 
    ?> 
    </tr> 

    <?php
       
    $fila++;

    }
?>

</table>
</html>