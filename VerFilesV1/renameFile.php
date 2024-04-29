<html>
<head>
        <title> renameFile.php Funcion Rename</title>
        <meta charset="utf-8" >
<head>
<body>


<?php
    
    if (isset($_GET['doc'])){ $theFile = $_GET['doc'];}

    if (isset($_POST['submit']) && isset($_POST ['newName'])) {
        
        $result = rename($_POST['name'],$_POST['newName']);
        echo $result;
   
        if ($result) {echo 'Renombrado '. $_POST['name'] .' como: '.$_POST['newName'].'<br>';
        } else {    $error = error_get_last();
                    echo "Error al renombrar archivo: " . $error['message'];
        }
     
        
        header ("location:verFiles.php");
    }
    
    

?>
<form action="" method="post" enctype= "multipart/form-data">
    <label> Nombre del fichero: </label>
    <input type = "text" name= "name" readonly maxlength= 60  size= 70 value=<?=$theFile?>> <br>
    <label> Nuevo Nombre?: </label>
    <input type="text" name="newName" id="newName" maxlength= 60 size= 70  value =<?=$theFile?>><br>
    <input type="submit" name="submit" value="Confirme para cambiar">
</form>
            
</html>