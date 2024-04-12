<HTML>
<HEAD>
<TITLE>destinoEjercicio12.php</TITLE>
</HEAD>
<BODY>
<?php
echo "Variable pagina: $_GET[pagina] <br>";

session_start();

if (isset($_SESSION["laSesion"]) && ($_SESSION["laSesion"]=="prueba")) 
{
    echo "Sigo en la sesion:". $_SESSION["laSesion"]." <br>";

}
else
{
    echo "La sesión no esta abierta.";
}


$titulo = $texto = $fecha =$nombre = "";
if (isset($_POST["enviar"]))
{
    $_SESSION["titulo"]= $_POST ["titulo"];
    $_SESSION["texto"]= $_POST ["texto"];
    $_SESSION["fecha"] = $_POST ["fecha"];
    $_SESSION["nombre"] = $_POST ["nombre"];

    $_SESSION["elResultado"] = "he recogido una noticia" ;
    header("Location:homeEjercicio12.php");
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
