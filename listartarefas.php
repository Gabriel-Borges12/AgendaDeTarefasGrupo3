<?php 
session_start();
include 'conexao.php';

if(!isset($_SESSION['usuario_id'])){
    header("Location: index.php");
    exit();
}
 if (isset($_SESSION['funcionario_nome'])) {
     $funcionario_nome = $_SESSION['funcionario_nome'];
} else {
     $funcionario_nome = "funcionario_nome"; // Ou qualquer valor padrão desejado
 }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="css/listartarefas.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <link rel="icon" href=" ./img/logo.png" widht="500px">
  <title>Home - Lista de Tarefas</title>
</head>
<body>
    <header class="primeira-navbar">
        <div class="estrutura-logo">
            <img src="img/logo.png" alt="Logo" class="logo">
            <span class="nome-empresa">W E E K</span>
        </div>
        <a href="home_nova.php" class="nav-home">Home</a>
        <span class="nav-usuario">Bem-vindo, <?php echo $_SESSION['funcionario_nome']; ?></span>
    </header>
    <nav class="segunda-navbar">
        <a href="logout.php" class="nav-link seta-link">
            <img src="img/return.png" alt="Arrow" class="seta-img">
        </a>
        <span class="nav-calendario"><a class="nav-calendario" href="calendariooficial.php">Calendário</a></span>
    </nav>
    <?php
include 'conexao.php';

$sql = "SELECT * FROM tarefas INNER JOIN funcionario ON tarefas.fk_cliente_id = funcionario_id  ORDER BY data_tarefa ASC";
$resultado = $conn->query($sql);

echo "<br><h1>Lista de Tarefas</h1>";


if ($resultado->num_rows > 0) {
    echo "<div class='table-container'>";
    echo "<table border='2'>";
    echo "<tr><th>Nome do funcionário</th><th>Nome da Tarefa</th><th>Data em que será realizada</th><th>Status</th><th>Funcionário que realizara</th><th>Ações</th></tr>";

    while ($row = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['funcionario_nome'] . "</td>";
        echo "<td>" . $row['descricao_tarefa'] . "</td>";
        echo "<td>" . $row['data_tarefa'] . "</td>";
        echo "<td>" . $row['status_tarefa'] . "</td>";
        echo "<td>" . $row['funcionario_nome'] . "</td>";
        echo "<td>";
        echo "<a href='editar.php?id=" . $row['id_tarefa'] . "'><span class='material-icons'>edit</span></a> | ";
        echo "<a href='excluir.php?id=" . $row['id_tarefa'] . "'><span class='material-icons'>delete</span></a>";

        echo "</td>";
        echo "</tr>";
    }

    echo "</table>";
    echo "</div>"; // Close the table-container div
} else {
    echo "Nenhuma tarefa listada.";
}

$conn->close();

?>
<br>
<div class="btn-volta-container">
    <a href="home_nova.php" class="btn-volta">Voltar</a>
</div>
<br>

<footer>
    <div class="conteudogeral">
        <div class="conteudo1">
            <h4>Sobre nós</h4><br>
            <p>Ajudamos as pessoas a organizarem suas vidas através</p>
            <p>de um gerenciador de tarefas simples, prático e bonito.</p>
            <p>Com o WEEK a organização se torna fácil!</p>
        </div>
        <div class="conteudo2">
            <h4>Links Importantes</h4><br>
            <ul class="linksfooter">
                <li><a class="linksimportantes" href="#">Funcionalidades</a></li>
                <li><a class="linksimportantes" href="#">Termos de uso</a></li>
                <li><a class="linksimportantes" href="#">Dúvidas</a></li>
                <li><a class="linksimportantes" href="#">Planos</a></li>
                <li><a class="linksimportantes" href="#">Blog</a></li>
            </ul>

        </div>
        <div class="conteudo3">
            <h4>Siga nossas redes sociais!</h4>
            <div class="social-icons">
                <!-- ícones encontrados no site icons8.com.br -->
                <a href="https://www.facebook.com/?locale=pt_BR" class="social-icon"><img src="img/icons8-facebook-48.png" alt="Facebook"></a>
                  <a href="https://twitter.com/login?lang=pt" class="social-icon"><img src="img/icons8-twitter-48 (1).png" alt="Twitter"></a>
                  <a href="https://www.instagram.com/" class="social-icon"><img src="img/icons8-instagram-50 (1).png" alt="Instagram"></a>
                <br><br><h5>Dúvidas ou sugestões?</h5>
                <a href="#" class="linkemail">contact@weekcalendario</a><br>
            </div>
        </div>
    </div>
    </div>
</footer>
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
