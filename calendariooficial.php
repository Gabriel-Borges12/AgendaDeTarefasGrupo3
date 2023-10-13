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
  <!-- <header class="primeira-navbar">
        <div class="estrutura-logo">
            <img src="img/logo.png" alt="Logo" class="logo">
            <span class="nome-empresa">W E E K</span>
        </div>
        <a href="home_nova.php" class="nav-home">Home</a>
    </header> -->
  <!-- <header class="primeira-navbar">
    <div class="estrutura-logo">
      <img src="img/logo.png" alt="Logo" class="logo">
      <span class="nome-empresa">W E E K</span>
    </div>
    <a href="#" class="nav-home">Home</a>
  </header>
  <nav class="segunda-navbar">
    <a href="#" class="nav-link seta-link">
      <img src="img/return.png" alt="Arrow" class="seta-img">
    </a> -->
  <!-- <span class="nav-calendario">Calendário</span> -->
  <!-- </nav> -->
  <div class="container">
    <div class="left">
      <div class="calendar">
        <div class="days"></div>
        <div class="goto">

        
          <iframe src="adicionar_tarefa_calendario.php" width="100%" height="600px" frameborder="0"></iframe>
        <div class="days"></div>
        <div class="goto-today">
          <div class="goto">
            <input type="text" placeholder="mês/ano" class="date-input" />
            <button class="goto-btn">Ir</button>
          </div>
          <button class="today-btn">Hoje</button>
        </div>
      </div>
    </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
  </div>


  <!-- <div class="container">
    <div class="left">
      <div class="calendar">
        <div class="month">
          <i class="fas fa-angle-left prev"></i>
          <div class="date">dezembro 2015</div>
          <i class="fas fa-angle-right next"></i>
        </div>
        <div class="weekdays">
          <div>Dom</div>
          <div>Seg</div>
          <div>Ter</div>
          <div>Qua</div>
          <div>Qui</div>
          <div>Sex</div>
          <div>Sáb</div>
        </div>
        <div class="days"></div>
        <div class="goto-today">
          <div class="goto">
            <input type="text" placeholder="mês/ano" class="date-input" />
            <button class="goto-btn">Ir</button>
          </div>
          <button class="today-btn">Hoje</button>
        </div>
      </div>
    </div>
    <div class="right">
      <div class="today-date">
        <div class="event-day">Qua</div>
        <div class="event-date">12 dezembro 2022</div>
      </div>
      <div class="events"></div>
      <div class="add-event-wrapper">
        <div class="add-event-header">
          <div class="title">Adicionar Evento</div>
          <i class="fas fa-times close"></i>
        </div>
        <div class="add-event-body">
          <div class="add-event-input">
            <input type="text" placeholder="Nome do Evento" class="event-name" />
          </div>
          <div class="add-event-input">
            <input type="text" placeholder="O evento começa ás" class="event-time-from" />
          </div>
          <div class="add-event-input">
            <input type="text" placeholder="O evento termina ás" class="event-time-to" />
          </div>
        </div>
        <div class="add-event-footer">
          <button class="add-event-btn">Adicionar</button>
        </div>
      </div>
    </div>
    <button class="add-event">
      <i class="fas fa-plus"></i>
    </button>
  </div> -->

  <!-- <footer>
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
  
          <a href="#" class="social-icon"><img src="img/icons8-facebook-48.png" alt="Facebook"></a>
          <a href="#" class="social-icon"><img src="img/icons8-twitter-48 (1).png" alt="Twitter"></a>
          <a href="#" class="social-icon"><img src="img/icons8-instagram-50 (1).png" alt="Instagram"></a>
          <h5>Dúvidas ou sugestões?</h5>
          <a href="#" class="linkemail">contact@weekcalendario</a><br>
        </div>
      </div>
    </div>
  </footer> -->

  <script src="script.js"></script>
</body>

</html>