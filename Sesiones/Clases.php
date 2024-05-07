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
        include 'footer.php';
    ?>
<?php

class MyClass
{
    static public $propiedadEstatica = 'Propiedad estática';
    public $propiedadNoEstatica = 'Propiedad no estática';

    const UNA_CONSTANTE = 'Una constante';

    static public function metodoEstatico()
    {
        return 'Método estático';
    }

    public function metodoNoEstatico()
    {
        return 'Método no estático';
    }
}

echo MyClass::$propiedadEstatica . '<br/>';
echo MyClass::metodoEstatico() . '<br/>';


$myClass = new MyClass();
echo $myClass->$propiedadNoEstatica . '<br/>';
echo $myClass->metodoNoEstatico() . '<br/>';

echo MyClass::UNA_CONSTANTE .'<br/>';

?>


<?php 
        include 'header.php';
?>

</body>


</html>