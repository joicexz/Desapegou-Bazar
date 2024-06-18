<?php
//criar variável array
$dados = [];
$erro = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $produto = $_POST['produto'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];

    if (isset($produto) && isset($descricao) && isset($preco)) {
        $arquivo = 'produtos.json';

        //verifica se o arquivo já existe
        if (file_exists($arquivo)) {

            //se existir salva dados dentro da variável $dados
            $extrair_dados = file_get_contents($arquivo);

            //decodifica os dados em array associativo
            $dados = json_decode($extrair_dados, true);
        }

        //pega os dados do formulário e crio um novo array
        $novo_produto = [
            'produto' => $produto,
            'descricao' => $descricao,
            'preco' => $preco

        ];

        //adiciona os dados novos ao array na variável $dados
        $dados[] = $novo_produto;

        //salva o arquivo json com todos os dados novamente 
        file_put_contents($arquivo, json_encode($dados, JSON_PRETTY_PRINT));

        header('location: homeVendedor.php');
    } else {
        $erro = 'Preencha todos os campos';
        header('location: homeVendedor.php?erro=' . $erro);
    }
}
