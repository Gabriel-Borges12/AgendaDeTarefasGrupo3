<?php
include 'conexao.php';

$sql = "SELECT * FROM tarefas";
$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
    echo "<table border='2'>";
    echo "<tr><th>ID do Funcionário</th><th>Nome da Tarefa</th><th>Criada em</th><th>Status</th><th>Ações</th></tr>";

    while ($row = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id_tarefa'] . "</td>";
        echo "<td>" . $row['descricao_tarefa'] . "</td>";
        echo "<td>" . $row['data_tarefa'] . "</td>";
        echo "<td>" . $row['status_tarefa'] . "</td>";
        echo "<td>";
        echo "<a href='editar.php?id=" . $row['id_tarefa'] . "'>Editar</a> | ";
        echo "<a href='excluir.php?id=" . $row['id_tarefa'] . "'>Apagar</a>";
        echo "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Nenhuma tarefa listada.";
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Lista</title>
</head>
<body>
<button type="button" class="btn-volta"><a href="home_nova.php">Voltar</a></button>
</body>
</html>





<!-- // include 'conexao.php';

// $sql = "SELECT * FROM paciente";
// $resultado = $conexao->query($sql);

// if ($resultado->num_rows > 0) {
//     while ($row = $resultado->fetch_assoc()) {

//     }
// } else {
//     echo "Nenhum paciente cadastrado.";
// }

// echo "<table>";
// echo "<tr><th>ID</th><th>Nome</th><th>Idade</th><th></tr>";
// while ($row = $resultado->fetch_assoc()) {
//     echo "<tr>";
//     echo "td" . $row['id_paciente'] . "</td>";
//     echo "td" . $row['nome_paciente'] . "</td>";
//     echo "td" . $row['cpf_paciente'] . "</td>";
//     echo "td" . $row['convenio_paciente'] . "</td>";
// }

// echo "</table>";

// if ($resultado->num_rows === 0) {
//     echo "Nenhum paciente cadastrado";
// }

// $conexao->close(); -->
