function subscripciones (){
    let $idSubscriptor = $_SESSION["idUsuario"];
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    print(checkboxes);
    checkboxes.forEach(function(){
        var $idSubscripto = this.value;
        
        var $existe_dupla = consultaDupla ($idSubscriptor, $idSubscripto); // 3 estados :existe (true), inactiva (null), no existe(false)
        
        if((this.checked) && (isNull($existe_dupla))) { 
            activ_dupla($idSubscriptor, $idSubscripto);
        } else if((this.checked) && !($existe_dupla))  { 
            crea_dupla($idSubscriptor, $idSubscripto)
        }else { if(!(this.checked)&& ($existe_dupla)) { 
            desact_dupla($idSubscriptor, $idSubscripto)};
        };      
    });
};

function consultaDupla($idSubscriptor, $idSubscripto){
    fetch('mySqlQueryDuplas.php')
    .then(response => {
        if (!response.ok) {
            throw new Error('No hay duplas');
            }
        return response.json();
        })
    .then (data => {
        duplas = data; 
        console.log("duplas", duplas);
        duplas.forEach(dupla => {

            console.log ("dupla es ", dupla);
            
        })
        })

    .catch(error => {
        console.error('Error al recibir la lista de duplas:', error);
        });
    };
    
function activ_dupla(idSubscriptor, idSubscripto){

};
function desact_dupla(idSubscriptor, idSubscripto){

};