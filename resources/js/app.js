require('./bootstrap');

require('alpinejs');

(function(){
    
    let message = document.getElementById('message');
    setTimeout(()=>message.remove(), 5000);
    
})();
