<?php
session_start();
if (!isset($_SESSION['nome']) && !isset($_SESSION['cargo'])) {
    header("Location: ../../index.php");
}
//CONEXÃO COM O BANCO
require_once('../../../assets/php/conexaoDb.php');
$banco = new db();
$conexao = $banco->conexaoDb();

$sqlSelect = "SELECT *, DATE_FORMAT(data_nascimento, '%d/%m/%Y') as data_nascimento FROM formulario_cliente";

if ($resultado = mysqli_query($conexao, $sqlSelect)) {

    while ($registro = mysqli_fetch_array($resultado)) {

        echo '
            <tr>
                <th scope="row">' . $registro['id'] . '</th>
                <td><a class="cliente" data-id="' . $registro['id'] . '">' . $registro['nome_aluno'] . '</a></td>
                <td>' . $registro['data_nascimento'] . '</td>
                <td><a href="https://api.whatsapp.com/send?phone=55' . $registro['telefone'] . '&text=Ol%C3%A1">' . $registro['telefone'] . '</a></td>
                <td>' . $registro['tipo_educacao'] . '</td>
                <td>' . $registro['escola_origem'] . '</td>
                <td>' . $registro['primeira_unidade_escola'] . '</td>
                <td>' . $registro['segunda_unidade_escola'] . '</td>
                <td>' . $registro['grau_educacao'] . '</td>
                <td>' . $registro['status_matricula'] . '</td>
                <td>

                <div class="dropdown">
                    <button class="btnRosa dropdown-toggle" type="button" id="dropdown' . $registro['id'] . '" data-bs-toggle="dropdown" aria-expanded="false">
                        Ação
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdown' . $registro['id'] . '">
                        <li><a class="dropdown-item" data-status="Formulário recebido" data-id="' . $registro['id'] . '">Formulário recebido</a></li>
                        <li><a class="dropdown-item" data-status="Documentação Pendente" data-id="' . $registro['id'] . '">Documentação Pendente</a></li>
                        <li><a class="dropdown-item" data-status="Em Análise" data-id="' . $registro['id'] . '">Em Análise</a></li>
                        <li><a class="dropdown-item" data-status="Aceito" data-id="' . $registro['id'] . '">Aceito</a></li>
                        <li><a class="dropdown-item" data-status="Recusado" data-id="' . $registro['id'] . '">Recusado</a></li>
                        <li><a class="dropdown-item" data-status="Procure a escola" data-id="' . $registro['id'] . '">Procure a escola</a></li>
                    </ul>
                    </div>
                </td>
            </tr>
        ';
    }
} else {

    echo 'erroQuery';
}
