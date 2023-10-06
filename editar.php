<?php
session_start();
include 'conexao.php';

if (!isset($_SESSION['usuario_id'])) {
    header("Location: index.php");
    exit();
}

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
    $data_tarefa_formatada = date("Y-m-d", strtotime($data_tarefa));

    $status_tarefa = $_POST['status_tarefa'];

    $sql = "UPDATE tarefas SET descricao_tarefa = ?, data_tarefa = ?, status_tarefa = ? WHERE id_tarefa = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $descricao_tarefa, $data_tarefa_formatada, $status_tarefa, $id);


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
    <link rel="stylesheet" href="css/editar.css">
    <title>Atualizar</title>
</head>

<body>
    <header class="primeira-navbar">
        <div class="estrutura-logo">
            <img src="img/logo.png" alt="Logo" class="logo">
            <span class="nome-empresa">W E E K</span>
        </div>
        <a href="home.php" class="nav-home">Home</a>
    </header>
    <nav class="segunda-navbar">
        <a href="logout.php" class="nav-link seta-link">
            <img src="img/return.png" alt="Arrow" class="seta-img">
        </a>
        <span class="nav-calendario"><a class="nav-calendario" href="indexCalendario.php">Calendário</a></span>
    </nav>
    <br>
    <h1>Editar Tarefas</h1>
    <div class="content">
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="campo">
                <input type="hidden" name="id" value="<?php echo $paciente['id_tarefa']; ?>">

                <label for="descricao_tarefa">Descrição da Tarefa:</label>
                <input type="text" name="descricao_tarefa" id="descricao_tarefa"
                    value="<?php echo $tarefas['descricao_tarefa']; ?>" required>
                <label for="data_tarefa">Data da Tarefa:</label>
                <input type="date" name="data_tarefa" id="data_tarefa" value="<?php echo $tarefas['data_tarefa']; ?>"
                    required>
                <label for="status_tarefa">Status da Tarefa:</label>
                <select name="status_tarefa" id="status_tarefa" required>
                    <option value="pendente" <?php echo ($tarefas['status_tarefa'] == 'pendente') ? 'selected' : ''; ?>>
                        Pendente</option>
                    <option value="em andamento" <?php echo ($tarefas['status_tarefa'] == 'em andamento') ? 'selected' : ''; ?>>Em Andamento</option>
                    <option value="concluída" <?php echo ($tarefas['status_tarefa'] == 'concluída') ? 'selected' : ''; ?>>
                        Concluída</option>
                </select>

            </div>
            <button type="submit">Atualizar</button>
        </form>
    </div>
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
                    <a href="https://www.facebook.com/?locale=pt_BR" class="social-icon"><img
                            src="img/icons8-facebook-48.png" alt="Facebook"></a>
                    <a href="https://twitter.com/login?lang=pt" class="social-icon"><img
                            src="img/icons8-twitter-48 (1).png" alt="Twitter"></a>
                    <a href="https://www.instagram.com/" class="social-icon"><img src="img/icons8-instagram-50 (1).png"
                            alt="Instagram"></a>
                    <br><br>
                    <h5>Dúvidas ou sugestões?</h5>
                    <a href="#" class="linkemail">contact@weekcalendario</a><br>
                </div>
            </div>
        </div>
        </div>
    </footer>
</body>

</html>