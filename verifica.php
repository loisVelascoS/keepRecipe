<?php
require '../banco.php';

if (isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])) {
    require_once 'User.class.php';
    $user = new Usuario();
    $usuarioLogado = $user->logado($_SESSION['idUser']);
    $nomeUser = $usuarioLogado['nm_usuario'];

    // $anotacao = $user->info_anotacao($_SESSION['idUser']);
} else {
    header("Location: ../erro.html");
}

?>