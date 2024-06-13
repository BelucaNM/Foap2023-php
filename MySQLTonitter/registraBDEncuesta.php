<?php 
header("Content-type: application/json; charset=utf-8");
session_start();
  
 if (isset($_SESSION["usuario"])) { // Identificación Correcta . En XarxaPrivada
     $usuario =$_SESSION["usuario"];
     $idUsuario =$_SESSION["idUsuario"]; 

 } else {
     echo "La sesión no esta abierta o no tengo todavia ningun resultado"  ;
     header ("location:formLogin.php ");
 };
 
$_POST=json_decode(file_get_contents('php://input'), true);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname); // Create connection

if ($conn->connect_error) {// Check connection
    echo json_encode("No se pudo conectar, mostrando error de MySql: " . mysqli_connect_error());
}else{
    
    $update = $_POST['data'];
    
   // prepara el sql para las encuestas
    $stmt = $conn->prepare("INSERT INTO encuestas (id, titulo, idUsuario, fechaInicio, fechaFin) VALUES (?, ?, ?, ?, ?);");
    for ($i = 0; $i<count($update); $i++) { // solo hay una

        $conn->query("START TRANSACTION;");

        $id = "";
        $update[$i]['idUsuario']  = $idUsuario;
        $titulo =       $update[$i]['titulo'];
        $fechaInicio =  $update[$i]['fechaInicio'];
        $fechaFin =     $update[$i]['fechaFin'];

        $stmt->bind_param("sssss",$id, $titulo, $idUsuario, $fechaInicio, $fechaFin);
        $stmt->execute();

        
        
        $idEncuesta = $conn->insert_id;
        $stmtOpc = $conn->prepare("INSERT INTO opciones (id,idEncuesta,idOpcion,texto) 
                                    VALUES  (?, ?, ?, ?);");
        $id ="";
        
        
        for ($j = 0; $j<count($update[$i]['opciones']); $j++) {
            
            $texto = $update[$i]['opciones'][$j];   
            
            $stmtOpc->bind_param("ssss",$id,$idEncuesta,$j,$texto);
            $stmtOpc->execute();   
            
            };
               
        $result = $conn->query("COMMIT;");
        
    
        if ($result === TRUE) {
            $messageObj['message'] =  "New records created successfully"; 
            
        } else {
            $messageObj['message'] =  "Error"; 
        };
        $conn->close();       
        echo json_encode($messageObj);
    };    
};
