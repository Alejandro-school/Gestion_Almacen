function searchProducts() {

    document.querySelector("#form-search-products").addEventListener("keyup", function(e) {
        
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
                        printProducts(respuesta);
                        
                    }
                   

            })
            .catch(function(err) {
                console.log(err);
            });
        
    });

}

function printProducts(respuesta) {


 console.log(respuesta);
 var parentTable = document.querySelector(".parent-table");
 
 
 var resultSearch = "";

 while(parentTable.firstChild) {
     parentTable.removeChild(parentTable.firstChild);
 }

 document.querySelector("#countProducts").innerHTML=`<p>Productos encontrados: ${respuesta.countProducts}</p>`;

 resultSearch = ` <thead class="bg-orange">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Codigo Producto</th>
                    <th scope="col">Codigo interno</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Acciones</th>
                </tr>
                </thead>`;

 for(var i=0; i<respuesta.product.length;i++) {
    resultSearch+=`
        
        <tbody>
           
            <tr>
                <td>${respuesta.product[i].id}</td>
                <td>${respuesta.product[i].name}</td>
                <td>${respuesta.product[i].id_prodfab}</td>
                <td>${respuesta.product[i].internal_number}</td>
                <td><img src="http://gestion-almacen.com.devel/images/${respuesta.product[i].image}" alt=""></td>
                <td>
                
                <a href="http://gestion-almacen.com.devel/modifyProduct/${respuesta.product[i].id}"><img src="http://gestion-almacen.com.devel/images/pencil.svg" alt=""></a>
                
                    <form method="post" action="http://gestion-almacen.com.devel/deleteProduct" style="display:inline">
                    <input type="hidden" name="_token" value="2NpEQKO50dwlMVRFkTLDp0f8avQevsQWdse47Mnq"> 
                   
                    <input type="hidden" name="id_product" value="{{$prod->id}}">
                    <button class="btn btn-danger" type="submit">Borrar</button>
                    
                    </form>
                

                </td>
            </tr>

           
          
        </tbody>`
 }

 parentTable.innerHTML=resultSearch;

 

}