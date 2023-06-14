<?php
// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtém os dados do formulário
    $nome = $_POST["nome"];
    $sobrenome = $_POST["sobrenome"];
    $email = $_POST["email"];
    $numero = $_POST["numero"];
    $senha = $_POST["password"];
    //$genero = $_POST["gender"];

    // Configurações do banco de dados
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $dbname = "cadastro";


    // Cria a conexão com o banco de dados
    $conexao = new mysqli($servidor, $usuario, $senha, $dbname);

    // Verifica se ocorreu algum erro na conexão
    if ($conexao->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
    }

    // Prepara a consulta SQL para inserir os dados na tabela
    $sql = "INSERT INTO usuarios (nome, sobrenome, email, numero, senha)
            VALUES ('$nome', '$sobrenome', '$email', '$numero', '$senha')";

    // Executa a consulta SQL
    if ($conexao->query($sql) === TRUE) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro ao cadastrar: " . $conexao->error;
    }

    // Fecha a conexão com o banco de dados
    $conexao->close();
}
?>