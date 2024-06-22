<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $arquivo = 'banco.json';

    if (file_exists($arquivo)) {
        $conteudo = file_get_contents($arquivo);
        $usuarios = json_decode($conteudo, true);

        foreach ($usuarios as $usuario) {
            if ($usuario['email'] === $email && $usuario['senha'] === $senha) {
                $_SESSION['loggedin'] = true;
                $_SESSION['email'] = $email;
                header('Location: homeCliente.php');
                exit;
            }
        }
        echo "<script type='text/javascript'>
        alert('Email ou senha incorretos.')
        window.location.href = 'login.php';
        </script>";
    } else {
        echo "<script type='text/javascript'>
        alert('Arquivo de usuários não encontrado.')
        window.location.href = 'login.php';
        </script>";
    }
} else {
    echo "<script type='text/javascript'>
        alert('Método de requisição inválido.')
        window.location.href = 'login.php';
        </script>";
}
