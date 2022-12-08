//Funções que serão iniciadas junto com o carregamento do arquivo
mascaraInput();
submitForm();

function mascaraInput() {
    $("#cpf").mask('000.000.000-00');
    $("#telefone").mask('(00)00000-0000');
}

function submitForm() {

    const formCadastro = document.querySelector("#cadastroCliente");

    formCadastro.addEventListener("submit", e => {

        e.preventDefault();

        if (recuperaForm(formCadastro)) {

            salvaFormDb(recuperaForm(formCadastro));

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

            if (element.name == 'cpf') {
                let cpfLimpo = element.value.replace('.', '').replace('.', '').replace('-', '');

                if (validaCPF(cpfLimpo) == 'valido') {

                    user[element.name] = cpfLimpo;

                } else {

                    Swal.fire({
                        title: "CPF Inválido",
                        text: "o CPF informado no cadastro não existe",
                        icon: "warning",
                        button: "Fechar",
                    });

                    validForm = false;

                }

            } else if (element.name == 'telefone') {

                user[element.name] = element.value.replace('(', '').replace(')', '').replace('-', '');

            } else {

                user[element.name] = element.value;

            }

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

function salvaFormDb(user) {

    $.ajax({

        url: 'assets/php/cadastraCliente.php',
        method: 'POST',
        data: user,
        success: data => {

            if (data == 'sucesso') {

                Swal.fire({
                    title: "Sucesso",
                    text: "Seu cadastro foi realizado com sucesso",
                    icon: "success",
                    button: "Fechar",
                }).then(result => {

                    if (result) {
                        window.location.href = 'index.php?cpf=' + user.cpf;
                    }

                });

            } else if (data == 'jaExiste') {

                Swal.fire({
                    title: "CPF Cadastrado",
                    text: "Este CPF ja existe em nosso sistema",
                    icon: "info",
                    button: "Fechar",
                }).then(result => {

                    if (result) {
                        $("#cpf").addClass('invalidForm')
                    }

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


function validaCPF(c) {

    var i;
    var s = c;
    var c = s.substr(0, 9);
    var dv = s.substr(9, 2);
    var d1 = 0;
    var v = false;

    for (i = 0; i < 9; i++) {
        d1 += c.charAt(i) * (10 - i);
    }
    if (d1 == 0) {
        v = true;
        return ("invalido");
    }
    d1 = 11 - (d1 % 11);
    if (d1 > 9) d1 = 0;
    if (dv.charAt(0) != d1) {
        v = true;
        return ("invalido");
    }

    d1 *= 2;
    for (i = 0; i < 9; i++) {
        d1 += c.charAt(i) * (11 - i);
    }
    d1 = 11 - (d1 % 11);
    if (d1 > 9) d1 = 0;
    if (dv.charAt(1) != d1) {
        v = true;
        return ("invalido");
    }
    if (!v) {
        return ("valido");
    }
}