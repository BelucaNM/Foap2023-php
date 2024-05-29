<html>
<head>
    <title> La Xarxa Tonitter </title>
    <meta charset="utf-8">
    <meta description="Basecon favicon">
    <link rel="shortcut icon" href="laXarxaFavicon.png">
    <link rel="canonical" href="https://multitod.com/iconos-para-paginas-web-codigo-php.php" />
    <link rel="stylesheet" type="text/css" href="estilo.css" title="style" />
        
</head>

<body>

    <?php
    include ("header.php");
    session_start();
  
    if (isset($_SESSION["usuario"])) { // Identificación Correcta . En XarxaPrivada
        $user =$_SESSION["usuario"]; 

    } else {
        echo "La sesión no esta abierta o no tengo todavia ningun resultado"  ;
        header ("location:formLogin.php ");
    };

    ?>
    <div id="laXarxaTonitter">
        <p name=" usuario"><strong>HOLA <?=$user;?> !</strong></p>
        <a class="btnStack" href="logOut.php">Log Out</a>
        <a class="btnStack" href='buscarMensajes.php' > Buscar Mensajes </a> 
        <a class="btnStack" href='buscarPersonas.php' > Buscar Subscripciones </a> 
        <a class="btnStack" href='addMensaje.php' > Añadir una publicacion </a> 
        <a class="btnStack" href='addSuscripcion.php' > Añadir una Subscripcion </a> 
        <a class="btnStack" href="llistatAmics.php">Listado de  Amics</a>
        
     
    </div>
    
    <div class="lasCards"> 
    <?php  
    
    // arranca conexion a BD
    $servername = "localhost";
    $adminuser = "root";
    $adminpwd = "";
    $dbname = "test";
        
    // Create connection
    $conn = new mysqli($servername, $adminuser, $adminpwd, $dbname);
        
    // Check connection
        
    if ($conn->connect_error) {
        $error = "Connection failed: No se puede acceder a la Xarxa";
        die("Connection failed: No se puede acceder a la Xarxa".$conn->connect_error);
                            
    } else {
             
        $sql ="SELECT mensajes.id, mensajes.fecha, personas.nombre as nombre_user, personas.apellido as apellido_user,mensajes.titulo, 
                mensajes.descripcion,mensajes.imagenURL 
                FROM mensajes 
                JOIN
                personas ON mensajes.idUser = personas.id ORDER BY fecha LIMIT 10";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        // output data of each row
            while($row = $result->fetch_assoc()) {
    
                $id = $row["id"];
                $fecha = $row["fecha"];
                $nombre_user = $row["nombre_user"];
                $apellido_user = $row["apellido_user"];
                $titulo = $row["titulo"];
                $descripcion = $row["descripcion"];
                $imagenURL = $row ["imagenURL"];
                
    ?>
    
                <div class="card">
                    <h2>POST</h2>
                    <h4><b><?= $titulo ?></b></h4>
                    <h4><b><?= $nombre_user." ".$apellido_user?></b></h4> 
                    <h5><?= $fecha ?></h5>
                    <div class="container">
                        <img src="<?= $imagenURL ?>">
                        <p><?= $descripcion ?></p>
                    </div>
                </div>
    <?php
            };
        };
    };
    $conn->close();
    ?>
    </div>
    <?php include ("footer.php"); ?>
</body>
</html>