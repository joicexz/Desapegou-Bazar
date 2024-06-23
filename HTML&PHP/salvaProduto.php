<?php
$dados = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $produto = $_POST['produto'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];

    if (isset($produto) && isset($descricao) && isset($preco)) {
        $arquivo = 'produtos.json';

        if (file_exists($arquivo)) {

            $extrair_dados = file_get_contents($arquivo);
            $dados = json_decode($extrair_dados, true);
        }

        $novo_produto = [
            'produto' => $produto,
            'descricao' => $descricao,
            'preco' => $preco
        ];

        $dados[] = $novo_produto;

        file_put_contents($arquivo, json_encode($dados, JSON_PRETTY_PRINT));

        header('location: homeVendedor.php');
    } else {
        echo 'Preencha todos os campos';
        header('location: homeVendedor.php');
    }
}
