<html>

	<head>
		<title> laXarxaRegistro</title>
        <meta charset="utf-8">
        <meta description="Basecon favicon">
        <link rel="shortcut icon" href="laXarxaFavicon.png">
  		
  	<style> 
        <?php include "laXarxa.css"; ?>
	</style>
	</head>

	
<body>

	<?php 
    include ("header.php");
       

        function validate_input($input){ // sanear datos
            $input = trim ($input);
            $input = htmlspecialchars ($input);
            $input = stripslashes ($input);
            return $input;
        };
        function is_valid_email($str) {
           return filter_var($str, FILTER_VALIDATE_EMAIL);
        };
        function is_solo_letras($str) {
            return  ctype_alpha($str);
        };
        

         $nombreErr = $apellidosErr = $edadErr = $emailErr = "";
         $usernameErr= $password1Err = $password2Err = "";
         $nombre = $apellidos = $fNacimiento = $email = $username= $password1 = $password2 ="";
         $error= false;
 
    if (isset($_POST["enviar"])) // Validaciones
    {
        echo "<p style='background-color:blue;'> Entro en rutina de verificacion </p> ";
//       print_r($_POST);

        if (!isset ($_POST["nombre"]) || empty ($_POST["nombre"])) 
            {$nombreErr= " Nombre requerido"; $error = true;}
            else $nombre = $_POST["nombre"];
        if (!isset ($_POST["apellidos"]) || empty ($_POST["apellidos"])) 
            {$apellidosErr= " Apellidos requerido"; $error = true;}
            else $apellidos = $_POST["apellidos"];

        if (isset ($_POST["fNacimiento"])) {

            $fNacimiento = $_POST["fNacimiento"];
            $dia_actual = date("Y-m-d");
            $edad_diff = date_diff(date_create($fNacimiento), date_create($dia_actual));
            $edad= $edad_diff->format('%y');

            if ($edad < 18)  {
                    $edadErr=  " Usted tiene". $edad. " años. Debe ser mayor de 18 años";$error = true;
            } else {
                    $fNacimiento = $_POST["fNacimiento"];}}
            

        if (!isset ($_POST["email"]) || empty ($_POST["email"])) {
            $emailErr=  " Email requerido";
            $error = true;
            } else {
                if (!is_valid_email($_POST["email"])){
                    $emailErr=  " Formato Email incorrecto";
                    $error = true;
                    };
                $email = $_POST["email"];
                
            };
            

         if (!isset ($_POST["username"]) || empty ($_POST["username"])) {
            $password1Err=  " Username requerido";
            $error = true;
            } else {
                if (!is_solo_letras($_POST["username"])){
                $usernameErr=  " Formato incorrecto`. Use solo letras.";
                $error = true;
                };
            $username = $_POST["username"];
        };

        if (!isset ($_POST["password1"]) || empty ($_POST["password1"])) 
            {$password1Err=  " Password requerido";$error = true;}
            else $password1 = $_POST["password1"];
        if (!isset ($_POST["password2"]) || empty ($_POST["password2"])) 
            {$password2Err=  " Entrada requerida";$error = true;}
            else $password2 = $_POST["password2"];
        if (($password1 !== "") && ($password2 !== "") && ($password1 !== $password2))
            {$password2Err=  " Campos password no coinciden ";$error = true;}

 

        if (!$error)  {
            echo "<p style='color:green;'> Todo parece correcto </p> ";
            unset($_POST["enviar"]);
            header("Location: laXarxaIndex.php?nuevoRegistro=1");
            };
    }
    ?>
    <div id="entradaDatos">
        <form  method="post" action=""> 
        
        Nombre: <input type="text" name="nombre" value="<?php echo $nombre;?>"> 
                <span class="error" style="color:red;">* <?php echo $nombreErr;?></span><br><br>
        Apellidos: <input type="text" name="apellidos" value="<?php echo $apellidos;?>">
                <span class="error" style="color:red;">* <?php echo $apellidosErr;?></span><br><br>
        Fecha Nacimiento: <input type="date" name="fNacimiento" value="<?php echo $fNacimiento;?>">
                <span class="error" style="color:red;"> <?php echo $edadErr;?></span><br><br>
        email: <input type="text" name="email" value="<?php echo $email;?>">
                <span class="error" style="color:red;">* <?php echo $emailErr;?></span><br><br>
        username: <input type="text" name="username" value="<?php echo $username;?>"> 
                <span class="error" style="color:red;">* <?php echo $usernameErr;?></span><br><br>
        password: <input type="password" name="password1" value="<?php echo $password1;?>">
                <span class="error" style="color:red;">* <?php echo $password1Err;?></span><br><br>
        Reintroducir password: <input type="password" name="password2" value="<?php echo $password2;?>">
                <span class="error" style="color:red;">* <?php echo $password2Err;?></span><br><br>
                <input type="submit" name= "enviar" value="Submit"> 
        <!-- > value es el txt que muestra el boton. Es "Enviar" por defecto. 
                El indice en el POST es el name <-->
        </form>
    </div>
        
  
	<?php include ("footer.php")?>
	</body>


</html>