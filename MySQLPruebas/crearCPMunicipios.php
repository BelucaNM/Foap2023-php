<html>
    <head>
        <title> ejercicio BD</title>
    </head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

print_R( $conn) ;
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$path= "codigos_postales_municipios.csv";
echo ("<br />Leyendo ". $path. "<br /><br />");
if (file_exists ($path)) {
    $gestor = fopen($path, 'r');
    while (($line = fgets($gestor)) !== false) {
        echo $line."<BR>"; 
        $lineArray = explode(',',$line,3);
        print_r($lineArray);
        $cpost = trim($lineArray[0]);
        $municipio = trim($lineArray[2]);       
        $sql = "INSERT INTO localidades (id, codigoPostal, municipio) VALUES (NULL,'" . $cpost ."','" .$municipio."');";
//        $sql = "INSERT INTO localidades (id, codigoPostal, municipio) VALUES (NULL, '08818', 'Olivella');";
        echo "<br>".$sql."<br>";
        $result = $conn->query($sql);
        if ($result === TRUE) {
          echo "New record created successfully";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        };
     };
    fclose($gestor);
    } else { 
        echo ("<br /> el fichero".$path. " no existe");
    }; 

$conn->close();
?>

</body>
</html>