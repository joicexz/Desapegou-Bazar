<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/detalhesProduto.css">
    <link rel="icon" href="../img/logo-icon.png">
    <title>Página detalhe produto</title>
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

    <div class="card-produto">
        <?php
        session_start();
        if (isset($_GET['id_produto'])) {
            $id_produto = $_GET['id_produto'];
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
                                break 2; // sai dos dois loops quando o produto é encontrado
                            }
                        }
                    }
                }

                if ($produto_encontrado !== null) {
        ?>
                    <div class="details">
                        <div>
                            <!-- img produto -->
                            <img src="<?php echo htmlspecialchars($produto_encontrado['img_url']); ?>" alt="">
                        </div>

                        <div>
                            <!-- detalhes do produto -->
                            <h2><?php echo htmlspecialchars($produto_encontrado['nameProduto']); ?></h2>

                            <p class="size">R$ <?php echo $produto_encontrado['preco']; ?></p>

                            <p class="rest">Estado: <?php echo htmlspecialchars($produto_encontrado['estado']); ?></p>

                            <p class="rest">Cores: <?php echo $produto_encontrado['cor']; ?></p>

                            <p class="rest">Tamanho: <?php echo htmlspecialchars($produto_encontrado['tamanho']); ?></p>

                            <p class="rest">Estação: <?php echo htmlspecialchars($produto_encontrado['estacao']); ?></p>

                            <p class="rest">Estampa: <?php echo htmlspecialchars($produto_encontrado['estampa']); ?></p>

                            <div>
                                <!-- btn add na sacola -->
                                <button class="btn-sacolaAdd" onclick="adicionarASacola(<?php echo $produto_encontrado['id']; ?>)">adicionar a sacola</button>
                            </div>

                        </div>
                    </div>
        <?php
                } else {
                    echo '<p>Produto não encontrado.</p>';
                }
            } else {
                echo '<p>O arquivo JSON não existe.</p>';
            }
        } else {
            echo '<p>Parâmetro id_produto não encontrado na URL.</p>';
        }
        ?>

        <script>
            function adicionarASacola(idProduto) {
                fetch('adicionar_sacola.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            id_produto: idProduto
                        })
                    }).then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            window.location.href = 'sacola.php';
                        } else {
                            alert('Erro ao adicionar à sacola');
                        }
                    });
            }
        </script>

    </div>
</body>

</html>