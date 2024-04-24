
<?php
$path= $_GET['file'];

if (file_exists ($path)) {

    
    if (!isset($_GET['in'])) {
              $theText = "Añado una linea en el file \n";
      }else{
        $theText = $_GET['in'];
      } 


    if ($gestor = fopen($path, 'a')) {
          fwrite($gestor, "\n".$theText);
          fclose($gestor); }

    echo "S'escriu $theText en el fitxer: $path<BR>";

} else { echo ("<br /> el fichero".$path. " no existe");} 

?>