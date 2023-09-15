<?php
include 'conexao.php';

if($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])){
    session_destroy();
    header('Location: index.php');
    exit;
} else {
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $user = $_POST['user'];
        $email = $_POST['email'];

        $sql = "SELECT * FROM usuarios WHERE user = '$user' LIMIT 1";
        $sql_exec = $conn->query($sql) or die($conn->error);

        $usuario = $sql_exec->fetch_assoc();
        if(password_verify($_POST['senha'], $usuario['senha'])){
            session_start();
            $_SESSION['usuario_logado'] = true;

            sleep(1);
            header('Location: home.php');
        } else {
            sleep(1);
            header('Location: index.php');
        }
    }
}
?>



<!-- // $user1 = ['user' , 'L@na'];

    // if($_SERVER['REQUEST_METHOD'] === 'POST'){

    //     $usuario[0] = $_POST['user'];
    //     $usuario[1] = $_POST['senha'];


    //     if($usuario[0]===$user1[0] && $usuario[1]===$user1[1]){
           
    //         $_SESSION['usuario_logado'] = $usuario[0];

    //         // sleep(1);
    //         header('Location: home.php');
    //     } else {
    //         sleep(1);
    //         header('Location: index.php');
    //     }
    // } -->