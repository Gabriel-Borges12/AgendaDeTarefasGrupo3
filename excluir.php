<?php
include 'conexao.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "DELETE FROM tarefas WHERE id_tarefa = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: listartarefas.php");
    } else {
        echo "Erro ao excluir tarefa: " . $conn->error;
    }
    $stmt->close();
}

?>