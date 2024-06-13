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
            $extrair_dados = file_get_contents($arquivo);
            $dados = json_decode($extrair_dados, true);
        } else {
            $dados = [];
        }

        $dados[] = $novo_registro;
        file_put_contents($arquivo, json_encode($dados));

        $url = 'homeCliente.php';
        echo "<script type='text/javascript'>
        alert('Usuário cadastrado com sucesso');
        window.location.href = '$url';
        </script>";
    } else {
        echo "Método de requisição inválido.";
    }
}
