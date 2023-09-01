<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
    Option 1: Include in HTML -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"> -->
    <title>Login Week</title>
</head>

<body>
    <div class="main">
        <div class="lado-esq">
            <img id="logologin" src="img/WEEK.png">
            <h1 id="titulo">Bem vindo ao Week!</h1>
            <p id="text">O aplicativo de gerenciamento de tarefas é uma ferramenta inovadora projetada para simplificar
                sua vida
                cotidiana. Com uma interface intuitiva e amigável, ele permite que você liste e priorize suas tarefas em
                uma
                única plataforma. A organização se torna fácil!</p>
            <div class="foto-caderneta">
                <img id="caderneta" src="img/cadernetalogin.png">
            </div>
        </div>
        <div class="lado-dir">
            <img id="logoLoginDir" src="img/WEEK.png">
            <h1 id="tituloDir">Bem vindo ao Week!</h1>
            <div class="container">
                <form id="cadastro-form">
                    <h1 id="logintitulo">Login</h1>
                    <img id="img-user" src="img/user.png">
                    <input type="text" class="formzao" name="user" placeholder="Usuario">
                    <br> <br>
                    <img id="img-senha" src="img/senha.png">
                    <input type="password" class="formzao" name="senha" placeholder="Senha">

                    <p id=""><a class="esqueceur" href="redefinirsenha.php">Esqueceu sua senha?</a></p>
                    <!-- <input type="button" value="" href="home.html"> -->
                    <button type="button" id="botaologin" onclick="window.location.href='./home.php'">Login</button>
                    
                    <p id="naotenho">Não tem uma conta?</p>
                    <a class="cadastre-se" href="cadastro.php">Cadastre-se</a>
                </form>
            </div>
        </div>
    </div>

</body>

</html>