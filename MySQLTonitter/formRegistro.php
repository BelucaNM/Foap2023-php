<html>

	<head>
		<title> MySQLTonitter registroForm.php </title>
        <meta charset="utf-8">
        <meta description="Basecon favicon">
        <link rel="shortcut icon" href=".\imgCodigo\laXarxaFavicon.png">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> 

  		
    <? //php //include "estilo.css"; ?>
	
	</head>

	
<body>

	<?php 
    include ("header.php");
       

        include_once "funciones.php";

        
         $nombreErr = $apellidosErr = $edadErr = $emailErr = "";
         $usernameErr= $password1Err = $password2Err = "";
         $dniErr =  $fNacimientoErr= "";
         $nombre = $apellidos = $fNacimiento = $email = $username= $password1 = $password2 = $password = "";
         $dni =  $fNacimiento = $telefono = $empresa = $codigoPostal= "";
         $error= false;
 
    if (isset($_POST["submit"])) // Validaciones
    {
//      echo "<p> Entro en rutina de verificacion....... </p> ";
 //     print_r($_POST);

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

        if (!isset ($_POST["fNacimiento"]) || empty ($_POST["fNacimiento"])) {
            $fNacimientoErr= " Fecha requerido"; 
            $error = true;}
            else {
// Codigo para campo fecha en HTML
                  $fNacimiento = $_POST["fNacimiento"];
    //          $dia_actual = date("Y-m-d");
    //          $edad_diff = date_diff(date_create($fNacimiento), date_create($dia_actual));
    //          $edad= $edad_diff->format('%y');


    //            echo $fNacimiento; // formato d/m/a
                list($d,$m,$y) = explode("/",$_POST['fNacimiento']);
                $timestamp = mktime(0,0,0,$m,$d,$y);
                $date = date("Y-m-d",$timestamp);
                $dia_actual = date("Y-m-d");
                $edad_diff = date_diff(date_create($date), date_create($dia_actual));
                $edad= $edad_diff->format('%y');
    //            echo $edad;
                if ($edad < 18)  {
                        $fNacimientoErr=  " Usted tiene ". $edad. " años. Debe ser mayor de 18 años";
                        $error = true;
                } else {
                        $fNacimiento = $_POST["fNacimiento"];
                };
                };
            

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
    <div id="entradaDatos" class = "container pt-3 pb-3 mt-3 bg-light shadow-lg">
        <form  method="post" action=""> 
        <div class="form-floating mb-1 mt-1">
            <input type="text" class="form-control" id = "dni" name="dni" value="<?=$dni;?>" placeholder="Introduzca Dni">
            <label for = "dni">Dni</label>
            <span class="error" style="color:red;"><?="*".$dniErr;?></span>
        </div> 
        <div class="form-floating mb-1 mt-1">
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?=$nombre;?>" placeholder="Introduzca nombre">
            <label for = "nombre">Nombre</label>
            <span class="error" style="color:red;"><?="*".$nombreErr;?></span>
        </div>
        <div class="form-floating mb-1 mt-1">  
            <input type="text" class="form-control" id ="apellidos" name="apellidos" value="<?=$apellidos;?>" placeholder="Introduzca apellidos">
            <label for = "apellidos">Apellidos</label>
            <span class="error" style="color:red;"><?="*".$apellidosErr;?></span>
        </div>
        <div class="form-floating mb-1 mt-1">
            <input type="text" class="date form-control" id="fNacimiento" name="fNacimiento" value="<?=$fNacimiento;?>" placeholder="Introduzca fecha">
            <label for ="fNacimiento" >Fecha Nacimiento</label>
            <span class="error" style="color:red;"><?="*".$fNacimientoErr;?></span>
        </div> 
        <div class="form-floating mb-1 mt-1">
            <label for ="empresa" class="form-label">Empresa</label>
			<input class="form-select" list="empresas" id="empresa" name="empresa" placeholder="Seleccione empresa">
            <datalist id="empresas">
            <option value="">---------</option>
            <?php  $empresaErr = creaSelEmpresas();?>
            </datalist>
		    <span id="empresaError" style="color:red;"></span>
        </div>
        <div class="form-floating mb-1 mt-1">      
            <label for ="codigoPostal" class="form-label">Codigo Postal</label>
			<input class="form-select" list="codigos" id="codigoPostal" name="codigoPostal" placeholder="Seleccione CodPos">
            <datalist id="codigos">
			<option value="">---------</option>
            <?php  $codigoPostalError = creaSelCPostal();?>
			</datalist>
		    <span id="codigoPostalError" style="color:red;"></span>
        </div>
        <div class="form-floating mb-1 mt-1">
            <label for ="telefono" class="form-label">Teléfono</label>
			<input type="text" class="form-control" id="telefono" name="telefono" size="11" value="<?=$telefono;?>" placeholder="Introduzca teléfono">
			<br><span id="telefonoError" style="color:red;"></span>
        </div>
        <div class="form-floating mb-1 mt-1">
            <label for ="email" class="form-label">eMail</label>
            <input type="text" class="form-control" id="email" name="email" size="30" value="<?=$email;?>" placeholder="Introduzca eMail">
            <span class="error" style="color:red;">* <?=$emailErr;?></span>
        </div> 
        <div class="form-floating mb-1 mt-1">
            <label for ="username" class="form-label" >Username</label>
            <input type="text" class="form-control" id="username" name="username" size="30" value="<?=$username;?>" placeholder="Introduzca username"> 
            <span class="error" style="color:red;"><?="*".$usernameErr;?></span>
        </div>
        <div class="form-floating mb-1 mt-1">
            <label for ="password1" class="form-label" >Password</label>
            <input type="password" class="form-control" id="password1" name="password1" value="<?=$password1;?>" placeholder="Introduzca password">
            <span class="error" style="color:red;"><?="*".$password1Err;?></span>
        </div> 
        <div class="form-floating mb-1 mt-1">
            <label for ="password2" class="form-label" >Reintroduzca password</label>    
            <input type="password" class="form-control" id="password2" name="password2" value="<?=$password2;?>" placeholder="ReIntroduzca password">
            <span class="error" style="color:red;"><?="*".$password2Err;?></span>
        </div> 
        <div class="form-floating mb-1 mt-1">    
                <input class="btn btn-primary" type="submit" name= "submit" value="Submit"> 
        <!-- > value es el txt que muestra el boton. Es "Enviar" por defecto. 
                El indice en el POST es el name <-->
        </div>
        </form>
    </div>

    <div class = "container pt-3 pb-3 mt-3 bg-light shadow-lg">
        <a class = "btn btn-lg btn-link" href = "formLogin.php?nuevoRegistro=1"> Salir de Registro </a>
    </div>
    
        
  
 <?php include ("footer.php")?> 

</body>
</html>