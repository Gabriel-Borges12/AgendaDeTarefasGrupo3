<?php
session_start();
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['user'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM funcionario WHERE funcionario_nome = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $linha = $resultado->fetch_assoc();
        $senha_bd = $linha['funcionario_senha'];

        if (password_verify($senha, $senha_bd)) {
            $_SESSION['usuario_logado'] = true;
            $_SESSION['usuario_id'] = $linha['funcionario_id'];
            header('Location: home.php');
            exit();
        }
    }

    // Se a autenticação falhar, redirecione de volta para a página de login
    header('Location: home.php');
    exit();
}
?>