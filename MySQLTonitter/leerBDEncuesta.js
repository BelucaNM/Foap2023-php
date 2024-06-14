async function leerBDEncuesta(idEncuesta){
    console.log ( "Entro en leerBDEncuesta.js")
    let encuesta = {
        "id":idEncuesta,
        "idUsuario": "",
        "titulo": "",
        "fechaInicio":"",
        "fechaFin": "",
        "opciones": []
        };

    const update = {data:[]};
    update.data.push(encuesta);
    console.log(update);
        
    dataSon = JSON.stringify(update);
    console.log (dataSon);

      
    const options = {
        method: 'POST',
        cache: 'no-cache',
        headers: {'Content-Type': 'application/json',},
        body: JSON.stringify(update),
    };

    
    try {
            const response = await fetch('leerBDEncuesta.php', options);
            if (response.ok) { // Verificar si la respuesta es exitosa
                const resultado = await response.json();
                console.log(resultado);
                encuesta = resultado['data'];
            }
            else {throw new Error(response.statusText);}
        } catch (error) {
            console.log("Error al realizar la petición AJAX: " + error.message);
        }
    return encuesta;
};

