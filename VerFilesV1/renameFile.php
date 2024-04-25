
<?php

if (isset($_GET['op'])&& ($_GET['op']=='rename')){

$theFile = $_GET['doc'];
$newName = $_GET['newName'];
echo 'op'. $_GET["op"]. 'el file :'. $theFile .'con el nuevo nombre de: '.$newName.'<br>';
if (rename($theFile,$newName)) {
    echo "Renombrado !!";
} 
else {
    $error = error_get_last();
    echo "Error al renombrar archivo: " . $error['message'];
}
}
?>