"use strict";

function initPage_onDomContentLoaded() {
    var page = document.querySelector("[data-page]").getAttribute("data-page");

    if (page != "") {
        route(page);
    } else {
        return;
    }
}

function route(page) {
    switch (page) {
        case "setupHome":
            break;

        case "setupProduct":
            

            break;
    }
}

/*function addProvidersPrice() {
    var checks = document.querySelectorAll(".checkProv");
    var displayProv = document.querySelector(".displayProv");

    for (var i = 0; i < checks.length; i++) {
        
        checks[i].addEventListener("click", function() {            

                if (this.checked) {
                    
                    displayProv.innerHTML = `
                    <div class="form-group">
                    <label for="logo">Precio</label>
                    <input class="form-control" type="text" name="price" value="">
                    <p class="alert-warning"></p>
                    </div>`;
                } else {
                    displayProv.innerHTML = "";
                } 
               
              
            
        });
    }

}*/

window.addEventListener("DOMContentLoaded", initPage_onDomContentLoaded);
