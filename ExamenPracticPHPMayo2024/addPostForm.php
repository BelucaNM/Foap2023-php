<html>
<head>
    <title> AddPostForm.php </title>
    <meta charset="utf-8">
    <meta description="Basecon favicon">
    <link rel="shortcut icon" href="laXarxaFavicon.png">
    <style>
        <?php include "laXarxa.css"; ?>
    </style>
</head>

<body>
<?php

include ("header.php");
session_start();

$pTitulo = $pDescripcion = $targetImage= "";
$pTituloErr = $pDescripcionErr = $pImageErr = "";

if (isset($_POST['submit'])) { // validaciones

    
    $error= false; 
    $uploadOk = false;
    
    
    echo "<br/> Entro en rutina de verificacion ";
    print_r($_POST);
    print_r($_FILES);
  
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
                $pTituloErr= " Titulo debe tener 10 o más caracteres"; 
                $error = true; }

        };

    if (!isset ($_POST["pDescripcion"]) || empty ($_POST["pDescripcion"])) 
        {
            $pDescripcionErr= " Descripcion requerida"; 
            $error = true;
        }
        else 
        {
            $pDescripcion = $_POST["pDescripcion"];
            if (strlen($pDescripcion)>500) {
                $pTituloErr= " Descripcion debe tener 500 caracteres o menos"; 
                $error = true; }
        };
  
    if (!isset($_FILES['pImagen']) || empty ($_FILES['pImagen']["name"])) 
        {
            $pImageErr= " Foto requerida"; 
            $error = true;
    }
    else 
    {
        

        print_r($_POST);
        echo "<br>";
        print_r($_FILES);
        echo "<br>";
    
        $uploadOk = false;
    
        if (is_uploaded_file($_FILES['pImagen']['tmp_name'])) {
    
            $uploadOk = true;
             // chequea un formato válido
            $targetDirectorio = "./laXarxaImagenes";
            echo ($targetDirectorio);
            $targetFile = basename($_FILES["pImagen"]["name"]);
                
    
            if(getimagesize($_FILES["pImagen"]["tmp_name"]) === false) { 
                $pImageErr ="El archivo no es una imagen ";
                $uploadOk = false ;
            };
    
                
            if ($uploadOk ){
                // chequea el formato de la imagen
                $fileType = strtolower(pathinfo($_FILES['pImagen']['name'],PATHINFO_EXTENSION));
                $arrayImageTypes = ["jpg","png","jpeg","gif"];
                    
                if(!in_array($fileType,$arrayImageTypes)) {
                    $pImageErr = "Solo se aceptan formatos JPG, JPEG, PNG y GIF files.";
                    $uploadOk = false;
                    };
                };
                        
            if ($uploadOk ){
                // mira si el directorio existe; si no existe lo crea
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
                if (file_exists($targetImage)) {
                    $pImageErr= "La imagen ya existe.";
                    $uploadOk = false;
                    };
                };
    
                if ($uploadOk ){
                    $uploadOK = move_uploaded_file(
                        $_FILES['pImagen']['tmp_name'],
                        $targetImage); // move devuelve true/false ... hay que ver si se ha creado
                };
    
    
                if (!$uploadOk) { // no se ha movido el fichero a sus directorio definitivo: $targetImage
                    $error = true;
                   };
                
                 
            } else {
                $imageErr="No se ha podido subir el archivo Error:" . $_FILES['pImagen']['error'] . "\n";
                $error = true;
            };
        
    };

    if (!$error)  {
        echo "<p style='color:green;'> Todo parece correcto </p> ";
        $nuevoPost = array( "titulo"=> $pTitulo, 
                            "descripcion"=> $pDescripcion, 
                            "imagen" => $targetImage);

//      print_r  ($_SESSION["arrayPosts"] );                 
                       
        array_push ( $_SESSION["arrayPosts"], $nuevoPost); // añade el post
//      print_r  ($_SESSION["arrayPosts"] );
        header("Location: laXarxaPrivada.php");

    } else {
      unset($_POST["enviar"]);
    };
  
};

    

?>

<form action = "" method="POST" enctype= "multipart/form-data">
        <P> Introduzca Datos: </P>
        Titulo : <input name="pTitulo" value = '<?=$pTitulo?>' placeholder="introducir el titulo del Post">
        <span class="error" style="color:red;">* <?php echo $pTituloErr;?></span><br><br>
        <textarea id="pDescripcion" name="pDescripcion" rows="20" cols="100" placeholder="introducir Descripción"><?=$pDescripcion?></textarea>
        <span class="error" style="color:red;">* <?php echo $pDescripcionErr;?></span><br><br>
        Imagen: <input type= "file" id="pImagen" name="pImagen" value = "<?=$targetImage?>" >
        <span class="error" style="color:red;">* <?php echo $pImageErr;?></span><br><br>
        <input type="hidden" name"MAX_FILE_SIZE" value="102400">
        <input type="submit" name="submit" value="aceptar">
        <a href = "laXarxaPrivada.php"> Cerrar editor </a>
</form>

<?php include ("footer.php") ?>
</body>
</html>