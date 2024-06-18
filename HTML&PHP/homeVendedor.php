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
        <div class="title">
            <h1>Seus produtos:</h1>
        </div>

        <div class="produtos">
            <div class="btn">
                <button type="button" class="btn-add" onclick="mostrarFormulario()">Adicionar</button>
            </div>

            <div id="formNovoProduto" class="overlay">
                <div class="modal">
                    <span class="fechar" onclick="fecharFormulario()">&times;</span>
                    <form action="salvaProduto.php" method="post">
                        <div>
                            <label for="produto">Produto:</label>
                            <input type="text" name="produto" id="produto">
                        </div>

                        <div>
                            <label for="descricao">Descrição:</label>
                            <textarea id="descricao" name="descricao"></textarea>
                        </div>

                        <div>
                            <label for="preco">Preço:</label>
                            <input type="number" name="preco" id="preco">
                        </div>

                        <div>
                            <button type="submit" class="salvar-btn">SALVAR</button>
                        </div>
                    </form>
                </div>
            </div>

            <?php
            $arquivo = 'produtos.json';
            $extrair_dados = file_get_contents($arquivo);

            $dados = json_decode($extrair_dados, true);
            ?>
            <table>
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Descrição</th>
                        <th>Preço</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    foreach ($dados as $id => $valor) {
                    ?>
                        <tr>
                            <!-- <td><?= $id ?></td> -->
                            <td><?= $valor['produto'] ?></td>
                            <td><?= $valor['descricao'] ?></td>
                            <td><?= $valor['preco'] ?></td>
                            <td>
                                <a href="editarProduto.php?id=<?= $id ?>"><i class='bx bxs-pencil' style='color:#5e17eb'></i></a>
                                <a href="apagarProduto.php?id=<?= $id ?>"><i class='bx bx-trash-alt'></i></a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <script src="../JS/homeVendedor.js"></script>
</body>

</html>