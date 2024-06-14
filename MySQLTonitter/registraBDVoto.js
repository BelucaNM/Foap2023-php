async function registraBDVoto( idUsuario,idEncuesta,idOpcion){
    console.log("Entro en registraBDVoto.js");

    let fechaVoto = new Date();

    let voto = {
            "idUsuario": idUsuario,
            "idEncuesta": idEncuesta,
            "idOpcion":idOpcion,
            "fechaVoto":fechaVoto 
            };
    
    const update = {data:[]};
    update.data.push(voto);
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
                const response = await fetch('registraBDvoto.php', options);
                if (response.ok) { // Verificar si la respuesta es exitosa
                    const resultado = await response.json();
                    console.log(resultado);
                    return resultado;
                } else {
                    throw new Error(response.statusText);
                }
        } 
    catch (error) {
                console.log("Error al realizar la petición AJAX: " + error.message);
                return 'error';
        }

    };

