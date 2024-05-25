
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
$sql = "SELECT id, codigoPostal, municipio FROM localidades ORDER BY id LIMIT 10";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      echo "<br>"."-id: " . $row["id"]. " - codigo postal: " . $row["codigoPostal"]. " - municipio " . $row["municipio"];
//    printf (" -id:%s  - codigo postal: %s  - municipio %s \n", $row['id'], $row['codigoPostal'], $row['municipio']);


}
} else {
  echo "0 results";
}
$conn->close();
?>

</body>
</html>