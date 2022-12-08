<?php

class db
{

    /*private $host = 'localhost';
    private $usuario = 'root';
    private $senha = '';
    private $database = 'xxxx';*/

    private $host = 'xxxxxx';
    private $usuario = 'xxxxx';
    private $senha = 'xxxx';
    private $database = 'xxxx';

    public function conexaoDb()
    {

        $conexao = mysqli_connect($this->host, $this->usuario, $this->senha, $this->database);

        mysqli_set_charset($conexao, 'utf8');

        if (mysqli_connect_errno()) {
            echo 'Erro de conexão ' . mysqli_error();
        }

        return $conexao;
    }
}
