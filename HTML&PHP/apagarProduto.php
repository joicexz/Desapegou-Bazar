<?php
$dados = [];
$id = $_GET['id'] ?? '';
$arquivo = 'produtos.json';

if (file_exists($arquivo)) {
    $extrair_dados = file_get_contents($arquivo);
    $dados = json_decode($extrair_dados, true);

    foreach ($dados as $indice => $valor) {
        if ($indice == $id) {
            unset($dados[$indice]); //unset apaga
        }
    }

    if (file_put_contents($arquivo, json_encode($dados))) {
        header("location: homeVendedor.php");
    } else {
        header("location: homeVendedor.php");
        echo 'ERRO: não foi possível apagar esse item!!';
    }
}
