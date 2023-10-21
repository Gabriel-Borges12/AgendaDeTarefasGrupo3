<?php
// echo "<script>alert('teste')</script>";
include 'conexao.php';


// if($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])){
//     session_destroy();
//     header('Location: index.php');
//     exit;
// }

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['usuario'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $cargo = $_POST['funcionario_cargo'];

    $conn->query("INSERT INTO funcionario (funcionario_nome,funcionario_email,funcionario_senha, funcionario_cargo) VALUES ('$user', '$email', '$senha', '$cargo')");

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stylepadrao.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
    Option 1: Include in HTML -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"> -->
    <link rel="icon" href=" ./img/logo.png">
    <title>Cadastro Week</title>
</head>

<body>
    <div class="main">
        <div class="lado-esq">
            <img id="logologin1" src="img/WEEK.png">
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
            <div class="container">
                <form id="cadastro-form" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
                    <h1 id="logintitulo">Cadastro</h1>
                    <img id="img-user" src="img/user.png">
                    <input type="text" class="formzao" placeholder="Usuário" name="usuario" required>
                    <br> <br>
                    <img id="img-email" src="img/e-mail.png">
                    <input type="text" class="formzao" placeholder="E-mail" name="email" required>
                    <br> <br>
                    <img id="img-senha" src="img/senha.png">
                    <input type="password" class="formzao" placeholder="Senha" name="senha" required>
                    <br><br>
                    <img id="img-cargo" src="img/cargo.png">
                    <select class="formzao" name="funcionario_cargo" id="funcionario_cargo" required autocomplete="off">
                        <option class="formzao" value="administrativo" required>Administração</option>
                        <option class="formzao" value="funcionario" required>Funcionário</option>
                    </select>
                    <br><br>

                    <button type="submit" id="botaocadastro">Cadastrar</button>
                    <a class="vparalogin" href="index.php">Voltar ao login</a>

                </form>
            </div>
        </div>
    </div>

</body>

</html>