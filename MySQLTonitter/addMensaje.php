<html>
<head>
    <title> AddMensaje.php </title>
    <meta charset="utf-8">
    <meta description="Basecon favicon">
    <link rel="shortcut icon" href="laXarxaFavicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> 

</head>

<body>

<?php

$title ="La Estafeta";
include ("header.php");
include_once "funciones.php";
session_start();

$pTitulo = $pContenido = $targetImage= "";
$pTituloErr = $pContenidoErr = $pImageErr = "";

if (isset($_POST['submit'])) { // validaciones

    
    $error= false; 
    $uploadOk = false;
    
    
//    echo "<br/> Entro en rutina de verificacion ";
//    print_r($_POST);
//    print_r($_FILES);
  
  // valida campos de texto
    if (!isset ($_POST["pTitulo"]) || empty ($_POST["pTitulo"])) 
        {
            $pTituloErr= " Titulo requerido"; 
            $error = true;
        }
        else 
        {
            $pTitulo = $_POST["pTitulo"];
            $pTitulo = trim ($pTitulo);
            if (strlen($pTitulo)<10) {
                $pTituloErr= "Titulo debe tener entre 10-30 caracteres"; 
                $error = true; }

        };

    if (!isset ($_POST["pContenido"]) || empty ($_POST["pContenido"])) 
        {
            $pContenidoErr= "Contenido requerida"; 
            $error = true;
        }
        else 
        {
            $pContenido = $_POST["pContenido"];
            if (strlen($pContenido)>500) {
                $pTituloErr= "Contenido puede tener hasta 500 caracteres"; 
                $error = true; }
        };
  
    if (isset($_FILES['pImagen']) && !empty($_FILES['pImagen']["name"])){ // Foto no esrequerida
           
        $uploadOk = false;
    
        if (is_uploaded_file($_FILES['pImagen']['tmp_name'])) {
    
            $uploadOk = true;
             // chequea un formato válido
            $targetDirectorio = "./imgMensajes";
//            echo ($targetDirectorio);
            $targetFile = basename($_FILES["pImagen"]["name"]);
                
    
            if(getimagesize($_FILES["pImagen"]["tmp_name"]) === false) { // chequea si el file es una imagen
                $pImageErr ="El archivo no es una imagen ";
                $uploadOk = false ;
                };
    
                
            if ($uploadOk ){ // chequea el formato de la imagen
                
                $fileType = strtolower(pathinfo($_FILES['pImagen']['name'],PATHINFO_EXTENSION));
                $arrayImageTypes = ["jpg","png","jpeg","gif"];
                    
                if(!in_array($fileType,$arrayImageTypes)) {
                    $pImageErr = "Solo se aceptan formatos JPG, JPEG, PNG y GIF files.";
                    $uploadOk = false;
                    };
                };
                        
            if ($uploadOk ){ // mira si el directorio existe; si no existe lo crea
                
                $isDirectorio = true;
                if (!file_exists($targetDirectorio)) {
                    $isDirectorio = mkdir($targetDirectorio, 0777,true); // 777 son autorizaciones
                    };
                if (!$isDirectorio) {
                    $pImageErr=" no se ha podido crear el directorio ".$targetDirectorio;
                    $uploadOk = false;
                    };
                };
    
            if ($uploadOk ){  // Check if file already exists
    
                $targetImage = $targetDirectorio ."/". $_FILES['pImagen']['name'];
                if (!file_exists($targetImage)) { // si la imagen existe ya no hay que subirla
                    
                    $uploadOK = move_uploaded_file(
                        $_FILES['pImagen']['tmp_name'],
                        $targetImage); // move devuelve true/false ... hay que ver si se ha creado
                    };
    
                if (!$uploadOk) { // no se ha movido el fichero a sus directorio definitivo: $targetImage
                    $imageErr="No se ha podido subir el archivo Error:" . $_FILES['pImagen']['error'] . "\n";
                    $error = true;
                    };
                    
                };
        
            };
        };

    if (!$error)  {
        unset($_POST["submit"]);
        echo "<p style='color:green;'> Todo parece correcto </p> ";
        
        $idUsuario = $_SESSION['idUsuario'];
        $hoy = date("Y/m/d H:i:s");
        $error = alta_mensaje($idUsuario, $hoy, $pTitulo,$pContenido,$targetImage); // añade el post
        if (!$error) { // Alta de registro correcto 
            echo "<p style='color:green;'> Alta de registro correcto </p> ";
            header("Location: laXarxaTonitter.php");
        } else {
            echo "<p style='color:red;'> Error al dar de alta el mensaje </p> ";            
        };
   

    };
  
};

?>
<div id="entradaDatos" class = "container pt-3 pb-3 mt-3 bg-light shadow-lg">
<form method="POST" action = "" enctype= "multipart/form-data">
    <div class="form-floating mb-1 mt-1">
        <input type="text" class="form-control" id="pTitulo" name="pTitulo" value = "<?=$pTitulo;?>" placeholder="introducir el titulo del Post">
        <label for = "pTitulo" class="form-label">Titulo</label>
        <span class="error" style="color:red;"><?="*".$pTituloErr;?></span>
    </div>
    <div class="form-floating mb-1 mt-1">
        <textarea class="form-control" id="pContenido" name="pContenido" rows="25" cols="200" placeholder="introducir contenido"><?=$pContenido?></textarea>
        <label for = "pContenido" class="form-label">SU MENSAJE</label>
            <span class="error" style="color:red;"><?="*".$pContenidoErr;?></span>
        </div>
        <div class="form-floating mb-1 mt-1">
            <input type= "file" class="form-control" id="pImagen" name="pImagen" value = "<?=$targetImage?>" >
            <label for = "pImagen" class="form-label"> Desea incorporar una fotografia?</label>
            <span class="error" style="color:red;"><?=$pImageErr;?></span>
            <input type="hidden" name"MAX_FILE_SIZE" value="<?= $pImageSize;?>">
        </div>
        
        <div class="form-floating mb-1 mt-1"> 
            <input class="btn btn-primary"type="submit" name="submit" value="Aceptar">
        </div>
</form>
</div>

<div class = "container pt-3 pb-3 mt-3 bg-light shadow-lg">
    <a class="btnStack" href = "laXarxaTonitter.php"> Cerrar editor </a>
</div>
<?php include ("footer.php") ?>
</body>
</html>