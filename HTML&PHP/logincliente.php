<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $arquivoCliente = 'banco.json';
    $arquivoVendedor = 'vendedor.json';

    // Verifica login de cliente
    if (file_exists($arquivoCliente)) {
        $conteudo = file_get_contents($arquivoCliente);
        $usuarios = json_decode($conteudo, true);

        foreach ($usuarios as $index => $usuario) {
            if ($usuario['email'] === $email && $usuario['senha'] === $senha) {
                $_SESSION['cliente_index'] = $index;
                $_SESSION['loggedin'] = true;
                $_SESSION['email'] = $email;
                header('Location: homeCliente.php');
                exit;
            }
        }
    }

    // Verifica login de vendedor
    if (file_exists($arquivoVendedor)) {
        $conteudo = file_get_contents($arquivoVendedor);
        $usuarios = json_decode($conteudo, true);

        foreach ($usuarios as $index => $usuario) {
            if ($usuario['email'] === $email && $usuario['senha'] === $senha) {
                $_SESSION['vendedor_index'] = $index;
                $_SESSION['loggedin'] = true;
                $_SESSION['email'] = $email;
                header('Location: homeVendedor.php');
                exit;
            }
        }
    }

    echo "<script type='text/javascript'>
    alert('Email ou senha incorretos.');
    window.location.href = 'login.php';
    </script>";
} else {
    echo "<script type='text/javascript'>
    alert('Método de requisição inválido.');
    window.location.href = 'login.php';
    </script>";
}
