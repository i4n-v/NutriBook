require('./bootstrap');

require('alpinejs');

(function(){
    
    let message = document.getElementById('message');

    if(!!message){
        setTimeout(()=>message.remove(), 5000);
    }

})();