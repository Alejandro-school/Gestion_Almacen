function insertProvidersInProducts() {

        document.querySelector("#form-createProvider").addEventListener("submit", function(e) {
            
            e.preventDefault();
    
            var id_product= document.querySelector("#id_product").value;
            var id_provider= document.querySelector("#id_provider").value;
            var price= document.querySelector("#price").value;

            let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    
            fetch("/saveProvider", {
                headers: {
                  "Content-Type": "application/json",
                  "Accept": "application/json, text-plain, */*",
                  "X-Requested-With": "XMLHttpRequest",
                  "X-CSRF-TOKEN": token
                 },
                method: 'POST',
                credentials: "same-origin",
                body: JSON.stringify({
                  id_product: id_product,
                  id_provider: id_provider,
                  price: price
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
                       console.log(respuesta);
                      if(respuesta) {
                          document.querySelector(".success-create").innerHTML+=`<p class="alert-success">${respuesta.success}</p>`
                      }
                       
    
                })
                .catch(function(err) {
                    console.log(err);
                });
            
        });
        
}