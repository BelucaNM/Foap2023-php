<html>
    <head>

    </head>
   
    <body>
        <form action="" method="post" enctype= "multipart/form-data">
        <label> Name </label>
        <input type="text" name="nombre" id="nombre" placeholder ="introducir el nombre"> <br>
        <input type="file" name="cv" id="cv">
        <input type="hidden" name"MAX_FILE_SIZE" value = "102400">
        <input type="submit" name="submit" VALUE="aceptar">
        </form>

       
    <?php

    if (isset($_POST['submit'])){ 

        print_r ($_POST);
        print_r ($_FILES);
        If (is_uploaded_file($_FILES['cv']['tmp_name'])){
            //si se ha subido el fichero….
            // mueve fichero temporal al destino definitivo
                  
            $nombreDirectorio= "uploadedFiles/";
            $idUnico= time();
            $nombreFichero= $idUnico. "-" . $_FILES['cv']['name'];

            // mira si el directorio existe; si no existe lo crea
            $isDirectorio = true; 

            if (!file_exists($nombreDirectorio)) {
                $isDirectorio = mkdir ($nombreDirectorio,777); }; // 777 son autorizaciones
            
            if (!$isDirectorio) {
                   echo " no se ha podido crear la carpeta" ;
            }else {

                $idUnico= time();
                $nombreFichero= $idUnico. "-" . $_FILES['cv']['name'];
                $result = move_uploaded_file(
                    $_FILES['cv']['tmp_name'], 
                    $nombreDirectorio. $nombreFichero);
            // move devuelve true/false ... hay que ver si se ha creado
                if ($result) {echo " se ha movido el fichero a sus directorio definitivo";}
                else {echo "Ha habido un error al subir el fichero al directorio definitivo";}

                }
        
        } else { echo ("No se ha podido subir el archivo".$_FILES['cv']['error']."\n");
        };
    };

    ?>
    </body>

</html>