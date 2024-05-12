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
	con codigo de UPLOAD de imagen

