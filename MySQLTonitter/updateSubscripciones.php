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
    $sqlTodas ="";
    $update = $_POST['data'];
   
    for ($i = 0; $i<count($update); $i++) {
        
        $subscriptor = $update[$i]['subscriptor'];
        $siguiendoA =  $update[$i]['siguiendoA'];
        $activa = $update[$i]['activa'];
        $existe_dupla =  $update[$i]['existe_dupla'];
     
     
        if (!($existe_dupla) && ($activa)) { 
            $sql= "INSERT IGNORE INTO subscripciones(subscriptor,siguiendoA,activa) VALUES ($subscriptor,$siguiendoA,1)";
        
        } else if(($activa) && ($existe_dupla))  {
            $sql="UPDATE subscripciones SET activa = 1  WHERE  subscriptor = $subscriptor and siguiendoA = $siguiendoA";
    
        } else if(!($activa) && ($existe_dupla)){
            $sql="UPDATE subscripciones SET activa= 0  WHERE  subscriptor = $subscriptor and siguiendoA= $siguiendoA";
        };
        
        if (($activa) || ($existe_dupla)){
            $sqlTodas .= $sql . ";";
        };
        
        
    };
  
/*
    $sqlTodas =" UPDATE subscripciones SET activa = 1  WHERE  subscriptor = 4 and siguiendoA = 5;
    UPDATE subscripciones SET activa = 1  WHERE  subscriptor = 4 and siguiendoA = 7; 
    UPDATE subscripciones SET activa = 1  WHERE  subscriptor = 4 and siguiendoA = 1; ";  
    
    */ 
    if ($conn->multi_query($sqlTodas) === TRUE) {
        echo json_encode("New records created successfully");
    } else {
        echo json_encode("Error");
    };

    $conn->close(); //     
    
};
