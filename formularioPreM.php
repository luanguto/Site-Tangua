<?php
session_start();
if (!isset($_SESSION['nome']) && !isset($_SESSION['email'])) {
    header("Location: index.php");
}

//header("Location: https://www.semetangua.com.br/areaCliente.php");

?>

<!doctype html>
<html lang="pt-BR">

<head>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-P5JJH3EK17%22%3E"></script>

    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-P5JJH3EK17');
    </script>

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
    <title>Formulário</title>
</head>

<body class="bgAzulClaro">

    <?php include('headerCliente.php') ?>

    <div class="container">

        <div class="row">

            <div class="col-12">
                <div class="containerFormLogin">
                    <form id="preMatricula">
                        <div class="text-center">
                            <h1 class="tituloPag text-center">Formulário de Pré-Matrícula 2023</h1>
                            <h6 style="text-align: left;"> *Campos obrigatórios</h6>
                        </div>

                        <div class="mb-4">
                            <label for="nome" class="form-label"><strong>Nome completo do aluno*</strong></label>
                            <input type="text" class="inputFormulario" name="nome" id="nome" placeholder="Digite aqui" maxlength="100" required>
                        </div>

                        <div class="mb-4">
                            <label for="dtNasci" class="form-label"><strong>Data de nascimento*</strong></label>
                            <input type="date" class="inputFormulario" name="dtNasci" id="dtNasci" placeholder="Digite aqui" required>
                        </div>

                        <div class="mb-4">
                            <label for="tipoEducacao" class="form-label"><strong>Nível de escolaridade à vaga pretendida*</strong></label>
                            <select name="tipoEducacao" id="tipoEducacao" class="selectFormulario" required>
                                <option selected disabled>Selecione uma opção</option>
                                <option value="creche">Creche</option>
                                <option value="Pré Escola">Pré Escola</option>
                                <option value="Fundamental">Fundamental</option>
                                <option value="Jovens e Adultos">Ensino de Jovens e Adultos (EJA)</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="grauEducacao" class="form-label"><strong>Grau de escolaridade*</strong></label>
                            <select name="grauEducacao" id="grauEducacao" class="selectFormulario" required>
                                <option selected disabled>Selecione uma opção</option>
                                <!--SERÁ POPULADO PELO JAVASCRIPT-->
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="endereco" class="form-label"><strong>Endereço*</strong> <span class="explicacaoForm">(Rua, número da casa e bairro)</span></label>
                            <input type="text" class="inputFormulario" name="endereco" id="endereco" placeholder="Digite aqui" required>
                        </div>

                        <div class="mb-4">
                            <label for="referencia" class="form-label"><strong>Referência*</strong></label>
                            <input type="text" class="inputFormulario" name="referencia" id="referencia" placeholder="Digite aqui" required>
                        </div>

                        <div class="mb-4">
                            <label for="telefone" class="form-label"><strong>Celular (Whatsapp)*</strong></label>
                            <input type="text" class="inputFormulario" name="telefone" id="telefone" placeholder="Digite aqui" required>
                        </div>

                        <div class="mb-4">
                            <label for="escolaOrigem" class="form-label"><strong>Escola atual*</strong></label>
                            <select name="escolaOrigem" id="escolaOrigem" class="selectFormulario" required>
                                <option selected disabled>Selecione uma opção</option>
                                <option value="Creche Municipal Ozíris Rodrigues da Silva">Creche Municipal Ozíris Rodrigues da Silva</option>
                                <option value="Creche Municipal Tereza Campins Gonçalves">Creche Municipal Tereza Campins Gonçalves</option>
                                <option value="E.M. Castro Alves">E.M. Castro Alves</option>
                                <option value="E.M. Ernestina Ferreira Muniz">E.M. Ernestina Ferreira Muniz</option>
                                <option value="E.M. Fazenda Tomascá">E.M. Fazenda Tomascá</option>
                                <option value="E.M. Fernanda Suellen da Silva Gripp Sampaio">E.M. Fernanda Suellen da Silva Gripp Sampaio</option>
                                <option value="E.M. Iasmim Gonzaga Arantes">E.M. Iasmim Gonzaga Arantes</option>
                                <option value="E.M. Ipitangas">E.M. Ipitangas</option>
                                <option value="E.M. Jacinto Costa">E.M. Jacinto Costa</option>
                                <option value="E.M. Manoel João Gonçalves">E.M. Manoel João Gonçalves</option>
                                <option value="E.M. Mutuapira">E.M. Mutuapira</option>
                                <option value="E.M. Padre Thomas Pieters">E.M. Padre Thomas Pieters</option>
                                <option value="E.M. Professora Dearina Silva Machado">E.M. Professora Dearina Silva Machado</option>
                                <option value="E.M. Professora Paulina Porto">E.M. Professora Paulina Porto</option>
                                <option value="E.M. Professora Zulquerina Rios">E.M. Professora Zulquerina Rios</option>
                                <option value="E.M. Vereador Antonio Duarte Lopes">E.M. Vereador Antonio Duarte Lopes</option>
                                <option value="E.M. Vereador Manoel Novis da Silva">E.M. Vereador Manoel Novis da Silva</option>
                                <option value="E.M. Visconde de Itaborai">E.M. Visconde de Itaborai</option>
                                <option value="Não Possui">Não tenho</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="primeiraUnidade" class="form-label"><strong>1º Opção de unidade escolar para matrícula*</strong></label>
                            <select name="primeiraUnidade" id="primeiraUnidade" class="selectFormulario" required>
                                <option selected disabled>Selecione uma opção</option>
                                <option value="Creche Municipal Ozíris Rodrigues da Silva">Creche Municipal Ozíris Rodrigues da Silva</option>
                                <option value="Creche Municipal Tereza Campins Gonçalves">Creche Municipal Tereza Campins Gonçalves</option>
                                <option value="E.M. Castro Alves">E.M. Castro Alves</option>
                                <option value="E.M. Ernestina Ferreira Muniz">E.M. Ernestina Ferreira Muniz</option>
                                <option value="E.M. Fazenda Tomascá">E.M. Fazenda Tomascá</option>
                                <option value="E.M. Fernanda Suellen da Silva Gripp Sampaio">E.M. Fernanda Suellen da Silva Gripp Sampaio</option>
                                <option value="E.M. Iasmim Gonzaga Arantes">E.M. Iasmim Gonzaga Arantes</option>
                                <option value="E.M. Ipitangas">E.M. Ipitangas</option>
                                <option value="E.M. Jacinto Costa">E.M. Jacinto Costa</option>
                                <option value="E.M. Manoel João Gonçalves">E.M. Manoel João Gonçalves</option>
                                <option value="E.M. Mutuapira">E.M. Mutuapira</option>
                                <option value="E.M. Padre Thomas Pieters">E.M. Padre Thomas Pieters</option>
                                <option value="E.M. Professora Dearina Silva Machado">E.M. Professora Dearina Silva Machado</option>
                                <option value="E.M. Professora Paulina Porto">E.M. Professora Paulina Porto</option>
                                <option value="E.M. Professora Zulquerina Rios">E.M. Professora Zulquerina Rios</option>
                                <option value="E.M. Vereador Antonio Duarte Lopes">E.M. Vereador Antonio Duarte Lopes</option>
                                <option value="E.M. Vereador Manoel Novis da Silva">E.M. Vereador Manoel Novis da Silva</option>
                                <option value="E.M. Visconde de Itaborai">E.M. Visconde de Itaborai</option>
                                <option value="Não Possui">Não tenho</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="segundaUnidade" class="form-label"><strong>2º Opção de unidade escolar para matrícula*</strong></label>
                            <select name="segundaUnidade" id="segundaUnidade" class="selectFormulario" required>
                                <option selected disabled>Selecione uma opção</option>
                                <option value="Creche Municipal Ozíris Rodrigues da Silva">Creche Municipal Ozíris Rodrigues da Silva</option>
                                <option value="Creche Municipal Tereza Campins Gonçalves">Creche Municipal Tereza Campins Gonçalves</option>
                                <option value="E.M. Castro Alves">E.M. Castro Alves</option>
                                <option value="E.M. Ernestina Ferreira Muniz">E.M. Ernestina Ferreira Muniz</option>
                                <option value="E.M. Fazenda Tomascá">E.M. Fazenda Tomascá</option>
                                <option value="E.M. Fernanda Suellen da Silva Gripp Sampaio">E.M. Fernanda Suellen da Silva Gripp Sampaio</option>
                                <option value="E.M. Iasmim Gonzaga Arantes">E.M. Iasmim Gonzaga Arantes</option>
                                <option value="E.M. Ipitangas">E.M. Ipitangas</option>
                                <option value="E.M. Jacinto Costa">E.M. Jacinto Costa</option>
                                <option value="E.M. Manoel João Gonçalves">E.M. Manoel João Gonçalves</option>
                                <option value="E.M. Mutuapira">E.M. Mutuapira</option>
                                <option value="E.M. Padre Thomas Pieters">E.M. Padre Thomas Pieters</option>
                                <option value="E.M. Professora Dearina Silva Machado">E.M. Professora Dearina Silva Machado</option>
                                <option value="E.M. Professora Paulina Porto">E.M. Professora Paulina Porto</option>
                                <option value="E.M. Professora Zulquerina Rios">E.M. Professora Zulquerina Rios</option>
                                <option value="E.M. Vereador Antonio Duarte Lopes">E.M. Vereador Antonio Duarte Lopes</option>
                                <option value="E.M. Vereador Manoel Novis da Silva">E.M. Vereador Manoel Novis da Silva</option>
                                <option value="E.M. Visconde de Itaborai">E.M. Visconde de Itaborai</option>
                                <option value="Não Possui">Não tenho</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="ne" class="form-label"><strong>Possui alguma necessidade especial com laudo?*</strong></label><br>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ne" id="neSim" value="Sim" required>
                                <label class="form-check-label" for="neSim">Sim</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ne" id="neNao" value="Não" required>
                                <label class="form-check-label" for="neNao">Não</label>
                            </div>
                        </div>


                        <div class="mb-4">
                            <label for="ne" class="form-label"><strong>Possui alta vulnerabilidade com comprovação?*</strong></label><br>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="av" id="avSim" value="Sim" required>
                                <label class="form-check-label" for="avSim">Sim</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="av" id="avNao" value="Não" required>
                                <label class="form-check-label" for="avNao">Não</label>
                            </div>
                        </div>


                        <div class="mb-4">
                            <label for="ne" class="form-label"><strong>É beneficiário do Programa Auxílio Brasil? (Bolsa Família)*</strong></label><br>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="bolsaFamilia" id="bsSim" value="Sim" required>
                                <label class="form-check-label" for="bsSim">Sim</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="bolsaFamilia" id="bsNao" value="Não" required>
                                <label class="form-check-label" for="bsNao">Não</label>
                            </div>
                        </div>

                        <div class="mb-4 d-none" id="campoNIS">
                            <label for="nis" class="form-label"><strong>Código NIS</strong></label>
                            <input name="nis" id="nis" class="inputFormulario" type="text">
                        </div>

                        <div class="mb-4">
                            <label for="observacao" class="form-label"><strong>Observações: (opcional)</strong></label>
                            <textarea name="observacao" id="observacao" class="inputFormulario" rows="5"></textarea>
                        </div>

                        <div class="mb-4">
                            <button class="btnRosa w-100" id="btnEnviaMatricula" value="Enviar" type="submit">Enviar <i class="fa-solid fa-check"></i></button>
                        </div>
                    </form>

                </div>
                <!--Fim containerFormLogin-->
            </div>
            <!--Fim col-->

        </div>
        <!--Fim row-->

    </div>
    <!--Fim container-->

    <?php include('btnWhatsapp.php') ?>

    <!-- Optional JavaScript; choose one of the two! -->
    <script src="assets/js/formularioPreM.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>