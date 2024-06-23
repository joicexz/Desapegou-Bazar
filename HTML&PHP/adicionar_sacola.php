<?php
session_start();

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['id_produto'])) {

    $id_produto = $data['id_produto'];
    $dados = 'produtosCliente.json';

    if (file_exists($dados)) {

        $conteudo = file_get_contents($dados);
        $produto_data = json_decode($conteudo, true);

        $produto_encontrado = null;

        if ($produto_data !== null) {
            foreach ($produto_data as $categoria => $produtos) {
                foreach ($produtos as $produto) {
                    if ($produto['id'] == $id_produto) {
                        $produto_encontrado = $produto;
                        break 2;
                    }
                }
            }
        }

        if ($produto_encontrado !== null) {
            if (!isset($_SESSION['sacola'])) {
                $_SESSION['sacola'] = [];
            }

            $_SESSION['sacola'][] = $produto_encontrado;

            echo json_encode(['success' => true]);
            exit;
        }
    }
}

echo json_encode(['success' => false]);
