<?php
session_start();
include 'conexao.php';

if(!isset($_SESSION['usuario_id'])){
    header("Location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $var_descricao = $_POST['descricao_tarefa'];
    $var_data = $_POST['data_tarefa'];
    $var_status = $_POST['status_tarefa'];
    $var_responsavel = $_POST['responsavel_tarefa'];
    $var_usuario_id = $_SESSION['usuario_id'];


    $sql_insercao = "INSERT INTO tarefas (descricao_tarefa, data_tarefa, status_tarefa, fk_cliente_id, responsavel_tarefa) VALUES (?,?,?,?,?)";
    $stmt = $conn->prepare($sql_insercao);

    $stmt->bind_param("sssis", $var_descricao, $var_data, $var_status, $var_usuario_id, $var_responsavel);

    if ($stmt->execute()) {
        header("Location: home_nova.php?msg=Tarefa registrada com sucesso!");
    } else {
        echo "Erro ao cadastrar paciente" . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>