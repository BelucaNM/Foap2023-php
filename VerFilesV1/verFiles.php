<html>

    <head>
        <title> VerFilesTable.php Lee lista de ficheros en un directorio y presenta tabla PHP con links a Deleta y Rename</title>
        <meta charset="utf-8" >
        <link rel="canonical" href="https://multitod.com/iconos-para-paginas-web-codigo-php.php" />
        <style>
            
            .icoBoli {font-size: 20px;}
            .icoBasu {font-size: 20px;}
            .icoEscr {font-size: 20px; opacity = 0}
            .icoDown {font-size: 20px;}
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

 
   
    if (isset($_POST['submit']) && ($_POST['dir']!="")){ 

   //     print_r ($_POST);
        $nombreDirectorio= $_POST['dir'];
        $dirRaiz = "C:\\xampp\\htdocs\\Foap2023-php\\";
        $isDirectorio = opendir($dirRaiz.$nombreDirectorio);

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

                    $newPath = $dirRaiz.$nombreDirectorio."\\new".$elemento;

                    

                    if (is_dir($nombreDirectorio."\\".$elemento)) {      // Si es una carpeta
                        ?>
                            <td><p><strong><?= $elemento ?></strong></p></td>
                            <td><?= $size     ?></td>
                            <td><?= $lastDate ?></td>
                            <td><?= $extension ?></td>
                            <td><a><span class="icoBasu carpeta">&#128465;</span></a></td>
                            <td><a><span class="icoBoli carpeta">&#128394;</span></a></td>
                            <td><a><span class="icoEscr carpeta">&#128221;</span></a></td>
                            </tr>
            <?php

        
                    } else {   // Si es un fichero
                        $notxt = "";
                        if ($extension == "txt") { 
                        
                        

            ?> 
                            <td><a href='readFile.php?file=<?=$path?>'><?=$elemento ?></a></td>
            <?php
                        
                        } else {
            ?>

                            <td><a><?=$elemento ?></a></td>
            <?php
                        
                        }
            ?>
                            <td><?=$size     ?></td>
                            <td><?=$lastDate ?></td>
                            <td><?=$extension ?></td>
                            <td><a href='deleteFile.php?doc=<?=$path?>'><span class="icoBasu">&#128465;</span></a></td>
                            <td><a href='renameFile.php?doc=<?=$path?>'><span class="icoBoli">&#128394;</span></a></td>
 
            <?php                        
            
                        if ($extension == "txt") { 
                        
                        

                        ?> 
                            <td><a href='editFile.php?file=<?=$path?>'><span class="icoEscr ">&#128221;</span></a></td> 
                            </tr>           
                        <?php
                                    
                                    } else {
                        ?>
            
                            <td><a href='downloadFile.php?file=<?=$path?>' ><span class="icoDown">&#128229;</span></a></td> 
                            </tr>
                        <?php
                                    
                        }
            
        
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