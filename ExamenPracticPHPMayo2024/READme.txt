<title> laXarxaIndex.php </title> PUBLICA

entrada por POST 
	viene de form 
	valida user/password
	si OK crea cookies y session
	header ('Location:laXarxaPrivada.php)

entrada por GET
	viene de laXarxaREGISTro?nuevoregistro





<title> laXarxaRegistro </title> PUBLICA

entrada por POST 
	viene de form 
	valida todos los datos
	si OK header("Location: laXarxaIndex.php?nuevoRegistro=1");



<title> La Xarxa Privada </title>

startSession

boton de logOut.php // borra cookies, destruye session // header ("location:laXarxaIndex.php ")
boton de addPostForm.php 


<title> AddPostForm.php </title>

startSession
 FORM incluye enctype= "multipart/form-data" porque tiene campo textarea
 codigo de UPLOAD de imagen

si ok añade post , header("Location: laXarxaPrivada.php");
si no Ok permanece en FORM
si cerrar   ,     header("Location: laXarxaPrivada.php");



