<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/homeCliente.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="../img/logo-icon.png">
    <title>HOME</title>
</head>

<body>
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

    <div class="container-carrossel">
        <div class="slides">
            <input type="radio" name="radio-btn" id="radio1">
            <input type="radio" name="radio-btn" id="radio2">
            <input type="radio" name="radio-btn" id="radio3">

            <div class="slide first">
                <img src="../img/ca1.png" alt="Imagem 1">
            </div>
            <div class="slide">
                <img src="../img/ca2.png" alt="Imagem 2">
            </div>
            <div class="slide">
                <img src="../img/ca3.png" alt="Imagem 3">
            </div>

            <div class="navigation-auto">
                <div class="auto-btn1"></div>
                <div class="auto-btn2"></div>
                <div class="auto-btn3"></div>
            </div>

        </div>

        <div class="manual-navigation">
            <label for="radio1" class="manual-btn"></label>
            <label for="radio2" class="manual-btn"></label>
            <label for="radio3" class="manual-btn"></label>
        </div>
    </div>

    <section class="fil1-container">
        <h2 class="section-title">estão em alta</h2>
        <p class="section-title">a turma toda tá buscando</p>

        <div class="fil1-content">
            <?php
            $arquivo = 'produtosCliente.json';

            if (file_exists($arquivo)) {
                $conteudo = file_get_contents($arquivo);
                $dados = json_decode($conteudo, true);

                if ($dados !== null && isset($dados['produtos'])) {
                    foreach ($dados['produtos'] as $produto) {
                        echo '<div class="product-box">';
                        echo '<a href="detalhesProduto.php?id_produto=' . $produto['id'] . '">';
                        echo '<img src="' . htmlspecialchars($produto['img_url']) . '" alt="' . htmlspecialchars($produto['nameProduto']) . '" class="product-img">';
                        echo '</a>';
                        echo '<h3 class="product-price">R$ ' . $produto['preco'] . '</h3>';
                        echo '<i class="bx bx-shopping-bag"></i>';
                        echo '</div>';
                    }
                } else {
                    echo '<p>Não há produtos disponíveis.</p>';
                }
            } else {
                echo '<p>O arquivo JSON não existe.</p>';
            }
            ?>
        </div>
    </section>

    <!-- FILA 2 -->
    <section class="fil2-container">
        <h2 class="section-title">até R$20</h2>
        <p class="section-title">baratinhos</p>

        <div class="fil2-content">
            <?php
            $arquivo = 'produtosCliente.json';

            if (file_exists($arquivo)) {
                $conteudo = file_get_contents($arquivo);
                $dados = json_decode($conteudo, true);

                if ($dados !== null && isset($dados['produtos2'])) {
                    foreach ($dados['produtos2'] as $produto) {
                        echo '<div class="product-box">';
                        echo '<a href="detalhesProduto.php?id_produto=' . $produto['id'] . '">';
                        echo '<img src="' . htmlspecialchars($produto['img_url']) . '" alt="' . htmlspecialchars($produto['nameProduto']) . '" class="product-img">';
                        echo '</a>';
                        echo '<h3 class="product-price">R$ ' . $produto['preco'] . '</h3>';
                        echo '<i class="bx bx-shopping-bag"></i>';
                        echo '</div>';
                    }
                } else {
                    echo '<p>Não há produtos disponíveis.</p>';
                }
            } else {
                echo '<p>O arquivo JSON não existe.</p>';
            }
            ?>
        </div>
    </section>

    <section>
        <h1>...</h1>
    </section>

    <section class="fil4-container">
        <h2 class="section-title">tudo junino</h2>
        <p class="section-title">impossível ficar sem par na quadrilha</p>

        <div class="fil4-content">
            <?php
            if (file_exists($arquivo)) {
                $conteudo = file_get_contents($arquivo);
                $dados = json_decode($conteudo, true);

                if ($dados !== null && isset($dados['produtos3'])) { 
                    foreach ($dados['produtos3'] as $produto) {
                        echo '<div class="product-box">';
                        echo '<a href="detalhesProduto.php?id_produto=' . $produto['id'] . '">';
                        echo '<img src="' . htmlspecialchars($produto['img_url']) . '" alt="' . htmlspecialchars($produto['nameProduto']) . '" class="product-img">';
                        echo '</a>';
                        echo '<h2 class="product-name">' . htmlspecialchars($produto['nameProduto']) . '</h2>';
                        echo '</div>';
                    }
                } else {
                    echo '<p>Não há produtos disponíveis.</p>';
                }
            } else {
                echo '<p>O arquivo JSON não existe.</p>';
            }
            ?>
        </div>
    </section>

    <script src="../JS/main.js"></script>
</body>

</html>