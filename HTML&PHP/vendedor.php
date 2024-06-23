<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/vendedor.css">
    <link rel="icon" href="../img/logo-icon.png">
    <title>Cadastro Vendedor</title>
</head>

<body>

    <!-- Salva os dadps em cadastrovendedor.php -->
    <form action="cadastrovendedor.php" method="post">
        <div class="card-cadastro-vendedor">

            <div class="info">
                <h1>Informações</h1>
            </div>

            <div class="inputs">
                <div class="esquerdo">

                    <label for="nome">*Nome:</label>
                    <input type="text" name="nome" id="nome" placeholder="Digite seu nome" required>

                    <label for="email">*Email:</label>
                    <input type="email" name="email" id="email" placeholder="Digite seu e-mail" required>

                    <label for="CNPJ">CNPJ:</label>
                    <input type="number" name="CNPJ" id="CNPJ" placeholder="Digite seu e-mail">

                </div>

                <div class="direito">
                    <label for="senha">*Senha:</label>
                    <input type="password" name="senha" id="senha" placeholder="Digite sua senha" required>

                    <label for="CEP">*CEP:</label>
                    <input type="text" name="CEP" id="CEP" placeholder="Digite seu endereço" required>

                    <label for="telefone">*Telefone:</label>
                    <input type="tel" name="telefone" id="telefone" placeholder="Digite seu número de telefone" required>
                </div>
            </div>

            <div class="btn">
                <button type="submit">Continuar</button>
            </div>
        </div>
    </form>
</body>

</html>