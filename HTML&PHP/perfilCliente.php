<?php session_start(); ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/perfilCliente.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="../img/logo-icon.png">
    <title>Seu Perfil</title>
</head>

<body>
    <!-- NAVEGAÇÃO -->
    <nav>
        <div class="logo">
            <img src="../img/logo-estendida.png" alt="" class="img-logo">
        </div>

        <div class="menu">
            <span onclick="window.location.href='homeCliente.php'">home</span>
            <span onclick="window.location.href='sacola.php'">sua sacola</span>
            <span onclick="window.location.href='perfilCliente.php'">seu perfil</span>
        </div>
    </nav>

    <div class="container">
        <!-- foto padrão perfil -->
        <div class="foto-perfil">
            <img src="../img/perfil.png" alt="">
        </div>

        <!-- form com os dados -->
        <div class="form-dados">
            <?php
            if (isset($_SESSION['cliente_index'])) {
                $clienteIndex = $_SESSION['cliente_index'];
                $json = file_get_contents('banco.json');
                $dadosClientes = json_decode($json, true);

                if (isset($dadosClientes[$clienteIndex])) {
                    $dadosCliente = $dadosClientes[$clienteIndex];
                    $cep = $dadosCliente['CEP'];

                    if (!empty($cep)) {
                        $url = "https://viacep.com.br/ws/$cep/json/";
                        $arquivo = file_get_contents($url);
                        $dados_cep = json_decode($arquivo, true);

                        if (isset($dados_cep['erro']) && $dados_cep['erro'] == true) {
                            echo "<p>Erro ao buscar dados do CEP: CEP inválido.</p>";
                        } elseif ($dados_cep === null) {
                            echo "<p>Erro ao buscar dados do CEP: Problema ao acessar a API.</p>";
                        } else {
            ?>

                            <!-- mostrar dados cadastrados do cliente -->
                            <form method="post">
                                <p>Email: <?php echo $dadosCliente['email']; ?></p>
                                <p>Senha: <?php echo $dadosCliente['senha']; ?></p>
                                <p>Localidade: <?php echo $dados_cep['localidade']; ?></p>
                                <p>UF: <?php echo $dados_cep['uf']; ?></p>
                                <p>Bairro: <?php echo $dados_cep['bairro']; ?></p>
                                <p>Logradouro: <?php echo $dados_cep['logradouro']; ?></p>
                                <p>Telefone: <?php echo $dadosCliente['telefone']; ?></p>
                                <p>CEP: <?php echo $dadosCliente['CEP']; ?></p>
                            </form>

            <?php
                        }
                    } else {
                        echo "<p>CEP não está disponível.</p>";
                    }
                } else {
                    echo "<p>Cliente não encontrado.</p>";
                }
            } else {
                echo "<p>Índice do cliente não encontrado na sessão.</p>";
            }
            ?>
        </div>
    </div>
</body>

</html>