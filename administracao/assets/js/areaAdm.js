buscaRegistros();
recuperaPesquisa();

function buscaRegistros() {

    const bodyTable = document.querySelector("#bodyTable");

    $.ajax({

        url: 'assets/php/buscaRegistros.php',
        success: data => {

            bodyTable.innerHTML = data;
            ativaBotoesStatus();
            ativaClienteModal();
            exportaExcel();
        },
        beforeSend: () => {

            bodyTable.innerHTML = '<tr><td colspan="11" class="text-center"><div class="spinner-border text-primary" role="status"><span span class="visually-hidden" > Loading...</span></div ></td></tr>';

        }

    });

}

function ativaBotoesStatus() {

    let btnStatus = document.querySelectorAll(".dropdown-item");

    btnStatus.forEach(element => {

        element.addEventListener("click", () => {

            atualizaStatusCliente(element.dataset.status, element.dataset.id);

        });

    });

}

function atualizaStatusCliente(status, id) {

    $.ajax({

        url: 'assets/php/atualizaStatusCliente.php?status=' + status + "&id=" + id,
        success: data => {

            if (data != 'erroQuery' || data != 'erro') {

                Swal.fire({
                    title: "Sucesso",
                    text: "Status atualizado com sucesso",
                    icon: "success",
                    button: "Fechar",
                }).then(result => {
                    if (result) {
                        buscaRegistros();
                    }
                });

            }

        }

    });

}

function recuperaRelatorio(id) {

    let btnAbreNe = document.querySelector("#abrirNe");
    let btnAbreAv = document.querySelector("#abrirAv");

    $.ajax({

        url: 'assets/php/relatorioCliente.php?id=' + id,
        success: data => {

            console.log(data);

            let cliente = JSON.parse(data);
            let btnImpressaoIndividual = document.querySelector("#btnImpressaoIndividual");

            btnImpressaoIndividual.setAttribute('href', 'impressao.php?id=' + id);


            $("#nomeResponsavel").val(cliente.nome_responsavel);
            $("#emailResponsavel").val(cliente.email);
            $("#cpfResponsavel").val(cliente.cpf);
            $("#telefoneResponsavel").val(cliente.telefoneResp);
            $("#linkDocumentacao").attr('href', cliente.linkDocumentacao);


            $("#nomeAluno").val(cliente.nome);
            $("#dtNasc").val(cliente.dataNasc);
            $("#tipoEducacao").val(cliente.tipoEducacao);
            $("#grauEducacao").val(cliente.grauEducacao);
            $("#telefone").val(cliente.telefone);
            $("#endereco").val(cliente.endereco);
            $("#referencia").val(cliente.referencia);
            $("#escolaOrigem").val(cliente.escolaOrigem);
            $("#primeiraOpcaoEscola").val(cliente.primeiraUnidadeEscola);
            $("#segundaOpcaoEscola").val(cliente.segundaUnidade);
            $("#ne").val(cliente.ne);
            $("#av").val(cliente.av);
            $("#bolsaFamilia").val(cliente.bolsaFamilia);
            $("#nis").val(cliente.nis);
            $("#observacao").val(cliente.observacao);
            $("#dataInscricao").val(cliente.dataCadastro);
            $("#numeroProtocolo").val(cliente.protocolo);
            $("#statusMatricula").val(cliente.statusMatricula);
            $("#statusEmail").val(cliente.statusEmail);

            btnAbreNe.setAttribute("href", 'abreArquivoCliente.php?id=' + id + '&doc=ne');
            btnAbreNe.setAttribute("target", '_blank');

            btnAbreAv.setAttribute("href", 'abreArquivoCliente.php?id=' + id + '&doc=av');
            btnAbreAv.setAttribute("target", '_blank');

            liberaEdicao();
            $("#exampleModal").modal('show');
        }

    });

}

function ativaClienteModal() {

    let cliente = document.querySelectorAll(".cliente");

    cliente.forEach(element => {

        element.addEventListener("click", () => {

            recuperaRelatorio(element.dataset.id);

        });

    });

}

function exportaExcel() {

    let btnExcel = document.querySelector("#btnExcel");

    btnExcel.addEventListener("click", () => {
        $("#table").table2excel({
            name: 'Registro Semanal',
            filename: "Registro_semanal",
            fileext: ".xls"
        });
    });
}

function liberaEdicao() {

    let camposForm = document.querySelectorAll(".alteraCliente");
    let btnEditar = document.querySelector("#editar");
    let btnSalvar = document.querySelector("#salvar");

    btnEditar.addEventListener("click", () => {

        camposForm.forEach(element => {

            element.disabled = false;

        });

        btnEditar.classList.add('d-none');
        btnSalvar.classList.remove('d-none');

        recuperaEdicao();

    });

}

function desabilitaEdicao() {

    let camposForm = document.querySelectorAll(".alteraCliente");
    let btnEditar = document.querySelector("#editar");
    let btnSalvar = document.querySelector("#salvar");

    camposForm.forEach(element => {

        element.disabled = true;

    });

    btnEditar.classList.remove('d-none');
    btnSalvar.classList.add('d-none');


}

function recuperaEdicao() {

    const formInfoCliente = document.querySelector("#formInfoCliente");
    let attCliente = {};

    formInfoCliente.addEventListener("submit", e => {

        e.preventDefault();

        [...formInfoCliente.elements].forEach(element => {

            attCliente[element.id] = element.value;

        });

        salvaEdicao(attCliente);

    });

}

function salvaEdicao(dados) {

    $.ajax({

        url: 'assets/php/atualizaDadosClientes.php',
        method: 'POST',
        data: dados,
        success: data => {

            if (data == 'sucesso') {

                $("#exampleModal").modal('hide');
                desabilitaEdicao();
                buscaRegistros();
            }

        }

    })

}

function recuperaPesquisa() {

    const formPesquisa = document.querySelector("#pesquisa");

    formPesquisa.addEventListener("submit", e => {

        e.preventDefault();

        realizaPesquisa($("#cliente").val());

    });

}

function realizaPesquisa(cliente) {

    const bodyTable = document.querySelector("#bodyTable");

    $.ajax({

        url: 'assets/php/pesquisaCliente.php?cliente=' + cliente,
        method: 'GET',
        success: data => {

            bodyTable.innerHTML = data;
            ativaBotoesStatus();
            ativaClienteModal();
            exportaExcel();

        },
        beforeSend: () => {

            bodyTable.innerHTML = '<tr><td colspan="11" class="text-center"><div class="spinner-border text-primary" role="status"><span span class="visually-hidden" > Loading...</span></div ></td></tr>';

        }


    });

}