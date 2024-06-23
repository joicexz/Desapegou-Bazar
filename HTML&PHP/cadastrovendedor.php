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

    // arquivo json com os cadastros salvos
    $arquivo = 'vendedor.json';

    // verifica se todos os  dados estão inseridos
    if (isset($nome) && isset($email) && isset($CNPJ) && isset($senha) && isset($CEP) && isset($telefone)) {

        if (file_exists($arquivo)) {

            // pega os dados do vendedor.json
            $extrair_dados = file_get_contents($arquivo);
            // transforma em array associativo
            $dados = json_decode($extrair_dados, true);
        } else {
            $dados = [];
        }

        // salva o registro dentro de $dados
        $dados[] = $novo_registro;
        // transforma novamente em objeto json e deixa os dados no arquivo .json arrumadinhos
        file_put_contents($arquivo, json_encode($dados, JSON_PRETTY_PRINT));

        // se tudo estiver certinho, redireciona para a página de home do vendedor
        $url = 'homeVendedor.php';
        echo "<script type='text/javascript'>
        alert('Usuário cadastrado com sucesso');
        window.location.href = '$url';
        </script>";
    } else {
        echo "Método de requisição inválido.";
    }
}
