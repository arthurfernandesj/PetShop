<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "cadastro";


$conexao = new mysqli($servidor, $usuario, $senha, $dbname);

if ($conexao->connect_errno) {
    echo "Erro";
} else {

    echo "Conexão efetuada com sucesso";

}


?>