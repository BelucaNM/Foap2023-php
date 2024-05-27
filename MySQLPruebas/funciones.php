
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
         function is_valid_DNI($str) { // comprueba que la palabra tenga al menos un caracter especial, una mayuscula, una minuscula y entre 6 y 8 caracteres 
            $is_valid = true;

            $letras = array ('T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E','T');
            $numDNI   = substr($str,0,8);
            $letraDNI = substr($str,8,9);
           
            if ((strlen($str) != 9) ||  ($numDNI<0) || ($numDNI>99999999)) {
                $dniError = "El numero proporcionado no es valido ";
                $is_valid = false;
            } else {
                $numResto23 = $numDNI  % 23;
                $letraDNIasignada = $letras [$numResto23];
                if ( $letraDNIasignada !== $letraDNI) {
                    $dniError = " la letra asignada deberia ser " . $letraDNIasignada . " no se corresponde con la letra introducida";
                    $is_valid = false;
                    } ;
                };
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

        function alta_personas($dni, $nombre, $apellido, $fechaNacimiento, $telefono, $codigoPostal, $idEmpresa, $email, $username, $password){ 
            // arranca conexion a BD
                $servername = "localhost";
                $adminuser = "root";
                $adminpwd = "";
                $dbname = "test";
    
            // Create connection
                $conn = new mysqli($servername, $adminuser, $adminpwd, $dbname);
                $error = false;
            // Check connection
    
                if ($conn->connect_error) {
                    $error = true; // "Connection failed: No se puede acceder a la BD";
                    die("Connection failed: No se puede acceder a la BD".$conn->connect_error);
                        
                } else {
                    $sql = "INSERT INTO personas (id, dni, nombre, apellido, fechaNacimiento, telefono, codigoPostal, idEmpresa, email, username, password) 
                            VALUES (NULL,'".$dni."','". $nombre."','". $apellido."','". $fechaNacimiento."','".$telefono."','". $codigoPostal."','". $idEmpresa."','".$email."','". $username."','".$password."');";
                    echo $sql;
                    $result = $conn->query($sql);
                    echo $result;
                    if ($result != 1) {// credenciales  correctas 
                        $error = true; // credenciales no correctas
                    };   
                     $conn->close();
                }; 
                return $error;
            };
        
        function creaSelEmpresas (){
            // arranca conexion a BD
                $servername = "localhost";
                $adminuser = "root";
                $adminpwd = "";
                $dbname = "test";
        
            // Create connection
                $conn = new mysqli($servername, $adminuser, $adminpwd, $dbname);
        
            // Check connection
        
                if ($conn->connect_error) {
                    $error = "Connection failed: No se puede acceder a la BD";
                    die("Connection failed: No se puede acceder a la BD".$conn->connect_error);
                            
                } else {
                    $sql = "SELECT * FROM empresas;";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    // output data of each row
                        while($row = $result->fetch_assoc()) {
                        echo "<option value=". $row["id"].">". $row["nombre"]."</option>";
                        }
                        $error="";
                    } else {
                        $error="0 results";
                    };
                       
                    $conn->close();
                }
                return $error;
                };    

        function creaSelCPostal (){
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
                $sql = "SELECT id, codigoPostal, municipio FROM localidades ORDER BY id LIMIT 40";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                // output data of each row
                    while($row = $result->fetch_assoc()) {
                    echo "<option value=". $row["codigoPostal"].">".$row["codigoPostal"].$row["municipio"]."</option>";
                    }
                     $error="";
                } else {
                    $error="0 results";
                };
                               
                $conn->close();
            }
            return $error;
        };    
        
?>
