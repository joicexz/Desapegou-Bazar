<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/login.css">
    <link rel="icon" href="../img/logo-icon.png">
    <title>LOGIN</title>
</head>

<body>

    <div class="card-login">
        <h1>LOGIN</h1>

        <form action="logincliente.php" method="post">

            <label for="email">*Email:</label>
            <input type="email" name="email" id="email" placeholder="Digite seu e-mail" required>

            <label for="senha">*Senha:</label>
            <input type="password" name="senha" id="senha" placeholder="Digite sua senha" required>

            <button type="submit">Login</button>
        </form>
    </div>

</body>

</html>