
submitForm();

function submitForm() {

    const FormnovaSenha = document.querySelector("#FormnovaSenha");

    FormnovaSenha.addEventListener("submit", e => {

        e.preventDefault();

        trocaSenhaCliente(recuperaForm(FormnovaSenha));

    });
}

function trocaSenhaCliente(novaSenha) {

    $.ajax({

        url: 'assets/php/atualizaSenhaCliente.php',
        method: 'POST',
        data: novaSenha,
        success: data => {

            if (data == 'sucesso') {

                Swal.fire({
                    title: "Sucesso",
                    text: "Sua senha foi alterada com sucesso",
                    icon: "success",
                    button: "Fechar",
                }).then(result => {
                    if (result) {
                        window.location.href = 'index.php';
                    }
                });

            } else if (data == 'erroQuery') {

                Swal.fire({
                    title: "Erro interno",
                    text: "Entre em contato com o administrador",
                    icon: "success",
                    button: "Fechar",
                })

            }

        }

    });

}

function recuperaForm(form) {

    let senha = {};
    isValid = true;

    [...form.elements].forEach(element => {

        if (element.value != '') {

            senha[element.name] = element.value;

        } else {

            if (element.type != 'submit') {

                Swal.fire({
                    title: "Preencha sua senha",
                    text: "Preencha sua senha para dar continuidade",
                    icon: "warning",
                    button: "Fechar",
                });

                isValid = false;

            }

        }

    });


    if (!isValid) {

        return false;

    }

    return senha;


}