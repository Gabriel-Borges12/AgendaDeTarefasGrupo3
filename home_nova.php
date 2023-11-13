<?php
session_start();
include 'conexao.php';

// if(!isset($_SESSION['usuario_id'])){
//     header("Location: index.php");
//     exit();
// }

if (isset($_SESSION['funcionario_cargo']) && $_SESSION['funcionario_cargo'] == 'administrativo') {

} else {
    header("Location: listartarefas.php");
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

    <link rel="stylesheet" href="./css/home_novaa.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
    <link rel="icon" href=" ./img/logo.png">
    <title>Página Inicial - Lista de Tarefas</title>
</head>

<body>
    <header class="primeira-navbar">
        <div class="estrutura-logo">
            <img src="img/logo.png" alt="Logo" class="logo">
            <span class="nome-empresa">W E E K</span>
            <a href="home_nova.php" class="nav-home">Páginal Inicial</a>
        </div>
        <span class="nav-usuario">Bem-vindo (a),
            <?php echo $_SESSION['funcionario_nome']; ?>
        </span>
        <!-- <a href="home_nova.php" class="nav-home">Home</a> -->
    </header>
    <nav class="segunda-navbar">
        <a href="logout.php" class="nav-link seta-link">
            <img src="img/return.png" alt="Arrow" class="seta-img">
        </a>
        <span class="nav-calendario"><a class="nav-calendario" href="calendariooficial.php">Calendário</a></span>
    </nav>
    <!-- <div class="content"><br>
    <h1>Escreva suas tarefas!</h1>
    <br>
        <form action="adicionar_tarefa.php" method="POST" class="formulario">
        <div class="campo">
            <label for="descricao_tarefa">Nome da tarefa:</label>
            <input type="text" name="descricao_tarefa" id="descricao_tarefa" placeholder="Digite o nome da sua tarefa">
            <label for="data_tarefa">Selecione uma data:</label>
            <input type="date" id="data_tarefa" name="data_tarefa">
            <label for="status_tarefa">Status:</label>
            <select name="status_tarefa" id="status_tarefa">
                <option value="pendente">Pendente</option>
                <option value="em andamento">Em Andamento</option>
                <option value="concluída">Concluída</option>
            </select>
            <input type="submit" value="Salvar a tarefa" class="btn"><br>
        <button class="btn-voltar"><a href="lista_pacientes.php" class="botaotarefas">Lista de tarefas</a></button>
        </form>
        </div> -->

    <div class="content">
        <h1>Escreva suas tarefas!</h1>
        <br>
        <form action="adicionar_tarefa.php" method="POST" class="formulario">
            <div class="campo">
                <label for="descricao_tarefa">Nome da tarefa:</label>
                <input type="text" name="descricao_tarefa" id="descricao_tarefa"
                    placeholder="Digite o nome da sua tarefa" required autocomplete="off">
                <label for="data_tarefa">Selecione uma data:</label>
                <input type="date" id="data_tarefa" name="data_tarefa" required autocomplete="off">
                <label for="status_tarefa">Status:</label>
                <select name="status_tarefa" id="status_tarefa" required autocomplete="off">
                    <option value="pendente" required>Pendente</option>
                    <option value="em andamento" required>Em Andamento</option>
                    <option value="concluída" required>Concluída</option>
                </select>
                <label for="responsavel_tarefa">Funcionário que realizará:</label>
                <select name='responsavel_tarefa' id='responsavel_tarefa' required>
                    <?php
                    $sql = "SELECT * FROM funcionario ";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($linha = $result->fetch_assoc()) {
                            echo "<option value='" . $linha['funcionario_nome'] . "' required>" . $linha['funcionario_nome'] . "</option>";
                        }
                    }
                    ?>
                </select>
                <input type="submit" value="Salvar a tarefa" class="btn">
            </div>
            <div class="button-container">
                <a href="listartarefas.php" class="botaotarefas">Lista de tarefas</a>
            </div>
        </form>
    </div>
    </div>
    <br>
    <footer>
        <div class="conteudogeral">
            <div class="conteudo1">
                <h4>Sobre nós</h4><br>
                <p>Ajudamos as pessoas a organizarem suas vidas através</p>
                <p>de um gerenciador de tarefas simples, prático e bonito.</p>
                <p>Com a WEEK a organização se torna fácil!</p>
            </div>
            <div class="conteudo2">
                <h4>Links Importantes</h4><br>
                <ul class="linksfooter">
                    <li><a class="linksimportantes" href="footer/funcionalidades.php">Funcionalidades</a></li>
                    <li><a class="linksimportantes" id="linksimportantes" href="img/Termos.pdf" target="_blank">Termos de uso</a></li>
                    <li><a class="linksimportantes" href="#">Blog</a></li>

            </div>
            <div class="conteudo3">
                <h4>Siga nossas redes sociais!</h4>
                <div class="social-icons">
                    <!-- ícones encontrados no site icons8.com.br -->
                    <a href="https://www.facebook.com/senaisaopaulo/?locale=pt_BR" class="social-icon"><img
                            src="img/icons8-facebook-48.png" alt="Facebook"></a>
                    <a href="https://twitter.com/i/flow/login?redirect_after_login=%2Fweek_agendador" class="social-icon"><img
                            src="img/icons8-twitter-48 (1).png" alt="Twitter"></a>
                    <a href="https://instagram.com/week_agendador?igshid=M3poZjhhYWV6dDU2" class="social-icon"><img src="img/icons8-instagram-50 (1).png"
                            alt="Instagram"></a>
                    <br><br>
                    <h5>Dúvidas ou sugestões?</h5>
                    <a href="#" class="linkemail">weekagendador@gmail.com</a><br>
                </div>
            </div>
        </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>
    <script src="js/home.js"></script>
</body>

</html>