<HTML>
<HEAD>
    <TITLE>destinoEjercicio12conValidacion.php</TITLE>
    <meta charset="utf-8">
    <meta description="Basecon favicon">
    <link rel="shortcut icon" href="./imagenes/faviconTest.png">
    <style>
    </style>
</HEAD>
<BODY>
<?php
require('clsValidacion.php');

session_start();
echo "Variable pagina:". $_GET["pagina"] ."<br>";

if ($_GET["pagina"] == 4) {
    session_destroy(); 
    header('Location:loginEjercicio12.php'); }

if (isset($_SESSION["laSesion"]) && ($_SESSION["laSesion"]=="prueba")) {
    echo "Sigo en la sesion:". $_SESSION['laSesion']."<br>";
    }else{
    echo "La sesión no esta abierta.";}


$titulo = $texto = $fecha = $nombre = "";

if (isset($_POST["enviar"])) {
    
    //Verificamos el titulo
    $validacion = new Validacion();
    $validacion->validaTexto($_POST['titulo'], false, false, true, 'Por favor ingrese un título en forma valida');
    $validacion->validaTexto($_POST['texto'], false, false, true, 'Por favor ingrese un texto en forma valida');
    //Validamos la fecha ingresada
    $validacion->validaFecha($_POST['fecha'], 'La fecha ingresada no es valida');
    $validacion->validaTexto($_POST['nombre'], false, false, true, 'Por favor ingrese un nombre en forma valida');
    
    $errores = $validacion->getEstado();
    if (!$errores) {
        echo "No hay errores";
        $_SESSION["titulo"]= $_POST["titulo"];
        $_SESSION["texto"]= $_POST["texto"];
        $_SESSION["fecha"] = $_POST["fecha"];
        $_SESSION["nombre"] = $_POST["nombre"];

        $_SESSION["elResultado"] = "he recogido una noticia";
        header("Location:homeEjercicio12.php");
    } else {
        echo "<h1>Listado de errores:</h1>";
        for ($i = 0; $i < count($errores); $i++) {
            echo $errores[$i] . "<br>";
        }
    }
}
?>


<div id="noticia">
    <form  method="post">
        Titulo Noticia: <input type="text" name="titulo" value="<?php echo $titulo;?>"><br>
        Texto: <input type="text" name="texto" value="<?php echo $texto;?>"><br>
        Fecha: <input type="date" name="fecha" value="<?php echo $fecha;?>"><br>
        Nombre: <input type="text" name="nombre" value="<?php echo $nombre;?>"><br>
        <input href ="" type="submit" name= "enviar" value="OK"> 
        <!-- > value es el txt que muestra el boton. Es "Enviar" por defecto. 
            El indice en el POST es el name <-->
    </form>
    </div>
</BODY>
</HTML>
