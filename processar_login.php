<?php
    $user1 = ['Borges' , '123'];

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $usuario = [$_POST['user'], $_POST['senha']];

        if($usuario[0]==$user1[0] && $usuario[1]==$user1[1]){
            session_start();
            $_SESSION['usuario_logado'] = $usuario[0];

            sleep(1);
            header('Location: home.php');
        } else {
            sleep(1);
            header('Location: index.php');
        }
    }
?>