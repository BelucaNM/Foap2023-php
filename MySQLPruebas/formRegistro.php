<html>

	<head>
		<title> MySQLPruebas registroForm.php </title>
        <meta charset="utf-8">
        <meta description="Basecon favicon">
        <link rel="shortcut icon" href="laXarxaFavicon.png">
  		
  	<style> 
        <?php include "estilo.css"; ?>
	</style>
	</head>

	
<body>

	<?php 
    include ("header.php");
       

        include_once "funciones.php";

        
         $nombreErr = $apellidosErr = $edadErr = $emailErr = "";
         $usernameErr= $password1Err = $password2Err = "";
         $dniErr =  $fNacimientoErr= "";
         $nombre = $apellidos = $fNacimiento = $email = $username= $password1 = $password2 = $password = "";
         $dni =  $fNacimiento= "";
         $error= false;
 
    if (isset($_POST["submit"])) // Validaciones
    {
        echo "<p> Entro en rutina de verificacion....... </p> ";
 //       print_r($_POST);

         if (!isset ($_POST["dni"]) || empty ($_POST["dni"])) 
            {$dniErr= " DNI requerido"; $error = true;
            } else {
                if (!is_valid_DNI($_POST["dni"])){
                    $dniErr=  " Formato DNI incorrecto";
                    $error = true;
                } else {
                    $dni = $_POST["dni"];
            }
        };

        if (!isset ($_POST["nombre"]) || empty ($_POST["nombre"])) 
            {$nombreErr= " Nombre requerido"; $error = true;}
            else $nombre = validate_input($_POST["nombre"]);

        if (!isset ($_POST["apellidos"]) || empty ($_POST["apellidos"])) 
            {$apellidosErr= " Apellidos requerido"; $error = true;}
            else $apellidos = validate_input($_POST["apellidos"]);

        if (isset ($_POST["fNacimiento"])) {

            $fNacimiento = $_POST["fNacimiento"];
            $dia_actual = date("Y-m-d");
            $edad_diff = date_diff(date_create($fNacimiento), date_create($dia_actual));
            $edad= $edad_diff->format('%y');

            if ($edad < 18)  {
                    $edadErr=  " Usted tiene". $edad. " años. Debe ser mayor de 18 años";$error = true;
            } else {
                    $fNacimiento = $_POST["fNacimiento"];}}
            

        $telefono = $_POST["telefono"];
        $empresa = $_POST["empresa"]; 
        $codPostal = $_POST["codigoPostal"];       
       
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
            $usernameErr=  " Username requerido";
            $error = true;
            } else {
                if (!is_solo_letras($_POST["username"])){
                $usernameErr=  " Formato incorrecto`. Use solo letras.";
                $error = true;
                };
                $username = $_POST["username"];
        };

        if (!isset ($_POST["password1"]) || empty ($_POST["password1"])) 
            {$password1Err=  " Password requerido";$error = true;
            } else {
                if (!is_valid_pwd ($_POST["password1"])){
                    $password1Err=  " Debe contener 1 mayuscula, 1minuscula, 1caracterEspecial, y de 6 a 8 caracteres.";$error = true;
                }else{
                    $password1 = $_POST["password1"];
                };
            };

        if (!isset ($_POST["password2"]) || empty ($_POST["password2"])) 
            {$password2Err=  " Entrada requerida";$error = true;}
            else $password2 = $_POST["password2"];
        if (($password1 !== "") && ($password2 !== "") && ($password1 !== $password2))
            {$password2Err=  " Campos password no coinciden ";$error = true;}

 
          
        if (!$error)  {
            unset($_POST["submit"]);
            echo "<p style='color:green;'> Todo parece correcto </p> ";
            $error = alta_personas ($dni, $nombre, $apellidos, $fNacimiento, $telefono, $codPostal, $empresa, $email, $username, $password1);
            ;
            if (!$error) { // Alta de registro correcto 
                echo "<p style='color:green;'> Alta de registro correcto </p> ";
                $nombre = $apellidos = $fNacimiento = $email = $username= $password1 = $password2 = $password = "";
                $dni =  $fNacimiento= "";
            } else {
                echo "<p style='color:red;'> Error al dar de alta el registro </p> ";            
            };
        };
    }
    ?>
    <div id="entradaDatos">
        <form  method="post" action=""> 
        <div>
            <label> Dni:</label><input type="text" id = "dni" name="dni" value="<?=$dni;?>">
            <span class="error" style="color:red;">* <?=$dniErr;?></span>
        </div><br> 
        <div>
            <label >Nombre:</label><input type="text" name="nombre" value="<?=$nombre;?>">
            <span class="error" style="color:red;">* <?=$nombreErr;?></span>
        </div><br> 
        <div>  
            <label >Apellidos:</label><input type="text" name="apellidos" value="<?=$apellidos;?>">
            <span class="error" style="color:red;">* <?=$apellidosErr;?></span>
        </div><br>
        <div>
            <label >Fecha Nacimiento:</label>
            <input type="date" name="fNacimiento" value="<?=$fNacimiento;?>">
            <span class="error" style="color:red;">* <?=$fNacimientoErr;?></span>
        </div><br> 
        <div>
            <label >Empresa: </label>
			<select id="empresa" name="empresa">
            <option value="">---------</option>
            <?php  $empresaErr = creaSelEmpresas();?>
			</select>
		    <span id="empresaError" style="color:red;"><?=$empresaErr;?></span>
        </div><br>
        <div>      
            <label>Codigo Postal: </label>
			<select id="lsel" name="codigoPostal">
			<option value="">---------</option>
            <?php  $codigoPostalError = creaSelCPostal();?>
			</select>
		    <span id="codigoPostalError" style="color:red;"></span>
        </div><br>
        <div>
            <label>Teléfono:</label>
			<input id="telefono" name="telefono" type="text" size="11"></label>
			<br><span id="telefonoError" style="color:red;"></span>
        </div><br>
        <div>
        <label >eMail:</label>
            <input type="text" name="email" size="30" value="<?=$email;?>">
            <span class="error" style="color:red;">* <?=$emailErr;?></span>
        </div><br> 
        <div>
            <label >Username:</label>
            <input type="text" name="username" size="30" value="<?=$username;?>"> 
            <span class="error" style="color:red;">* <?=$usernameErr;?></span>
        </div><br> 
        <div>
            <label >Password:</label>
            <input type="password" name="password1" value="<?=$password1;?>">
            <span class="error" style="color:red;">* <?=$password1Err;?></span>
        </div><br> 
        <div>
            <label >Reintroduzca password:</label>    
            <input type="password" name="password2" value="<?=$password2;?>">
            <span class="error" style="color:red;">* <?=$password2Err;?></span>
        </div><br> 
        <div>    
                <input type="submit" name= "submit" value="Submit"> 
        <!-- > value es el txt que muestra el boton. Es "Enviar" por defecto. 
                El indice en el POST es el name <-->
        </div><br>
        </form>
        <a class="btnStack" href = "formLogin.php?nuevoRegistro=1"> Salir de Registro </a>
    </div>
        
  
 <?php include ("footer.php")?> 

</body>
</html>