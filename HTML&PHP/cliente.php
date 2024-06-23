<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/cliente.css">
    <link rel="icon" href="../img/logo-icon.png">
    <title>Cadastro Cliente</title>
</head>

<body>
    <!-- form de cadastro, dados mandados para cadastrocliente.php -->
    <form action="cadastrocliente.php" method="post">
        <div class="card-cadastro">
            <h1>Informações</h1>

            <label for="email">*Email:</label>
            <input type="email" name="email" id="email" placeholder="Digite seu e-mail" required>

            <label for="senha">*Senha:</label>
            <input type="password" name="senha" id="senha" placeholder="Digite sua senha" required>

            <label for="CEP">*CEP:</label>
            <input type="text" name="CEP" id="CEP" placeholder="Digite seu endereço" required>

            <label for="telefone">*Telefone:</label>
            <input type="tel" name="telefone" id="telefone" placeholder="Digite seu número de telefone" required>

            <button type="submit">Continuar</button>
        </div>
    </form>
</body>

</html>