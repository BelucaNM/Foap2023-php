function grabaSubscripciones ($idUser){
    console.log ( "Entro en grabaSubscripciones.js")
    let $idSubscriptor = $idUser;
    const checkboxes = document.getElementsByName("checkBox");
    console.log(checkboxes);
    
    checkboxes.forEach(item => function(item) {
        let $idsiguiendoA = item.value
        let $existe_dupla = item.previousElementSibling.innerHTML 
        let $activa = item.checked
        const update = {
            subscriptor: $idSubscriptor,
            siguiendoA: $idsiguiendoA,
            activa: $activa,
            existe_dupla: $existe_dupla
            }
        

        const options = {
            method: 'POST',
            headers: {
            'Content-Type': 'application/json',
            },
            body: JSON.stringify(update),
            };
        
        const enviar = async () => {
                const data = {
                    subscriptor: $idSubscriptor,
                    siguiendoA: $idsiguiendoA,
                    activa: $activa,
                    existe_dupla: $existe_dupla
                    };
                try {
                    let response = await fetch('updateSubscripciones.php', {
                        method: "POST",
                        cache: 'no-cache',
                        headers: { "Content-Type": "application/json" },
                        body: JSON.stringify(data)
                    });
                    if (response.ok) {
                        console.log(response);
                        const rta2 = await response.json();
                        console.log(rta2);
                    }
                    else {
                        throw new Error(response.statusText);
                    }
                } catch (err) {
                    console.log("Error al realizar la petición AJAX: " + err.message);
                }
            }
        enviar();
        });
    };

function saluda(user){
console.log("Hola" + user);
console.log(" estoy en pruebas ");
let $idSubscriptor = user;
console.log ($idSubscriptor);
const checkboxes = document.getElementsByName("checkBox");
item = checkboxes[0];
    let $idsiguiendoA = item.value
    let $existe_dupla = item.previousElementSibling.innerHTML 
    let $activa = item.checked
    const update = {
        subscriptor: $idSubscriptor,
        siguiendoA: $idsiguiendoA,
        activa: $activa,
        existe_dupla: $existe_dupla
        }
    

    const options = {
        method: 'POST',
        headers: {
        'Content-Type': 'application/json',
        },
        body: JSON.stringify(update),
        };
    
    const enviar = async () => {
            const data = {
                subscriptor: $idSubscriptor,
                siguiendoA: $idsiguiendoA,
                activa: $activa,
                existe_dupla: $existe_dupla
                };
            try {
                let response = await fetch('updateSubscripciones.php', {
                    method: "POST",
                    cache: 'no-cache',
                    headers: { "Content-Type": "application/json" },
                    body: JSON.stringify(data)
                });
                if (response.ok) {
                    console.log(response);
                    const rta2 = await response.json();
                    console.log(rta2);
                }
                else {
                    throw new Error(response.statusText);
                }
            } catch (err) {
                console.log("Error al realizar la petición AJAX: " + err.message);
            }
        }
    enviar();



};
