<?php
$usuario_valido = 'usuario_exemplo';
$senha_valida = 'senha123';


$nome = $_POST['nome'] ?? '';
$senha = $_POST['senha'] ?? '';

if ($nome === $usuario_valido && $senha === $senha_valida) {
    header("Location: admin.php");
    exit();
} else {

    echo 'Nome de usuário ou senha incorretos.';
}
?>
