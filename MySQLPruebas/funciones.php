
<?php
        function validate_input($input){ // sanear datos
            $input = trim ($input);
            $input = htmlspecialchars ($input);
            $input = stripslashes ($input);
            return $input;
        
        };

        function is_valid_email($str) {
            return filter_var($str, FILTER_VALIDATE_EMAIL);
        };

         function is_solo_letras($str) {
             return  ctype_alpha($str);
        };

         function is_valid_pwd($str) { // comprueba que la palabra tenga al menos un caracter especial, una mayuscula, una minuscula y entre 6 y 8 caracteres 
             $is_valid = 1;
 
             if ((strLen($str) < 6) || (strLen($str) > 8)) {  $is_valid = 0; };
       
             $pattern = "/[a-z]/" ;
             if (preg_match_all($pattern, $str) < 1) {$is_valid = 0;};
 
             $pattern = "/[A-Z]/" ;
             if (preg_match_all($pattern, $str) < 1) {$is_valid = 0;};
 
             $pattern = "/[_?¿=&$#@|]/" ;
             if (preg_match_all($pattern, $str) < 1) {$is_valid = 0;};
 
             return $is_valid;
         };

        function existe_User($username,$password){ // sanear datos
        // arranca conexion a BD
            $servername = "localhost";
            $adminuser = "root";
            $adminpwd = "";
            $dbname = "test";

        // Create connection
            $conn = new mysqli($servername, $adminuser, $adminpwd, $dbname);

        // Check connection

            if ($conn->connect_error) {
                $error = "Connection failed: No se puede acceder a la Xarxa";
                die("Connection failed: No se puede acceder a la Xarxa".$conn->connect_error);
                    
            } else {
                $sql = "SELECT * FROM personas WHERE username LIKE '$username' AND password LIKE '$password';";
                $result = $conn->query($sql);
                if ($result->num_rows == 1) {
                    $error = ""; // credenciales  correctas 
                } else {   
                    $error = 'Error en validación. Reintroduzca datos'; // credenciales no correctas
                };    
                 $conn->close();
                }
            return $error;
        };

        function alta_personas($dni, $nombre, $apellido, $fechaNacimiento, $telefono, $codigoPostal, $idEmpresa, $email, $username, $password){ // sanear datos
            // arranca conexion a BD
                $servername = "localhost";
                $adminuser = "root";
                $adminpwd = "";
                $dbname = "test";
    
            // Create connection
                $conn = new mysqli($servername, $adminuser, $adminpwd, $dbname);
    
            // Check connection
    
                if ($conn->connect_error) {
                    $error = "Connection failed: No se puede acceder a la Xarxa";
                    die("Connection failed: No se puede acceder a la Xarxa".$conn->connect_error);
                        
                } else {
                    $sql = "INSERT INTO personas (id, dni, nombre, apellido, fechaNacimiento, telefono, codigoPostal, idEmpresa, email, username, password) 
                            VALUES (NULL,$dni, $nombre, $apellido, $fechaNacimiento, $telefono, $codigoPostal, $idEmpresa, $email, $username, $password)";
                    $result = $conn->query($sql);
                    if ($result->num_rows == 1) {
                        $error = ""; // credenciales  correctas 
                    } else {   
                        $error = 'Error en validación. Reintroduzca datos'; // credenciales no correctas
                    };    
                     $conn->close();
                    }
                return $error;
            };
?>
