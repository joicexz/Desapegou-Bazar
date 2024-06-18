<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_GET['id'] ?? '';
    $dados = [];
    $arquivo = 'produtos.json';

    if (file_exists($arquivo)) {
        $extrair_dados = file_get_contents($arquivo);
        $dados = json_decode($extrair_dados, true);
    }

    $dados[$id] = [
        'produto' => $_POST['produto'],
        'descricao' => $_POST['descricao'],
        'preco' => $_POST['preco']
    ];

    if (file_put_contents($arquivo, json_encode($dados, JSON_PRETTY_PRINT))) {
        header("location: homeVendedor.php?msg=Registro alterado com sucesso");
    } else {
        header("location: homeVendedor.php?msg=Erro ao alterar registro");
    }
}
