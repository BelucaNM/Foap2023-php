<html>

    <head>
        <title> VerFilesTable.php Lee lista de ficheros en un directorio y presenta tabla PHP con links a Deleta y Rename</title>
        <meta charset="utf-8" >
        <link rel="canonical" href="https://multitod.com/iconos-para-paginas-web-codigo-php.php" />
        <style>
            
            .icoBoli {font-size: 20px;}
            .icoBasu {font-size: 20px;}
            td { border: 2px solid red;}
            table {border:  collapse; }
            .carpeta {opacity: 0;}
            
        </style>
    </head>

   
    <body>
        <form action="" method="post" enctype= "multipart/form-data">
        <label> Nombre del Directorio </label>
        <input type="text" name="dir" id="dir">
        <input type="submit" name="submit" VALUE="aceptar">
        </form>
            
    <?php

    if (isset($_GET['op'])&& ($_GET['op']=='delete')){ echo 'Recibo petición de Delete sobre '. $_GET['doc'];}
    if (isset($_GET['op'])&& ($_GET['op']=='rename')){ echo 'Recibo petición de Rename sobre '. $_GET['doc'];}



    if (isset($_POST['submit']) && ($_POST['dir']!="")){ 

   //     print_r ($_POST);
        $nombreDirectorio= $_POST['dir'];
        $dirRaiz = "C:\\xampp\\htdocs\\Foap2023-php\\";
        $isDirectorio = opendir($nombreDirectorio);

        if ($isDirectorio) {  // si el directorio existe
            
        ?>        
            <table><tr> 

        <?php // vuelvo a php

            while ($elemento = readdir($isDirectorio)) {    // Leo todos los ficheros de la carpeta   

                if(( $elemento != ".") && ($elemento != "..")){ 

                    $info = pathinfo($elemento);
    //                echo "<br />";
    //                print_r ($info);
                    
                    $name = $info['basename'];
                    $extension = "";
                    If (isset ($info['extension'])) {$extension =  $info['extension'];};
                    $path = $dirRaiz.$nombreDirectorio."\\".$elemento;
                    $size = filesize($path) ;      
                    $lastDate = date("Y-m-d", filemtime($path));

                    if (is_dir($nombreDirectorio."\\".$elemento)) {      // Si es una carpeta
                        ?>
                            <td><p><strong><?= $elemento ?></strong></p></td>
                            <td><?= $size     ?></td>
                            <td><?= $lastDate ?></td>
                            <td><?= $extension ?></td>
                            <td><a><span class="icoBasu carpeta">&#128465;</span></a></td>
                            <td><a><span class="icoBoli carpeta">&#128394;</span></a></td>
                            </tr>
            <?php

        
                    } else {   // Si es un fichero  

            ?> 
                            <td><?=$elemento ?></td>
                            <td><?=$size     ?></td>
                            <td><?=$lastDate ?></td>
                            <td><?=$extension ?></td>
                            <td><a href='verFilesTable.php?doc=<?=$path?>&op=delete'><span class="icoBasu">&#128465;</span></a></td>
                            <td><a href='verFilesTable.php?doc=<?=$path?>&op=rename'><span class="icoBoli">&#128394;</span></a></td>
                            </tr>
            <?php
        
                    };
                  
                };  
            };  
        }else{
            echo ("<br /> No se ha podido encontrar  el directorio".$_POST['dir']."\n");
        };
    };

    ?>
    </body>

</html>           