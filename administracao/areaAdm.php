<?php
session_start();
if (!isset($_SESSION['nome']) && !isset($_SESSION['email'])) {
    header("Location: index.php");
}

?>

<!doctype html>
<html lang="pt-BR">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="assets/css/custom.css" rel="stylesheet">
    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!--FONTAWESOME-->
    <script src="https://kit.fontawesome.com/59f636855b.js" crossorigin="anonymous"></script>

    <!-- SWEET-ALERT -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="icon" href="assets/img/favIcon.jpg">
    <title>Área Administrativa</title>
</head>

<body>

    <?php include('headerAdm.php') ?>

    <div class="container">

        <div class="row text-end bgBranco py-3">
            <div class="col-11">
                <form class="d-flex gap-2" id="pesquisa">
                    <input type="text" class="form-control" name="cliente" id="cliente" placeholder="Pesquisar">
                    <button class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>

            </div>
            <div class="col-1">
                <button class="btn" id="btnExcel"><i class="fa-solid fa-file-export"></i></button>
            </div>
        </div>

        <div class="row bgBranco">
            <div class="col-12">
                <div class="table-responsive p-3 ruonded" id="scrollTabela">

                    <table class="table" id="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome Aluno</th>
                                <th scope="col">Data Nascimento</th>
                                <th scope="col">Telefone</th>
                                <th scope="col">Período</th>
                                <th scope="col">Escola de Origem</th>
                                <th scope="col">Primeira Opção</th>
                                <th scope="col">Segunda opção</th>
                                <th scope="col">Grau</th>
                                <th scope="col">Status Matrícula</th>
                                <th scope="col">Ação</th>
                            </tr>
                        </thead>
                        <tbody id="bodyTable"></tbody>
                    </table>

                </div>
                <!--Fim table responsive-->
            </div>
            <!--Fim col-->
        </div>
        <!--Fim row-->

    </div>
    <!--Fim container-->


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Relatório cliente</h5>
                    <div>
                        <a class="btn" id="btnImpressaoIndividual"><i class="fa-solid fa-print"></i></a>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                </div>
                <div class="modal-body">

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="nomeResponsavel" class="form-label">Nome Responsável</label>
                                    <input disabled type="text" class="form-control" id="nomeResponsavel">
                                </div>
                            </div>
                            <!--Fim col-->

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="emailResponsavel" class="form-label">Email Responsável</label>
                                    <input disabled type="text" class="form-control" id="emailResponsavel">
                                </div>
                            </div>
                            <!--Fim col-->

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="cpfResponsavel" class="form-label">CPF Responsável</label>
                                    <input disabled type="text" class="form-control" id="cpfResponsavel">
                                </div>
                            </div>
                            <!--Fim col-->

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="telefoneResponsavel" class="form-label">Telefone Responsável</label>
                                    <input disabled type="text" class="form-control" id="telefoneResponsavel">
                                </div>
                            </div>
                            <!--Fim col-->

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <a id="linkDocumentacao" target="_blank">Link documentação</a>
                                </div>
                            </div>
                            <!--Fim col-->

                        </div>
                        <!--Fim row-->
                    </div>
                    <!--Fim container-->

                    <hr>

                    <form id="formInfoCliente">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="nomeAluno" class="form-label">Nome Aluno</label>
                                        <input disabled type="text" class="form-control alteraCliente" id="nomeAluno">
                                    </div>
                                </div>
                                <!--Fim col-->

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="dtNasc" class="form-label">Data de Nascimento</label>
                                        <input disabled type="date" class="form-control alteraCliente" id="dtNasc">
                                    </div>
                                </div>
                                <!--Fim col-->

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="tipoEducacao" class="form-label">Educação</label>
                                        <input disabled type="text" class="form-control alteraCliente" id="tipoEducacao">
                                    </div>
                                </div>
                                <!--Fim col-->

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="grauEducacao" class="form-label">Grau educação</label>
                                        <input disabled type="text" class="form-control alteraCliente" id="grauEducacao">
                                    </div>
                                </div>
                                <!--Fim col-->

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="telefone" class="form-label">Telefone</label>
                                        <input disabled type="text" class="form-control alteraCliente" id="telefone">
                                    </div>
                                </div>
                                <!--Fim col-->

                            </div>
                            <!--Fim row-->
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="endereco" class="form-label">Endereço</label>
                                        <input disabled type="text" class="form-control alteraCliente" id="endereco">
                                    </div>
                                </div>
                                <!--Fim col-->

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="referencia" class="form-label">Referencia</label>
                                        <input disabled type="text" class="form-control alteraCliente" id="referencia">
                                    </div>
                                </div>
                                <!--Fim col-->

                            </div>
                            <!--Fim row-->

                            <hr>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="escolaOrigem" class="form-label">Escola Origem</label>
                                        <input disabled type="text" class="form-control alteraCliente" id="escolaOrigem">
                                    </div>
                                </div>
                                <!--Fim col-->

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="primeiraOpcaoEscola" class="form-label">1º Opção de escola</label>
                                        <input disabled type="text" class="form-control alteraCliente" id="primeiraOpcaoEscola">
                                    </div>
                                </div>
                                <!--Fim col-->

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="segundaOpcaoEscola" class="form-label">2º Opção de escola</label>
                                        <input disabled type="text" class="form-control alteraCliente" id="segundaOpcaoEscola">
                                    </div>
                                </div>
                                <!--Fim col-->

                            </div>
                            <!--Fim row-->

                            <hr>

                            <div class="row">

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="ne" class="form-label">Necessidade Especial</label>
                                        <input disabled type="text" class="form-control alteraCliente" id="ne">
                                    </div>
                                </div>
                                <!--Fim col-->

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="av" class="form-label">Alta Vulnerabilidade</label>
                                        <input disabled type="text" class="form-control alteraCliente" id="av">
                                    </div>
                                </div>
                                <!--Fim col-->

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="bolsaFamilia" class="form-label">Bolsa Família</label>
                                        <input disabled type="text" class="form-control alteraCliente" id="bolsaFamilia">
                                    </div>
                                </div>
                                <!--Fim col-->

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="nis" class="form-label">NIS</label>
                                        <input disabled type="text" class="form-control alteraCliente" id="nis">
                                    </div>
                                </div>
                                <!--Fim col-->

                            </div>
                            <!--Fim row-->


                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="observacao" class="form-label">Observação</label>
                                        <textarea disabled name="observacao" id="observacao" rows="5" class="w-100 alteraCliente"></textarea>
                                    </div>
                                </div>
                                <!--Fim col-->
                            </div>
                            <!--Fim row-->

                            <hr>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="dataInscricao" class="form-label">Data inscricao</label>
                                        <input disabled type="text" class="form-control" id="dataInscricao">
                                    </div>
                                </div>
                                <!--Fim col-->

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="numeroProtocolo" class="form-label">Número de Protocolo</label>
                                        <input disabled type="text" class="form-control" id="numeroProtocolo">
                                    </div>
                                </div>
                                <!--Fim col-->

                            </div>
                            <!--Fim row-->

                            <hr>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="statusMatricula" class="form-label">Status Matricula</label>
                                        <input disabled type="text" class="form-control" id="statusMatricula">
                                    </div>
                                </div>
                                <!--Fim col-->

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="statusEmail" class="form-label">Status Email</label>
                                        <input disabled type="text" class="form-control" id="statusEmail">
                                    </div>
                                </div>
                                <!--Fim col-->

                            </div>
                            <!--Fim row-->

                            <hr>

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <a id="abrirNe" class="btnRosa">Abrir arquivo NE</a>
                                    </div>
                                </div>
                                <!--Fim col-->

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <a id="abrirAv" class="btnRosa">Abrir arquivo AV</a>
                                    </div>
                                </div>
                                <!--Fim col-->

                            </div>
                            <!--fim row-->

                        </div>
                        <!--Fim coontainer-->

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary" id="editar">Editar</button>
                    <button type="submit" class="btn btn-primary d-none" id="salvar">Salvar</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->
    <script src="assets/js/exportaExcel.js"></script>
    <script src="assets/js/areaAdm.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>