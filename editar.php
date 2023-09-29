<?php
session_start();
include 'conexao.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM tarefas WHERE id_tarefa= ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows == 1) {
        $tarefas = $resultado->fetch_assoc();
    } else {
        die("Tarefa não encontrado.");
    }
} else {
    die("ID da tarefa não especificado.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $descricao_tarefa = $_POST['descricao_tarefa'];
    $data_tarefa = $_POST['data_tarefa'];
    $status_tarefa = $_POST['status_tarefa'];

    $sql = "UPDATE tarefas SET descricao_tarefa = ?, data_tarefa = ?, status_tarefa = ? WHERE id_tarefa = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sdii", $descricao_tarefa, $data_tarefa, $status_tarefa, $id);

    if ($stmt->execute()) {
        header("Location: listartarefas.php");
    } else {
        echo "Erro ao atualizar tarefa: " . $conn->error;
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Atualizar</title>
</head>

<body>
    <h1>Editar Tarefas</h1>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <input type="hidden" name="id" value="<?php echo $paciente['id_tarefa']; ?>">

        <label for="descricao_tarefa">Descrição da Tarefa:</label>
        <input type="text" name="descricao_tarefa" id="descricao_tarefa"
            value="<?php echo $tarefas['descricao_tarefa']; ?>" required>
        <label for="data_tarefa">Data da Tarefa:</label>
        <input type="date" name="data_tarefa" id="data_tarefa" value="<?php echo $tarefas['data_tarefa']; ?>" required>
        <label for="status_tarefa">Status da Tarefa:</label>
        <select name="status_tarefa" id="status_tarefa" value="<?php echo $tarefas['status_tarefa']; ?>" required>>
            <?php
            if ($resultado->num_rows > 0) {
                while ($row = $resultado->fetch_assoc()) {
                    $status_tarefa = $row["status_tarefa"];
                    echo '<option value="' . $status_tarefa . '">' . $status_tarefa  . '</option>"';
                }
            } else {
                echo "Nenhuma opção encontrada.";
            }
            echo '</select>';
            ?>


            <button type="submit">Atualizar</button>
    </form>
</body>

</html>



<!-- while ($_enum>rows) {
            echo "<option value='$tarefas[status_tarefa]'>Pendente</option>";            
        }
        ?>
        // </select> -->