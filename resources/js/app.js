require('./bootstrap');

require('alpinejs');

(function(){
    
    let message = document.getElementById('message');

    if(!!message){
        setTimeout(()=>message.remove(), 5000);
    }

})();

window.desabilitar = () => {
    
    let form = document.querySelectorAll(".disable").length;

    for(let i = 0; i < form; i++){
      let input = document.querySelectorAll(".disable")[i];
      input.disabled = !input.disabled == true;
    }

  }
