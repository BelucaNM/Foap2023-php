<html>
<head>
</head>
<body>

//Tu password es :<?php echo $_POST["pwd"]; ?><br>
<?php

$guardado = "8a86ac34c87befc560c6b596117c91cd";
if (md5($_POST["pwd"])== $guardado) 
 echo "<p style={background-color=green;}> Todo es correcto </p> ";
else  echo "<p style={background-color:red;}> Contraseña incorrecta </p> ";

?>

</body>
</html>