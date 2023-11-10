<?php
include 'conexao.php';

session_start();

if (!isset($_SESSION['usuario_id'])) {
  header("Location: index.php");
  exit();
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description"
    content="Stay organized with our user-friendly Calendar featuring events, reminders, and a customizable interface. Built with HTML, CSS, and JavaScript. Start scheduling today!" />
  <meta name="keywords" content="calendar, events, reminders, javascript, html, css, open source coding" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="css/calendariooficial.css" />
  <link rel="icon" href=" ./img/logo.png">
  <title>Calendário</title>

</head>

<body>
  <div class="navbar">
    <div class="estrutura-logo">
      <img src="img/logo.png" alt="Logo" class="logo">
      <span class="nome-empresa">W E E K</span>
      <a class="links-nav" href="home_nova.php">Página Inicial</a>
      <a class="links-nav" href="listartarefas.php">Tarefas</a>
    </div>
  </div>
  <div class="container-geral">
    <div class="container">
      <!-- <div class="left"> -->
      <div class="calendar">
        <div class="days"></div>
        <div class="goto">
          <iframe src="adicionar_tarefa_calendario.php" frameborder="0"></iframe>
          <div class="days"></div>

        </div>
      </div>
    </div>
    <!-- </div> -->
  </div>
  <script src="script.js"></script>
  </div>
  </div>

</body>

</html>