
<?php

    if (isset($_GET['op'])&&($_GET['op']=='delete')) {
        
            $fileToDelete = $_GET['doc'];
            
            if (unlink($fileToDelete)) {
                echo " arxiu $fileToDelete esborrat! <br>";
            }
            else {
                echo "No s'ha pogut esborrar l'arxiu $fileToDelete!<br>";  
            }
       
        }
?> 