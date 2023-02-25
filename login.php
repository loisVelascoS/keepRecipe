<?php

if (isset($_POST["nome"]) && !empty($_POST["nome"]) && isset($_POST["senha"]) && !empty($_POST["senha"])) {
    require './banco.php';
    require './user.class.php';

    $user = new Usuario();

    $nome = addslashes($_POST["nome"]);
    $senha = addslashes($_POST["senha"]);

    if($user->login($nome, $senha) == true) {
        if(isset($_SESSION['idUser'])) {
            header("Location: ../inicial.php");
        } else {
            header("Location: ../erro.html");
        }
    } else {
        header("Location: ../erro.html");
    }
} else {
    header("Location: ../login.html");
}

?>