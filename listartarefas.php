<?php 
session_start();
include 'conexao.php';

if(!isset($_SESSION['usuario_id'])){
    header("Location: index.php");
    exit();
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
  <link rel="stylesheet" href="css/listartarefas.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
  <link rel="icon" href="./img/logo.png" width="500px">
  <title>Home - Lista de Tarefas</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>
</head>
<body>

    <header class="primeira-navbar">
        <div class="estrutura-logo">
            <br>
            <img src="img/logo.png" alt="Logo" class="logo">
            <span class="nome-empresa">W E E K</span>
            <a href="home_nova.php" class="nav-home">Home</a>
            <br>
        </div>
        <span class="nav-usuario">Bem-vindo (a), <?php echo $_SESSION['funcionario_nome']; ?></span>
        <!-- <a href="home_nova.php" class="nav-home">Home</a> -->
        
    </header>
    <nav class="segunda-navbar">
        <a href="logout.php" class="nav-link seta-link">
            <img src="img/return.png" alt="Arrow" class="seta-img">
        </a>
        <span class="nav-calendario"><a class="nav-calendario" href="calendariooficial.php">Calendário</a></span>
    </nav>

    <?php
    $sql = "SELECT *
            FROM tarefas 
            INNER JOIN funcionario ON tarefas.fk_cliente_id = funcionario.funcionario_id
            ORDER BY data_tarefa ASC";
    $resultado = $conn->query($sql);

    echo "<br><h1>Lista de Tarefas</h1>";

    if ($resultado->num_rows > 0) {
        echo "<div class='table-container'>";
        echo "<table border='2'>";
        echo "<tr><th>Nome do funcionário</th><th>Nome da Tarefa</th><th>Data em que será realizada</th><th>Status</th><th>Funcionário que realizará</th><th>Ações</th></tr>";
    
        while ($row = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['funcionario_nome'] . "</td>";
            echo "<td>" . $row['descricao_tarefa'] . "</td>";
            echo "<td>" . $row['data_tarefa'] . "</td>";
            echo "<td>" . $row['status_tarefa'] . "</td>";
            echo "<td>" . $row['responsavel_tarefa'] . "</td>";
            echo "<td>";
            if(isset($_SESSION['funcionario_cargo']) && $_SESSION['funcionario_cargo'] == 'administrativo'){
                echo "<a href='editar.php?id=" . $row['id_tarefa'] . "'><span class='material-icons'>edit</span></a> | ";
                echo "<a onclick='confirmDelete(" . $row['id_tarefa'] . ")'><span class='material-icons'>delete</span></a>";
            } else {
                echo "";
            }
            

            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
    }
    $conn->close();
    ?>

    <br>
    <div class="btn-volta-container">
        <a href="home_nova.php" class="btn-volta">Voltar</a>
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
 </footer>

 <!-- <script>
function confirmarExclusao() {
    Swal.fire({
        title: 'Tem certeza de que deseja excluir esta tarefa?',
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: `Sim`,
        denyButtonText: `Não`,
        imageUrl: 'https://via.placeholder.com/150', // Insira o URL da imagem do calendário aqui
        imageWidth: 150,
        imageHeight: 150,
        imageAlt: 'Calendário',
    }).then((result) => {
        /* Se o usuário confirmar, você pode adicionar o código para excluir a tarefa aqui */
        if (result.isConfirmed) {
            // Código para excluir a tarefa
        }
    });
}
</script> -->

    <!-- <script>
    function confirmarExclusao() {
        return confirm("Tem certeza de que deseja excluir esta tarefa?");
    }
    </script> -->


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Você tem certeza?',
                text: "Você não será capaz de reverter isso!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sim, exclua!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'excluir.php?id=' + id;
                }
            })
        }
    </script>
</body>
</html>