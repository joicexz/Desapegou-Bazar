<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/homeCliente.css">
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

    <div class="produtos">
        <h1>produtos</h1>
    </div>

    <script src="../JS/main.js"></script>
</body>
</html>