<?php

$dados = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $CEP = $_POST['CEP'];
    $telefone = $_POST['telefone'];

    //dados a serem salvos
    $novo_registro = [
        'email' => $email,
        'senha' => $senha,
        'CEP' => $CEP,
        'telefone' => $telefone
    ];

    $arquivo = 'banco.json';

    if (isset($email) && isset($senha) && isset($CEP) && isset($telefone)) {

        if (file_exists($arquivo)) {
            // pegando o arquivo e transformando em array associativo
            $extrair_dados = file_get_contents($arquivo);
            $dados = json_decode($extrair_dados, true);
        } else {
            $dados = [];
        }

        $dados[] = $novo_registro;

        // transformando em objeto json e deixando de forma organizada
        file_put_contents($arquivo, json_encode($dados, JSON_PRETTY_PRINT));

        // redireciona para a pag home cliente caso o cadastro dê certo
        $url = 'homeCliente.php';
        echo "<script type='text/javascript'>
        alert('Usuário cadastrado com sucesso');
        window.location.href = '$url';
        </script>";
    } else {
        echo "Método de requisição inválido.";
    }
}
