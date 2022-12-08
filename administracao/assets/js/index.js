submitForm();

function submitForm() {

    const loginAdm = document.querySelector("#loginAdm");

    loginAdm.addEventListener('submit', e => {

        e.preventDefault();

        if (recuperaForm(loginAdm)) {

            realizaLogin(recuperaForm(loginAdm));

        }

    });

}

function recuperaForm(form) {

    let user = {};
    let validForm = true;
    const avisoForm = document.querySelector(".avisoForm");

    [...form.elements].forEach(element => {

        element.classList.remove('invalidForm');

        if (element.value != '' && element.type != 'submit') {

            user[element.name] = element.value;

        } else {

            if (element.type != 'submit') {
                validForm = false;
                element.classList.add('invalidForm');
                avisoForm.innerHTML = 'Preencha todas as informações!';
                avisoForm.style.display = 'block'

            }

        }

    });

    if (!validForm) {

        return false;

    }

    return user;


}

function realizaLogin(user) {

    $.ajax({

        url: 'assets/php/loginAdm.php',
        method: 'POST',
        data: user,
        success: data => {

            if (data == 'sucesso') {

                //REDIRECIONAR PARA A TELA DO CLIENTE
                window.location.href = 'areaAdm.php';

            } else if (data == 'naoExiste') {

                Swal.fire({
                    title: "Usuario inválido",
                    text: "Email ou senha não encontrados em nosso sistema",
                    icon: "warning",
                    button: "Fechar",
                });

            } else if (data == 'erroQuery') {

                Swal.fire({
                    title: "Erro interno",
                    text: "Entre em contato com o administrador",
                    icon: "warning",
                    button: "Fechar",
                });

            }

        }
    });

}