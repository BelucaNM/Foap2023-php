
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<script>

let promise1 = new Promise(function(resolve, reject) {
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
  ?> 
    reject("error :" + <?php echo $conn->connect_error;?>);
  <?php

    }else{
    $sql = "SELECT id, codigoPostal, municipio FROM localidades ORDER BY id LIMIT 10";
    $result = $conn->query($sql);
    $data_array=array();
    while($row = $result->fetch_assoc()) {
      $data_array[] =$row;
      } // #Usar o retornar $mData
    $conn->close();
  ?> 
    resolve(<?=json_encode( $data_array);?>);

  <?php
    };
  ?>
  });

promise1.then(
  result => alert(result), // function(result) { /* manejar un resultado exitoso */ },
  error => alert(error) // function(error) { /* manejar un error */ }
);

</script>
<body>
    
</body>
</html>