recuperaRegistros();

function recuperaRegistros() {

    const registros = document.querySelector("#registros");

    $.ajax({

        url: 'assets/php/recuperaMatriculaUsuario.php',
        success: data => {

            if (data != '') {
                registros.innerHTML = data;
                ativaBtnRelatorio();
            } else {

                registros.innerHTML = 'Nenhum registro encontrado';
            }

        }

    });

}

function ativaBtnRelatorio() {

    const containerResultadosCliente = document.querySelectorAll(".containerResultadosCliente");

    containerResultadosCliente.forEach(element => {

        element.addEventListener("click", () => {

            recuperaRelatorio(element.dataset.formulario);

        });

    });

}

function recuperaRelatorio(id) {

    $.ajax({

        url: 'assets/php/relatorioCliente.php?id=' + id,
        success: data => {

            let cliente = JSON.parse(data);
            let btnImpressaoRelatorio = document.querySelector("#btnImpressaoRelatorio");

            btnImpressaoRelatorio.setAttribute('href', 'impressaoCadastro.php?id=' + id);

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

            $("#exampleModal").modal('show');
        }

    });

}