mascara();
submitForm();

function mascara() {

    $("#nis").mask("00000000000000000000");

}

function submitForm() {

    const numNIS = document.querySelector("#numNIS");

    numNIS.addEventListener("submit", e => {

        e.preventDefault();

        if (recuperaForm(numNIS)) {

            atualizaNis(recuperaForm(numNIS));

        }

    });

}


function recuperaForm(form) {

    let nis = {};
    let isValid = true;

    [...form.elements].forEach(element => {

        if (element.value != '' && element.name != '') {

            if ((element.name == 'nis' && element.value.length >= 11) || element.name == 'id' || element.name == 'nomeAluno') {

                nis[element.name] = element.value;

            } else {

                Swal.fire({
                    title: "NIS incorreto",
                    text: "Preencha o número NIS com um valor válido",
                    icon: "warning",
                    button: "Fechar",
                });

                isValid = false;

            }

        } else {

            if (element.type != 'submit') {

                Swal.fire({
                    title: "Preencha o NIS",
                    text: "Preencha seu número NIS para dar continuidade no processo",
                    icon: "warning",
                    button: "Fechar",
                });

                element.classList.add('is-invalid');

                isValid = false;
            }

        }


    });

    if (!isValid) {

        return false;

    }

    return nis;

}

function atualizaNis(nis) {

    const btnEnviar = document.querySelector("#btnEnviar");

    $.ajax({

        url: 'assets/php/atualizaNis.php',
        method: 'POST',
        data: nis,
        success: data => {

            if (data == 'sucesso') {

                Swal.fire({
                    title: "Sucesso",
                    text: "NIS atualizado com sucesso",
                    icon: "success",
                    button: "Fechar",
                }).then(result => {
                    if (result) {

                        window.location.href = 'areaCliente.php';

                    }
                });

            } else if (data == 'jaCadastrado') {

                Swal.fire({
                    title: "NIS já cadastrado",
                    text: "Você ja possui um NIS cadastrado",
                    icon: "warning",
                    button: "Fechar",
                });

            }

            btnEnviar.disabled = false;
            btnEnviar.innerHTML = 'Enviar';


        },
        beforeSend: () => {

            btnEnviar.disabled = true;
            btnEnviar.innerHTML = '<span class="spinner-border spinner-border-sm text-light"></span> Enviando';

        }

    });

}