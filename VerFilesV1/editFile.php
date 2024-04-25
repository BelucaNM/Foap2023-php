
<?php

if (isset($_GET['file'])) {
  echo "<br/> entro por get ". $_GET['file'];
  $path= $_GET['file'];

  if (file_exists ($path)) {

    $theText = "";
    $gestor = fopen($path, 'r');
    while (($line = fgets($gestor)) !== false) {
    $theText .= $line;
    }
    fclose($gestor);

  } else { 
    echo ("<br /> el fichero".$path. " no existe");
  }

}

if (isset($_POST['submit'])) {

  echo "<br/> entro por post " . $_POST['file'];
  
  if (isset($_POST['file'])) {



    $theText = $_POST ['texto'].'\n'."logging at ".date("Y-m-d H:i:s");
    
    if ($gestor = fopen($path, 'w')) {
        echo "<br/>  Actualizado el fitxer: $path";

        fwrite($gestor, "\n".$theText);
        fclose($gestor); }
  }
}

?>

<form action = "" method="POST" enctype= "multipart/form-data">
        <P> Introduzca Texto: </P>
        <input name="file" value = '<?=$path?>' hidden>
        <textarea id="texto" name="texto" rows="20" cols="100" autofocus><?=$theText?></textarea>
        <input type="submit" name="submit" value="aceptar">
        <a href = "verFiles.php"> Cerrar editor </a>
</form>