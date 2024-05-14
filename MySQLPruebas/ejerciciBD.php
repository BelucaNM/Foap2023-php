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

$sql = "SELECT id, nombre, apellido FROM personas";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<br>"."id: " . $row["id"]. " - Nombre: " . $row["nombre"]. " " . $row["apellido"];
  }
} else {
  echo "0 results";
}
$conn->close();
?>

</body>
</html>