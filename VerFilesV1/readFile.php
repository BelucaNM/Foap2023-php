
<?php
$path= $_GET['file'];
                echo ("<br />Leyendo ". $path. "<br /><br />");
                 if (file_exists ($path)) {
                        $gestor = fopen($path, 'r');
                        while (($line = fgets($gestor)) !== false) {
                        echo $line."<BR>";
                        }
                        fclose($gestor);
                 } else { echo ("<br /> el fichero".$path. " no existe");} 
?>