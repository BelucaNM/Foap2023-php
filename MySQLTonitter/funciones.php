<?php
function validate_input($input)
{ // sanear datos
    $input = trim($input);
    $input = htmlspecialchars($input);
    $input = stripslashes($input);
    return $input;

}
;

function is_valid_email($str)
{
    return filter_var($str, FILTER_VALIDATE_EMAIL);
}
;

function is_solo_letras($str)
{
    return ctype_alpha($str);
}
;

function is_valid_pwd($str)
{ // comprueba que la palabra tenga al menos un caracter especial, una mayuscula, una minuscula y entre 6 y 8 caracteres 
    $is_valid = 1;

    if ((strLen($str) < 6) || (strLen($str) > 8)) {
        $is_valid = 0;
    }
    ;

    $pattern = "/[a-z]/";
    if (preg_match_all($pattern, $str) < 1) {
        $is_valid = 0;
    }
    ;

    $pattern = "/[A-Z]/";
    if (preg_match_all($pattern, $str) < 1) {
        $is_valid = 0;
    }
    ;

    $pattern = "/[_?¿=&$#@|]/";
    if (preg_match_all($pattern, $str) < 1) {
        $is_valid = 0;
    }
    ;

    return $is_valid;
}
;
function is_valid_DNI($str)
{ // comprueba que la palabra tenga al menos un caracter especial, una mayuscula, una minuscula y entre 6 y 8 caracteres 
    $is_valid = true;

    $letras = array('T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E', 'T');
    $numDNI = substr($str, 0, 8);
    $letraDNI = substr($str, 8, 9);

    if ((strlen($str) != 9) || ($numDNI < 0) || ($numDNI > 99999999)) {
        $dniError = "El numero proporcionado no es valido ";
        $is_valid = false;
    } else {
        $numResto23 = $numDNI % 23;
        $letraDNIasignada = $letras[$numResto23];
        if ($letraDNIasignada !== $letraDNI) {
            $dniError = " la letra asignada deberia ser " . $letraDNIasignada . " no se corresponde con la letra introducida";
            $is_valid = false;
        }
        ;
    }
    ;
    return $is_valid;
}
;

function existe_User($username, $password)
{ // sanear datos

    include 'conn_BD.php'; // conexion a BD
    $error = false;
    $sql = "SELECT * FROM personas WHERE username LIKE '$username' AND password LIKE '$password';";
    echo $sql;
    $result = $conn->query($sql);
    $array = $result->fetch_assoc();
    
    if ($result->num_rows != 1) {
        $id = NULL; // Error en validación. Reintroduzca datos
    }else{
        $id = $array['id'];
    };

    include 'connClose_BD.php'; // cierra conexion a BD
    return $id;
};

function alta_personas($dni, $nombre, $apellido, $fechaNacimiento, $telefono, $idLocalidad, $idEmpresa, $email, $username, $password)
{

    include 'conn_BD.php'; // conexion a BD
    $error = false;
    $dateYMD = fdmaAfamd($fechaNacimiento);

    $sql = "INSERT INTO personas (id, dni, nombre, apellido, fechaNacimiento, telefono, idLocalidad, idEmpresa, email, username, password) 
                        VALUES (NULL,'$dni','$nombre','$apellido','$dateYMD','$telefono',";

    if ($idLocalidad == "") {
        $sql .= "NULL,";
    } else {
        $sql .= "'$idLocalidad',";
    }
    if ($idEmpresa == "") {
        $sql .= "NULL,";
    } else {
        $sql .= "'$idEmpresa',";
    }

    $sql .= "'$email','$username','$password');";

    echo $sql;
    $result = $conn->query($sql);
    echo $result;
    if ($result != 1) { $error = true; };
    echo $error;
    include 'connClose_BD.php'; // cierra conexion a BD
    return $error;
};

function creaSelEmpresas()
{ // para selector de empresa desplegable en registro 

    include 'conn_BD.php'; // conexion a BD
    $sql = "SELECT * FROM empresas;";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) { // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<option value=" . $row["id"] . ">" . $row["nombre"] . "</option>";
        }
        $error = "";
    } else {
        $error = "0 results";
    }
    ;

    include 'connClose_BD.php'; // cierra conexion a BD
    return $error;
};

function creaSelCPostal() {// para selector de municipio desplegable en registro
    include 'conn_BD.php'; // conexion a BD
    $sql = "SELECT id, codigoPostal, municipio FROM localidades ORDER BY id LIMIT 40";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<option value=" . $row["id"] . ">" . $row["codigoPostal"] . $row["municipio"] . "</option>";
        }
        $error = "";
    } else {
        $error = "0 results";
    };

    include 'connClose_BD.php'; // cierra conexion a BD
    return $error;
};

function fdmaAfamd($fecha_dma){
    list($d,$m,$y) = explode("/",$fecha_dma);
    $timestamp = mktime(0,0,0,$m,$d,$y);
    $fecha_amd = date("Y-m-d",$timestamp);
    return $fecha_amd;
}; 

function alta_mensaje($usuario, $date, $titulo, $contenido, $imagenURL)
{

    include 'conn_BD.php'; // conexion a BD
    $error = false;
    $sql = "INSERT INTO mensajes (id, fecha, idUser, titulo, contenido, imagenURL) 
                        VALUES (NULL,'$date','$usuario','$titulo','$contenido','$imagenURL')";

    
    echo $sql;
    $result = $conn->query($sql);
    echo $result;
    if ($result != 1) { $error = true; };
    echo $error;
    include 'connClose_BD.php'; // cierra conexion a BD
    return $error;
};

?>