<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>La Xarxa registro con estilo</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
   <style>
    /**
* ! cambiando estilos predeterminados del navegador
**/

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: sans-serif;
}

        /**
        * ! reglas de estilo para la sección del formulario
        **/

#formulario {
        display: flex;
        flex-direction: column;
        justify-content: center;
        max-width: 400px;
        box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        padding: 50px;
}

.titulo {
    font-size: 25px;
    font-weight: bold;
    margin-bottom: 20px;
}
label {
    display: block;
    margin-bottom: 5px;
}

#formulario div input {
    width: 100%;
    height: 40px;
    border-radius: 8px;
    outline: none;
    border: 2px solid rgb(235, 225, 225);
    padding: 0 30px;
    box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
}

#formulario div {
    position: relative;
    margin-bottom: 15px;
}

#formulario div input:focus {
    border: 2px solid red;
}

/**
* ! reglas de estilo para los iconos del formulario
**/

#formulario div i {
    position: absolute;
    padding: 10px;
}

.failure-icon,
.error {
    color: red;
}

.success-icon {
    color: green;
}

.error {
    font-size: 14.5px;
    margin-top: 5px;
}

.success-icon,
.failure-icon {
    right: 0;
    opacity: 0;
}

/* Reglas de estilo para botón enviar */

button {
    margin-top: 15px;
    width: 100%;
    height: 45px;
    background-color: #f2796e;
    border: 2px solid #f2796e;
    border-radius: 8px;
    color: #fff;
    font-size: 20px;
    cursor: pointer;
    box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
    transition: all 0.1s ease;
}

button:hover {
    opacity: 0.8;
}
   </style> 
</head>
<body>
<div class="container">

    <form id="formulario">
        <div class="titulo">Registro</div>

        <!-- Entrada para nombre de Usuario -->

        <div>
            <label for="nombreDeUsuario" >Nombre de Usuario</label>
            <i class="fas fa-user" ></i>

            <input
                    type="text"
                    name="username"
                    id="nombreDeUsuario"
                    placeholder="Introducir nombre"
            />

            <i class="fas fa-exclamation-circle failure-icon" ></i>
            <i class="far fa-check-circle success-icon"></i>
 <!-- ><span id = "elUsuarioDisplay"> </span> <-->
            <div class="error"></div>

        </div>
        <div>
            <label for="apellidosDeUsuario" >Apellidos de Usuario</label>
            <i class="fas fa-user" ></i>

            <input
                    type="text"
                    name="apellidos"
                    id="apellidosDeUsuario"
                    placeholder="Introducir nombre"
            />

            <i class="fas fa-exclamation-circle failure-icon" ></i>
            <i class="far fa-check-circle success-icon"></i>
 <!-- ><span id = "elUsuarioDisplay"> </span> <-->
            <div class="error"></div>

        </div>
        <!-- Entrada de Correo Electrónico -->

        <div>
            <label for="correoElectronico">Correo Electrónico</label>
            <i class="far fa-envelope"></i>

            <input
                    type="email"
                    name="email"
                    id="correoElectronico"
                    placeholder="abc@gmail.com"
            />

            <i class="fas fa-exclamation-circle failure-icon"></i>
            <i class="far fa-check-circle success-icon"></i>
<!-- ><span id = "elCorreoDisplay"> </span><-->
            <div class="error"></div>

        </div>
        <!--   Entrada de contraseña  2 veces-->

        <div>
            <label for="contrasena1">Contraseña</label>
            <i class="fas fa-lock"></i>

            <input
                    type="password"
                    name="password1"
                    id="contrasena1"
                    placeholder="Introducir contraseña"
            />

            <i class="fas fa-exclamation-circle failure-icon"></i>
            <i class="far fa-check-circle success-icon"></i>
<!-- ><span id = "laContrasenaDisplay"> </span><-->
            <div class="error"></div>

        </div>
        <div>
            <label for="contrasena2">Contraseña</label>
            <i class="fas fa-lock"></i>

            <input
                    type="password"
                    name="password2"
                    id="contrasena2"
                    placeholder="Re-Introducir contraseña"
            />

            <i class="fas fa-exclamation-circle failure-icon"></i>
            <i class="far fa-check-circle success-icon"></i>
<!-- ><span id = "laContrasenaDisplay"> </span><-->
            <div class="error"></div>

        </div>


        <!-- otro código aquí -->

        <button id="btn" type="submit">Enviar</button>


    </form>

</div>


</body>
</html>