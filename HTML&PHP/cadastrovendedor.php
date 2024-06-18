<?php

$dados = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $CNPJ = $_POST['CNPJ'];
    $senha = $_POST['senha'];
    $CEP = $_POST['CEP'];
    $telefone = $_POST['telefone'];

    //dados a serem salvos
    $novo_registro = [
        'nome' => $nome,
        'email' => $email,
        'CNPJ' => $CNPJ,
        'senha' => $senha,
        'CEP' => $CEP,
        'telefone' => $telefone
    ];

    $arquivo = 'vendedor.json';

    if (isset($nome) && isset($email) && isset($CNPJ) && isset($senha) && isset($CEP) && isset($telefone)) {

        if (file_exists($arquivo)) {
            $extrair_dados = file_get_contents($arquivo);
            $dados = json_decode($extrair_dados, true);
        } else {
            $dados = [];
        }

        $dados[] = $novo_registro;
        file_put_contents($arquivo, json_encode($dados, JSON_PRETTY_PRINT));

        $url = 'homeVendedor.php';
        echo "<script type='text/javascript'>
        alert('Usuário cadastrado com sucesso');
        window.location.href = '$url';
        </script>";
    } else {
        echo "Método de requisição inválido.";
    }
}
