<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/editar.css">
    <link rel="icon" href="../img/logo-icon.png">
    <title>Alterar Produto</title>
</head>

<body>
    <?php
    // pega o id do produto
    $id = $_GET['id'] ?? '';

    $dados = [];
    $arquivo = 'produtos.json';

    if (file_exists($arquivo)) {
        $extrair_dados = file_get_contents($arquivo);
        $dados = json_decode($extrair_dados, true);
    }
    ?>

    <div class="title">
        <h1>Alterar produto:</h1>
    </div>

    <!-- salva em alteraProduto.php  -->
    <form action="alteraProduto.php?id=<?= $id ?>" method="post">
        <div>
            <label for="produto">Produto: </label>
            <!-- busca pelo id do produto -->
            <input type="text" name="produto" id="produto" value="<?= $dados[$id]['produto'] ?>" required>
        </div>

        <div>
            <label for="descricao">Descrição:</label>
            <textarea id="descricao" name="descricao" value="<?= $dados[$id]['descricao'] ?>"></textarea required>
        </div>

        <div>
            <label for="preco">Preço: </label>
            <input type="number" name="preco" id="preco" value="<?= $dados[$id]['preco'] ?>" required>
        </div>

        <div>
            <!-- botao salvar alterações -->
            <button type="submit">SALVAR</button>
        </div>
    </form>
</body>

</html>