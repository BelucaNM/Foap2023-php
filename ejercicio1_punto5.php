<html>
    <head></head>
    <!-- >
    <body>
        <form action="destino.php" method="get">
        <label> Name </label>
        <input type="text" name="nombre">
        <input type="submit" name=“submit" VALUE="aceptar">
        </form>

    </body>
    <-->
    <body>
    <?php
//    if (isset($_GET["nombre"])){ 
//          echo $_GET["nombre"];}
//          echo ($_POST["nombre"].$_POST["apellido"]);}

    if (isset($_POST['submit'])){ 
        echo $_POST['nombre'];
        print_r ($_POST);
        foreach($_POST as $element) {
            print ("<BR>".$element);}
    }

    ?>
    <div>
        <form action="" method="POST">
        <label> name </label>
        <input type="text" name="nombre">
        <br>
        <label> Apellido </label>
        <input type="text" name="apellido">
        <br>
        <label> Edad </label>
        <input type="number" name="edad">
        <br>
        <label> Email</label>
        <input type="email" name="email">
        <br>
        <label> Sexo</label>
        <label>F</label>
        <input type="radio" name="sexo" value = "F">
        <label>M</label>
        <input type="radio" name="sexo" value = "M">
        <br>
        <input type="submit" name="submit" VALUE="aceptar">
        </form>
</div>

    </body>

    
</html>