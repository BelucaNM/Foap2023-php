<?php
header("Content-type: application/json; charset=utf-8");
$_POST=json_decode(file_get_contents('php://input'), true);

$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname); // Create connection

if ($conn->connect_error) {// Check connection
    echo json_encode("No se pudo conectar, mostrando error de MySql: " . mysqli_connect_error());
}else{
    $subscriptor = $_POST['subscriptor'];
    $siguiendoA =  $_POST['siguiendoA'];
    $activa= $_POST['activa'];
    $existe_dupla =  $_POST['existe_dupla'];

    if (!($existe_dupla) && ($activa)) { 
        $sql= "INSERT INTO subscripciones(subscriptor,siguiendoA,activa) VALUES ($subscriptor,$siguiendoA,1)";
        
    } else if(($activa) && ($existe_dupla))  {
        $sql="UPDATE subscripciones SET activa = 1  WHERE  subscriptor = $subscriptor and siguiendoA = $siguiendoA";
    
    } else if(!($activa) && ($existe_dupla)){
        $sql="UPDATE subscripciones SET activa= 0  WHERE  subscriptor = $subscriptor and siguiendoA= $siguiendoA";
    };
    echo json_encode ($sql);    
    $result = $conn->query($sql);
    $conn->close();
    echo json_encode("datos insertados");
};
