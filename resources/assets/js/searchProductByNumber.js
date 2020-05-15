'use strict';

function searchProductByNumber() {


    document.querySelector("#form-search").addEventListener("keyup", function(e) {
        
        e.preventDefault();

        var internal_number = document.querySelector(".internal_number").value;
        

        

        let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        fetch("/searchDinamic", {
            headers: {
              "Content-Type": "application/json",
              "Accept": "application/json, text-plain, */*",
              "X-Requested-With": "XMLHttpRequest",
              "X-CSRF-TOKEN": token
             },
            method: 'POST',
            credentials: "same-origin",
            body: JSON.stringify({
              internal_number: internal_number
            })
           })
            .then(function(response) {
                if(response.ok) {
                    return response.json()
                } else {
                    throw "Error en la llamada Ajax";
                }
            
            })
            .then(function(respuesta) {
                   
                    if(respuesta){
                        console.log(respuesta);
                        printProducts(respuesta);
                    }
                   

            })
            .catch(function(err) {
                console.log(err);
            });
        
    });
    


}

function printProducts(respuesta) {

    
    var resultSearch = "";
    var resultSearchProd = "";
    var selectprov = document.querySelector(".providers");
    var selectprod = document.querySelector(".products");


    
    for(var i=0; i<respuesta.providers.length;i++) {

        resultSearch += `
          <option value="${respuesta.providers[i].id}">${respuesta.providers[i].name}</option>
          `
    }

    for(var j=0; j<respuesta.product.length;j++) {

        resultSearchProd += `
          <option value="${respuesta.product[j].id}">${respuesta.product[j].name}</option>
          `
    }
   
    selectprov.innerHTML=resultSearch;
    selectprod.innerHTML=resultSearchProd;

    document.querySelector("#countProducts").innerText=`Productos encontrados: ${respuesta.countProducts}`;
}