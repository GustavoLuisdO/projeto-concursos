let btn = document.querySelectorAll("button[id='btn-message']");
                                  
    let alerta = document.getElementById("alerta-sucesso");

    for (let i = 0; i < btn.length; i++) {
        btn[i].addEventListener("click", function() {
            
        if(alerta.style.display == "none"){
            alerta.style.display = "block";
            return;
        }

        console.log(btn[i]);
        });
    }