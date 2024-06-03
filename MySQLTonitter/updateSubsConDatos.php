<?php // prueba de sentencias SQL para subscripciones
 
$posted= ["data"=> [
        [
        "subscriptor"=> "4",
        "siguiendoA"=> "5",
        "activa"=> "1",
        "existe_dupla"=> "1"
        ],
        [
        "subscriptor"=> "4",
        "siguiendoA"=> "7",
        "activa"=> "1",
        "existe_dupla"=> "1"
        ],
        [
        "subscriptor"=> "4",
        "siguiendoA"=> "1",
        "activa"=> "1",
        "existe_dupla"=> "1"
        ],
        [
        "subscriptor"=> "4",
        "siguiendoA"=> "6",
        "activa"=> "0",
        "existe_dupla"=> "0"
        ],
        [
        "subscriptor"=> "4",
        "siguiendoA"=> "9",
        "activa"=> "0",
        "existe_dupla"=> "0"
    ],
    [
        "subscriptor"=> "4",
        "siguiendoA"=> "12",
        "activa"=> "0",
        "existe_dupla"=> "0"
    ]]];

    $sqlTodas ="";
    $update = $posted['data'];
    for ($i = 0; $i <count($update); $i++) {

        
        $subscriptor = $update[$i]['subscriptor'];
        $siguiendoA =  $update[$i]['siguiendoA'];
        $activa =       $update[$i]['activa'];
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
echo $sqlTodas

?>