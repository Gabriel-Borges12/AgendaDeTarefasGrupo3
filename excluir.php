<?php
include 'conexao.php';
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: index.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM tarefas WHERE id_tarefa = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>
        Swal.fire({
            title: 'Exclusão realizada com sucesso!',
            text: 'A tarefa foi excluída.',
            icon: 'success',
            confirmButtonColor: '#3085d6'
        });
        </script>";
        header("Location:listartarefas.php");
    } else {
        echo "<script>
        Swal.fire({
            title: 'Erro ao excluir tarefa',
            text: 'Ocorreu um erro ao tentar excluir a tarefa.',
            icon: 'error',
            confirmButtonColor: '#d33'
        });
        </script>";
    }
    $stmt->close();
}
?>