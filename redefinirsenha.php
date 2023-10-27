<?php
include 'conexao.php';

// if ($_SERVER['REQUEST_METHOD'] == 'GET') {
//     session_destroy();
//     header('Location: index.php');
//     exit;
// } else {

    // if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //     $user = $_POST['user'];
    //     $sql = "SELECT funcionario_senha FROM funcionario WHERE funcionario_nome = '$user'";
    //     $sql_exec = $conn->query($sql) or die($conn->error);

    //     $snh = $sql_exec->fetch_assoc();
    //     $_POST['n-senha'] == $_POST['c-senha'] ? $n_senha = password_hash($_POST['n-senha'], PASSWORD_DEFAULT) : header('Location: redefinirsenha.php');

    //     $sql = "UPDATE funcionario SET funcionario_senha = '$n_senha' WHERE funcionario_nome = '$user'";
    //     $sql_exec = $conn->query($sql) or die($conn->error);

    //     sleep(1);
    //     header('Location: index.php');
    // }
    // $conn->close();
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/stylepadrao.css">
    <link rel="icon" href=" ./img/logo.png">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <title>Redefinir senha</title>
</head>

<body>
    <div class="main">
        <div class="lado-esq">
            <img id="logologin1" src="img/WEEK.png">
            <h1 id="titulo">Redefina sua senha!</h1>
            <p id="text">O aplicativo de gerenciamento de tarefas é uma ferramenta inovadora projetada para simplificar
                sua vida
                cotidiana. Com uma interface intuitiva e amigável, ele permite que você liste e priorize suas tarefas em
                uma
                única plataforma. A organização se torna fácil!</p>
            <!-- <div class="foto-cadeado">
                <img id="cadeado" src="img/senharedefinir.png">
            </div> -->
            <div class="foto-caderneta">
                <img id="caderneta" src="img/cadernetalogin.png">
            </div>
        </div>
        <div class="lado-dir">
        <div class="logo-responsiva">
    <img id="logologin" src="img/WEEK.png">
</div>
            <div class="container">
                <form action="processar_redefinir.php"id="cadastro-form" method = "post">
                    <h1 id="logintitulo">Esqueceu sua senha?</h1>
                    <p>Para redefinir sua senha, digite o nome de</p>
                    <p> usuário que você usa para fazer login no </p>
                    <p> Week, e crie uma senha nova.</p>
                    <br><br>
                    <img id="img-user" src="img/user.png">
                    <input type="email" name="email" class="formzao" placeholder="Seu email">
                    <br> <br>
                    <img id="img-senha" src="img/senha.png">
                    <input type="password" class="formzao" name="new_password" placeholder="Nova senha" id="senha">
                    <span class="lnr lnr-eye" id="show-password"></span>
                    <br><br>
                    <input type="submit" value="Salvar nova senha" id="botao-salvar-senha">
                    <br><br>
                    <a class="vparalogin" href="index.php">Voltar ao login</a>

                    <script>
                        const senhaInput = document.getElementById("senha");
                        const showPasswordIcon = document.getElementById("show-password");

                        showPasswordIcon.addEventListener("click", () => {
                        if (senhaInput.type === "password") {
                        senhaInput.type = "text";
                        } else {
                        senhaInput.type = "password";
                            }
                        });

                    </script>
                </form>
            </div>
        </div>
    </div>
</body>

</html>