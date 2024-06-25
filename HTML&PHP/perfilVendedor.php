<?php session_start(); ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/perfilVendedor.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="../img/logo-icon.png">
    <title>Seu Perfil</title>
</head>

<body>
    <nav>
        <div class="logo">
            <img src="../img/logo-estendida.png" alt="" class="img-logo">
        </div>

        <div class="menu">
            <span onclick="window.location.href='homeVendedor.php'">Produtos</span>
            <span onclick="window.location.href='perfilVendedor.php'">Seu Perfil</span>
        </div>
    </nav>

    <div class="container">
        <div class="foto-perfil">
            <img src="../img/perfil.png" alt="">
        </div>

        <div class="form-dados">
            <?php
            // Verifica se o índice do vendedor está na sessão
            if (isset($_SESSION['vendedor_index'])) {
                $vendedorIndex = $_SESSION['vendedor_index'];

                // Lê o conteúdo do arquivo JSON
                $json = file_get_contents('vendedor.json');
                // Converte o JSON em um array associativo
                $dadosVendedores = json_decode($json, true);

                // Verifica se o índice do vendedor é válido
                if (isset($dadosVendedores[$vendedorIndex])) {
                    $dadosVendedor = $dadosVendedores[$vendedorIndex];

                    $cep = $dadosVendedor['CEP'];

                    // Verifica se o CEP não está vazio
                    if (!empty($cep)) {
                        $url = "https://viacep.com.br/ws/$cep/json/";
                        $arquivo = file_get_contents($url);
                        $dados_cep = json_decode($arquivo, true);

                        // Verifica se a API retornou dados válidos
                        if (isset($dados_cep['erro']) && $dados_cep['erro'] == true) {
                            echo "<p>Erro ao buscar dados do CEP: CEP inválido.</p>";
                        } elseif ($dados_cep === null) {
                            echo "<p>Erro ao buscar dados do CEP: Problema ao acessar a API.</p>";
                        } else {
                            ?>

                            <form method="post">
                                <p>Nome: <?php echo $dadosVendedor['nome']; ?></p>
                                <p>Email: <?php echo $dadosVendedor['email']; ?></p>
                                <p>Senha: <?php echo $dadosVendedor['senha']; ?></p>
                                <p>Localidade: <?php echo $dados_cep['localidade']; ?></p>
                                <p>UF: <?php echo $dados_cep['uf']; ?></p>
                                <p>Bairro: <?php echo $dados_cep['bairro']; ?></p>
                                <p>Logradouro: <?php echo $dados_cep['logradouro']; ?></p>
                                <p>Telefone: <?php echo $dadosVendedor['telefone']; ?></p>
                                <p>CEP: <?php echo $dadosVendedor['CEP']; ?></p>
                            </form>

                            <?php
                        }
                    } else {
                        echo "<p>CEP não está disponível.</p>";
                    }
                } else {
                    echo "<p>Vendedor não encontrado.</p>";
                }
            } else {
                echo "<p>Índice do vendedor não encontrado na sessão.</p>";
            }
            ?>
        </div>
    </div>
</body>

</html>