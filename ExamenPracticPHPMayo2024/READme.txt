<title> laXarxaIndex.php </title> PUBLICA

entrada por POST 
	viene de formulario 
	valida user/password
	si OK crea cookies y session y  header ('Location:laXarxaPrivada.php)

entrada por GET
	viene de laXarxaREGISTro?nuevoregistro

formulario user/password

boton ('Location:laXarxaRegistro.php)



<title> laXarxaRegistro </title> PUBLICA

entrada por POST 
	viene de formulario  
	valida todos los datos
	si OK header ("Location: laXarxaIndex.php?nuevoRegistro=1");

formulario registro



<title> La Xarxa Privada </title> PRIVADA

startSession

boton de logOut.php // borra cookies, destruye session // header ("location:laXarxaIndex.php ")
boton de addPostForm.php // ("Location: AddPostForm.php");




<title> AddPostForm.php </title> PRIVADA

startSession

 “FORM incluye enctype= "multipart/form-data" porque tiene campo textarea”


si formulario ok  => añade post  y  header("Location: laXarxaPrivada.php");
si no Ok => permanece en FORM
si cerrar   => header("Location: laXarxaPrivada.php");

formulario Post
Con codigo de UPLOAD de imagen



<title> laXarxaLlistatAmics.php </title> PRIVADA

se llama desde laXarxaPrivada
startSession

lista un array de registros de amigos
form de nom y/o apellido para busqueda de registro
busqueda avanzada por cualquier str de 3 caracteres en cualquien campo



<title> laXarxaLlistatAmicsMeus.php </title> PRIVADA
se llama desde laXarxaPrivada
startSession

lee en un array el registro de amigos del usuario en session
en un segundo nivel propone al usuario amigos de amigos





