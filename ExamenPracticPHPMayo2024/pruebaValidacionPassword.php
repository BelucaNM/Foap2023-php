<?php

function is_valid_pwd($str) { // comprueba que la palabra tenga al menos un caracter especial, una mayuscula, una minuscula y entre 6 y 8 caracteres 
            $is_valid = 1;
            $matches = 0;
            $is_valid_num = $is_valid_minus = $is_valid_mayus = $is_valid_char =0;

            if ((strLen($str) < 6) || (strLen($str) > 8)) {  $is_valid = 0; };
      
            $pattern = "/[a-z]/" ;
            echo $pattern;
            echo (preg_match_all($pattern, $str));
            if (preg_match_all($pattern, $str) < 1) {$is_valid = 0;};

            $pattern = "/[A-Z]/" ;
            echo $pattern;
            echo (preg_match_all($pattern, $str));
            if (preg_match_all($pattern, $str) < 1) {$is_valid = 0;};

            $pattern = "/[_?¿=&$#@|]/" ;
            echo $pattern;
            echo (preg_match_all($pattern, $str));
            if (preg_match_all($pattern, $str) < 1) {$is_valid = 0;};


            return $is_valid;
        };
        
$str= "Aa_b3"; // no llega a 6 caracteres
echo $str. " es valido?". is_valid_pwd($str)."\n"; 
echo "<br>";

$str= "Aa_b3bbbb";// supera 8 caracteres
echo $str. " es valido?". is_valid_pwd($str);
echo "<br>";

$str= "aa_bbbb"; // no tiene mayusculas
echo $str. " es valido?". is_valid_pwd($str);
echo "<br>";

$str= "AA_BBBB"; // no tiene minusculas
echo $str. " es valido?". is_valid_pwd($str);
echo "<br>";

$str= "AaBBBB"; // no tiene caracteres especiales
echo $str. " es valido?". is_valid_pwd($str);
echo "<br>";

$str= "AaB&BBB"; // deberia ser valido
echo $str. " es valido?". is_valid_pwd($str);
echo "<br>";

?>