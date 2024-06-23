<?php session_start(); ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/sacola.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="../img/logo-icon.png">
    <title>Sua Sacola</title>
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

    <!-- SACOLA -->
    <div class="card-sacola">
        <!-- TITULO -->
        <div class="tittle">
            <i class='bx bxs-shopping-bag' style='color:#5e17eb'></i>
            <p>sua sacola:</p>
        </div>

        <!-- PRODUTOS SACOLA -->
        <div class="produtos_sacola">
            <?php
            if (isset($_SESSION['sacola']) && count($_SESSION['sacola']) > 0) {
                foreach ($_SESSION['sacola'] as $index => $produto) {

                    // detalhes produto
                    echo '<div class="produto">';

                    echo '<img src="' . htmlspecialchars($produto['img_url']) . '" alt="' . htmlspecialchars($produto['nameProduto']) . '">';

                    echo '<div class="div-desc">';

                    echo '<p>' . htmlspecialchars($produto['nameProduto']) . '</p>';

                    echo '<div class="textprice">';

                    echo '<p>R$ ' . htmlspecialchars($produto['preco']) . '</p>';

                    echo '</div>';
                    echo '</div>';

                    // btn remover produto
                    echo '<form method="post" action="remover_produto.php">';

                    echo '<input type="hidden" name="index" value="' . htmlspecialchars($index) . '">';

                    echo '<button type="submit" class="btn-remover">Remover</button>';

                    echo '</form>';
                    echo '</div>';
                }
            } else {
                echo '<div class="produto">';
                echo '<p>Sua sacola está vazia.</p>';
                echo '</div>';
            }
            ?>
        </div>

        <!-- BOTÃO COMPRAR -->
        <div class="btn-comprar-produto">
            <button id="btn-comprar">Comprar</button>
        </div>
    </div>

    <!-- Modal -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Total da Compra</h2>
            <p id="total-value">R$ 0.00</p>
            <button id="finalize-purchase">Finalizar Compra</button>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var modal = document.getElementById('myModal');
            var btnComprar = document.getElementById('btn-comprar');
            var span = document.getElementsByClassName('close')[0];
            var finalizeBtn = document.getElementById('finalize-purchase');
            var totalValue = document.getElementById('total-value');

            btnComprar.onclick = function() {
                var total = 0.00;
                <?php
                if (isset($_SESSION['sacola']) && count($_SESSION['sacola']) > 0) {
                    foreach ($_SESSION['sacola'] as $produto) {
                        echo 'total += ' . floatval($produto['preco']) . ';'; // Somar os preços como float
                    }
                }
                ?>
                totalValue.textContent = 'R$ ' + total.toFixed(2); // Exibir o total formatado

                modal.style.display = 'block'; // Exibir o modal
            }

            span.onclick = function() {
                modal.style.display = 'none'; // Fechar o modal
            }

            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = 'none'; // Fechar o modal clicando fora dele
                }
            }

            finalizeBtn.onclick = function() {
                window.location.href = 'finalizar_compra.php'; // Redirecionar para finalizar a compra
            }
        });
    </script>
</body>

</html>