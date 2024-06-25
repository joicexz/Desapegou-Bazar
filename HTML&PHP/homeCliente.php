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

    <!-- CARROSSEL -->
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

        <!-- BOTÕES NAV CARROSSEL -->
        <div class="manual-navigation">
            <label for="radio1" class="manual-btn"></label>
            <label for="radio2" class="manual-btn"></label>
            <label for="radio3" class="manual-btn"></label>
        </div>
    </div>

    <!-- FILEIRA 1 -->
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

    <!-- FILEIRA 2 -->
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

    <section class="fil3-container">
        <h2 class="sectionn-title">maiores buscas</h2>
        <p class="sectionn-title">as marcas mais queridas</p>


        <div class="fil3-content">
            <!--BOX 1-->
            <div class="product-box">
                <a href="https://www.zara.com/br/"><img src="../img/m1.png" alt="" class="product-img"></a>
                <h2 class="marca-name">zara</h2>

            </div>
            <!--BOX 2-->
            <div class="product-box">
                <a href="https://www.nike.com.br/"><img src="../img/m2.png" alt="" class="product-img"></a>
                <h2 class="marca-name">nike</h2>
            </div>
            <!--BOX 3-->
            <div class="product-box">
                <a href="https://www.vans.com/en-us?_sr=1"><img src="../img/m3.png" alt="" class="product-img"></a>
                <h2 class="marca-name">vans</h2>
            </div>
            <!--BOX 4-->
            <div class="product-box">
                <a href="https://www.adidas.com.br/"><img src="../img/m4.png" alt="" class="product-img"></a>
                <h2 class="marca-name">adidas</h2>
            </div>
        </div>
    </section>

    <!-- FILEIRA 4 -->
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