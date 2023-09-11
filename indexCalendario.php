<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8' />
    <link rel='stylesheet' href="css/calenderfull.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          events:[
            {title: 'Reunião dos Chefes',
            start:'2023-08-14',
            end:'2023-08-16',
            color: 'purple'
            
            },
            {
            title: 'Inauguração da Loja da Hamburgolândia',
            start:'2023-08-31',
            end:'2023-08-31',
            color: 'red'
            
            },
            {title: 'Limpeza do Escritório',
            start:'2023-08-18',
            end:'2023-08-18',
            color: 'pink'
            },

            {
            title: 'Dia da Yas <3<3<3 ',
            start:'2023-09-27',
            end:'2023-09-27',
            color: '#fc0fc0'
            
            },

          ],

        });
        calendar.render();
      });

    </script>
  </head>
  <body>
    <div class="navbar">
      <header class="primeira-navbar">
          <div class="estrutura-logo">
              <img src="img/logo.png" alt="Logo" class="logo">
              <span class="nome-empresa">W E E K</span>
          </div>
          <!-- <span class="nav-home">Home</span> -->
          <span class="nav-home"><a class="vastarefas" href="home.php">Home</a></span>
      </header>
      <nav class="segunda-navbar">
          <a href="index.php" class="seta-link">
              <img src="img/return.png" alt="Seta" class="seta-img">
          </a>
          <span class="nav-calendario"><a class="vastarefas" href="home.php">Voltar as tarefas</a></span>
      </nav>
  </div>
    <div id='calendar'></div>

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
                  <a href="#" class="social-icon"><img src="img/icons8-facebook-48.png" alt="Facebook"></a>
                  <a href="#" class="social-icon"><img src="img/icons8-twitter-48 (1).png" alt="Twitter"></a>
                  <a href="#" class="social-icon"><img src="img/icons8-instagram-50 (1).png" alt="Instagram"></a>
                  <br><br><h5>Dúvidas ou sugestões?</h5>
                  <a href="#" class="linkemail">contact@weekcalendario</a><br>
              </div>
          </div>
      </div>
      </div>
  </footer>
  </body>
</html>