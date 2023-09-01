<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Home Week</title>
</head>

<body>

    <div class="navbar">
        <!--<div class="top-navbar">
          <img src="img/WEEK-removebg-preview.png" alt="Logo do WEEK" srcset="">  
          <div class="logo"></div>
          <p>WEEK</p>
           <a href="#">Home</a> -->

        <header class="primeira-navbar">
            <div class="estrutura-logo">
                <img src="img/logo.png" alt="Logo" class="logo">
                <span class="nome-empresa">W E E K</span>
            </div>
            <span class="nav-home"><a class="vastarefas" href="home.php">Home</a></span>
        </header>
        <nav class="segunda-navbar">
            <a href="index.php" class="seta-link">
                <img src="img/return.png" alt="Seta" class="seta-img">
            </a>
            <!-- <span class="nav-calendario">Calendário</span> -->
            <a class="nav-calendario" href="indexCalendario.php" >Calendário</a>
        </nav>
        <main>
            <form class="adicionar-form">
                <input type="text" placeholder="Adicionar tarefa" class="input-task">
                <button type="submit">+</button>
            </form>

            <table class="estilizar-table">
                <thead>
                    <tr>
                        <th>Tarefa</th>+
                        <th>Criada em</th>
                        <th>Status</th>
                        <th>Ações</th>

                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>Título</td>
                        <td>00 de Janeiro de 2023 15:00</td>
                        <td>
                            <select class="estilizar-select">
                                <option value="pendente">Pendente</option>
                                <option value="em andamento">Em andamento</option>
                                <option value="concluida">Concluída</option>
                            </select>
                        </td>
                        <td>
                            <button class="btn-acao">
                                <span class="material-symbols-outlined">
                                    edit
                                </span>
                            </button>
                            <button class="btn-acao">
                                <span class="material-symbols-outlined">
                                    delete
                                </span>
                            </button>
                        </td>
                    </tr>

                </tbody>
            </table>
        </main>

</body>

</html>