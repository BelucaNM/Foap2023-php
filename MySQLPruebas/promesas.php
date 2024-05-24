<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<script>

let promise1 = new Promise(function(resolve, reject) {
    // Ejecutor (el código productor, "cantante")
    // después de 1 segundo, indica que la tarea está hecha con el resultado "hecho"
  setTimeout(() => resolve("hecho"), 1000);  // si la ejecucion fuera exito state = fullfiled result="done"

  });
let promise2 = new Promise(function(resolve, reject) {
    // Ejecutor (el código productor, "cantante")
    // después de 1 segundo, indica que la tarea está hecha con el resultado "hecho"

  setTimeout(() => reject(new Error("¡Vaya!")), 1000); si la ejecucion fallara state = rejected result="error"
  });

/*  
Las propiedades state y result del objeto Promise son internas. 
No podemos acceder directamente a ellas. 
Podemos usar los métodos .then/.catch/.finally para eso. Se describen a continuación.

*/

promise1.then(
//  function(result) { /* manejar un resultado exitoso */ },
//  function(error) { /* manejar un error */ }
  result => alert(result), // promesa 1 es exito , entoncer muestra "hecho!" después de 1 segundo
  error => alert(error) // no se ejecuta
);

/* 
Si solo nos interesan las terminaciones exitosas, 
entonces podemos proporcionar solo un argumento de función para .then: 
*/

promise1.then(alert); // muestra "hecho!" después de 1 segundo

promise2.then(
//  function(result) { /* manejar un resultado exitoso */ },
//  function(error) { /* manejar un error */ }
  result => alert(result), // no se ejecuta
  error => alert(error) // promesa 2 es fracaso ,muestra "Error: ¡Vaya!" después de 1 segundo
);

/* 
Si solo nos interesan los errores, entonces podemos usar null como primer argumento:
.then(null, errorHandlingFunction). 
O podemos usar .catch(errorHandlingFunction), que es exactamente lo mismo:
*/

// .catch(f) es lo mismo que promise.then(null, f)
promise2.catch(alert); // muestra "Error: ¡Vaya!" después de 1 segundo




  </script>
<body>
    
</body>
</html>