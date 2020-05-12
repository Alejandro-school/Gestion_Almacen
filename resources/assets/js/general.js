'use strict';


function initPage_onDomContentLoaded() {

    var page = document.querySelector("[data-page]").getAttribute('data-page');

    if(page!=""){
        route(page);
    }else{
        return;
    }
    
    
}

function route(page) {

    switch(page) {

        case 'setupHome':

            break;

        case 'setupProduct':

        
            break;
    }

}

window.addEventListener('DOMContentLoaded', initPage_onDomContentLoaded);