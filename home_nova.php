<?php 
session_start();
include 'conexao.php';



if($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME']) && $_SESSION['usuario_logado'] !== true){
    session_destroy();
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="css/home_nova.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

  <title>Home - Lista de Tarefas</title>
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
    <div class="content"><br>
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
            <input type="submit" value="Salvar a tarefa" class="btn">
        </form>
        <button class="btn-voltar"><a href="listartarefas.php">Lista de tarefas</a></button>
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

  <script src="js/home.js"></script>
</body>
</html>