verificaAlteracao();

function verificaAlteracao() {

    let input = document.querySelectorAll("input");

    input.forEach(element => {

        element.addEventListener("change", () => {

            alteraIcone(element.name);

        });

    });

}


function alteraIcone(ident) {

    let lNe = document.querySelector("#neLabel");
    let lAv = document.querySelector("#avLabel");

    if (ident == 'ne') {

        lNe.innerHTML = '<i class="fa-solid fa-check"></i>';
        lNe.style.color = '#fff';
        lNe.style.background = '#baf9b9';
    }

    if (ident == 'av') {

        lAv.innerHTML = '<i class="fa-solid fa-check"></i>';
        lAv.style.color = '#fff';
        lAv.style.background = '#baf9b9';
        //#baf9b9

    }

}