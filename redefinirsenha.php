<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/redefinirsenha.css">
    <title>Redefinir senha</title>
</head>
<body>
    <div class="main">
        <div class="lado-esq">
            <img id="logologin" src="img/WEEK.png">
            <h1 id="titulo">Redefina sua senha!</h1>
            <p id="text">O aplicativo de gerenciamento de tarefas é uma ferramenta inovadora projetada para simplificar
                sua vida
                cotidiana. Com uma interface intuitiva e amigável, ele permite que você liste e priorize suas tarefas em
                uma
                única plataforma. A organização se torna fácil!</p>
            <div class="foto-cadeado">
                <img id="cadeado" src="img/senharedefinir.png">
            </div>
        </div>
        <div class="lado-dir">
            <div class="container">
                <form id="cadastro-form">
                    <h1 id="logintitulo">Esqueceu sua senha?</h1>
                    <p>Para redefinir sua senha, digite o nome de</p> 
                    <p> usuário que você usa para fazer login no </p>
                    <p> Week, e crie uma senha nova.</p>
                    <img id="img-user"src="img/user.png">
                    <input type="text" class="formzao" placeholder="Usuario">
                    <br> <br>
                    <img id="img-senha" src="img/senha.png">
                    <input type="password" class="formzao" placeholder="Nova senha">
                    <br> <br>
                    <img id="img-senha" src="img/senha.png">
                    <input type="password" class="formzao" placeholder="Confirmar senha">
                    <br><br>
                    <button type="submit" id="redefinir">Redefinir</button>
                    <br><br>
                    <a class="vparalogin" href="index.php">Voltar ao login</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>