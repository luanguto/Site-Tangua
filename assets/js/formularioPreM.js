const grauEducacao = document.querySelector("#grauEducacao");

submitForm();
selecaoTipoEducacao();
mascaras();
ativaCampoNIS();

function ativaCampoNIS() {

    const benefBolsaF = document.querySelectorAll("input[type=radio][name='bolsaFamilia']");
    const campoNIS = document.querySelector("#campoNIS");
    const nis = document.querySelector("#nis");

    benefBolsaF.forEach(element => {

        element.addEventListener("click", () => {

            if (element.value == 'Sim') {

                campoNIS.classList.remove('d-none');
                nis.setAttribute('required', 'required')

            } else {

                campoNIS.classList.add('d-none');
                nis.removeAttribute('required', 'required');
            }

        });

    });

}

function mascaras() {

    $("#telefone").mask('(00)00000-0000');
    $("#nis").mask('00000000000000000000');

}

function selecaoTipoEducacao() {

    const tipoEducacao = document.querySelector("#tipoEducacao");

    tipoEducacao.addEventListener("change", () => {
        grauEducacao.innerHTML = '<option selected disabled>Selecione uma opção</option>';
        popularInput(tipoEducacao.value);
    });

}

function popularInput(tipo) {

    let listaGrau;

    switch (tipo) {

        case 'creche':
            listaGrau = ['Berçário I (Nascidos de 01/03/2022 até 30/11/2022)', 'Berçário II (Nascidos de 01/09/2021 até 28/02/2022)', 'Maternal I (Nascidos de 01/05/2021 até 31/08/2021)', 'Maternal II (Nascidos de 01/01/2021 até 30/04/2021)', 'Maternal III (Nascidos de 01/04/2020 até 31/12/2020)', '1º Período (Nascidos de 01/04/2019 até 31/03/2020)', '2º Período (Nascidos de 01/04/2018 até 31/03/2019)'];
            break;
        case 'Pré Escola':
            listaGrau = ['1º Período (Nascidos de 01/04/2019 até 31/03/2020)', '2º Período (Nascidos de 01/04/2018 até 31/03/2019)', '3º Período (Nascidos de 01/04/2017 até 31/03/2018)'];
            break;
        case 'Fundamental':
            listaGrau = ['1º ano', '2º ano', '3º ano', '4º ano', '5º ano', '6º ano', '7º ano', '8º ano', '9º ano'];
            break;
        case 'Jovens e Adultos':
            listaGrau = ['EJA I (1º,2º,3º,4º e 5º)', 'EJA II (6º,7º,8º e 9º)'];
            break;
        default:
            listaGrau = ['Selecione uma opção'];
            break;
    }


    listaGrau.forEach(element => {

        criaElemento(element);

    });

}

function criaElemento(grau) {

    let option = document.createElement('option');

    option.value = grau;
    option.innerHTML = `${grau}`;
    grauEducacao.appendChild(option);

}


function submitForm() {

    const preMatricula = document.querySelector("#preMatricula");

    preMatricula.addEventListener('submit', e => {

        e.preventDefault();

        if (recuperaFormulario(preMatricula)) {

            enviaFormularioDb(recuperaFormulario(preMatricula));

        }


    });

}

function recuperaFormulario(form) {

    let matricula = {};

    [...form.elements].forEach(element => {

        if (element.name == 'ne' || element.name == 'av' || element.name == 'bolsaFamilia') {

            if (element.checked) {

                matricula[element.name] = element.value;

            }

        } else if (element.name == 'telefone') {

            matricula[element.name] = element.value.replace('(', '').replace(')', '').replace('-', '');

        } else {
            //COLOQUEI UNS A MAIS POR GARANTIA CONTRA BUG NO DB
            matricula[element.name] = element.value.replace("'", " ").replace("'", " ").replace("'", " ").replace("'", " ").replace("'", " ").replace("'", " ").replace("'", " ");

        }

    });

    return matricula;

}


function enviaFormularioDb(preMatricula) {

    let btnEnviaMatricula = document.querySelector("#btnEnviaMatricula");

    $.ajax({

        url: 'assets/php/preMatricula.php',
        method: 'POST',
        data: preMatricula,
        success: data => {
            let retorno = JSON.parse(data);

            if (retorno.status == 'sucesso') {

                $.ajax({

                    url: 'assets/php/enviaEmail.php?protocolo=' + retorno.protocolo,
                    success: retEmail => {

                        if (retEmail != 'erro') {

                            btnEnviaMatricula.disabled = false;
                            btnEnviaMatricula.innerHTML = 'Enviar';

                            Swal.fire({
                                title: "Sucesso! \n Você receberá um email de confirmação.",
                                text: "Caso tenha marcado as opções: NECESSIDADE ESPECIAL e/ou ALTA VULNERABILIDADE. \n Anexe os documentos comprobatórios no link que está no seu email, em caso de dúvidas procure a unidade escolar ou a SEME em até 48h.",
                                icon: "success",
                                button: "Fechar",
                            }).then(result => {
                                if (result) {
                                    window.location.href = 'areaCliente.php';
                                }
                            });

                        }//Fim condição diferente de erro

                    }//Fim success emil

                });//Fim ajax de envio email

            } else if (retorno.status == 'erro') {

                Swal.fire({
                    title: "Erro interno",
                    text: "Entre em contato com o Administrador",
                    icon: "warning",
                    button: "Fechar",
                });

            }

        },
        beforeSend: () => {

            btnEnviaMatricula.disabled = true;
            btnEnviaMatricula.innerHTML = '<span class="spinner-border spinner-border-sm text-light"></span> Enviando';

        }

    });

}