<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/homeVendedor.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="../img/logo-icon.png">
    <title>Produtos cadastrados</title>
</head>

<body>

    <?php
    $msg = isset($_GET['msg']) ? $_GET['msg'] : '';
    ?>

    <!-- MENU NAVEGAÇÃO -->
    <nav>
        <div class="logo">
            <img src="../img/logo-estendida.png" alt="" class="img-logo">
        </div>
        <div class="menu">
            <span onclick="window.location.href='homeVendedor.php'">Produtos</span>
            <span onclick="window.location.href='perfilVendedor.php'">Seu Perfil</span>
        </div>
    </nav>

    <!-- FEED PRODUTOS -->
    <div class="feed">
        <!-- TITULO -->
        <div class="title">
            <h1>Seus produtos:</h1>
        </div>

        <div class="produtos">

            <!-- FORM ADD -->
            <div id="formNovoProduto" class="overlay">
                <!-- MODAL ADD PRODUTO -->
                <div class="modal">
                    <span class="fechar" onclick="fecharFormulario()">&times;</span>
                    <!-- salva os novos produtos no salvaProduto.php -->
                    <form action="salvaProduto.php" method="post">
                        <div>
                            <label for="produto">Produto:</label>
                            <input type="text" name="produto" id="produto" required>
                        </div>

                        <div>
                            <label for="descricao">Descrição:</label>
                            <textarea id="descricao" name="descricao" required></textarea>
                        </div>

                        <div>
                            <label for="preco">Preço:</label>
                            <input type="number" name="preco" id="preco" step="0.01" required>
                        </div>

                        <div>
                            <button type="submit" class="salvar-btn">SALVAR</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- BOTÃO ADD -->
            <div class="btn">
                <button type="button" class="btn-add" onclick="mostrarFormulario()">Adicionar</button>
            </div>

            <?php

            // arquivo json onde vai ficar salvo os produtos adicionados
            $arquivo = 'produtos.json';
            $extrair_dados = file_get_contents($arquivo);
            $dados = json_decode($extrair_dados, true);

            ?>
            <!-- TABELA - PRODUTOS CADASTRADOS -->
            <div class="tbl">
                <table>
                    <thead>
                        <tr>
                            <th>Produto</th>
                            <th>Descrição</th>
                            <th>Preço (R$)</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        // Itera sobre os produtos e exibe cada um na tabela
                        foreach ($dados as $id => $valor) {
                        ?>
                            <tr>
                                <td><?= $valor['produto'] ?></td>
                                <td><?= $valor['descricao'] ?></td>
                                <td><?= $valor['preco'] ?></td>
                                <td>
                                    <!-- BOTÃO EDITAR PRODUTO -->
                                    <a href="editarProduto.php?id=<?= $id ?>"><i class='bx bxs-pencil' style='color:#5e17eb' alt="Editar"></i></a>
                                    <!-- BOTÃO APAGAR PRODUTO -->
                                    <a href="apagarProduto.php?id=<?= $id ?>"><i class='bx bx-trash-alt' alt="Apagar"></i></a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="../JS/homeVendedor.js"></script>
</body>

</html>