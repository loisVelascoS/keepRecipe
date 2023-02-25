<?php

class User {
    public function login($nome, $senha) {
        global $conn;

        $sql = "SELECT * FROM usuario WHERE nome = :nome AND senha_usuario = :senha";
        $sql = $conn->prepare($sql);
        $sql->bindValue("nome", $nome);
        $sql ->bindValue("senha", md5($senha));
        $sql->execute();

        if($sql->rowCount() > 0) {
            $dado = $sql->fetch();
            $_SESSION['idUser'] = $dado['id_usuario'];
            return true;
        } else {
            return false;
        }
    }

    public function logado($id) {
        global $conn;
        $array = array();
        $sql = "SELECT nm_usuario FROM usuario WHERE id_usuario = :id";
        $sql = $conn->prepare($sql);
        $sql->bindValue("id", $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }

        return $array;
    }


    // public function info_anotacao($id) {
    //     global $conn;
    //     $array = array();
    //     $sql = "select nm_jogo, nu_estrelas, ds_anotacao, A.id_jogo from games.tb_jogo A, games.tb_anotacao B where A.id_jogo = B.id_jogo AND id_usuario = :id";
    //     $sql = $conn->prepare($sql);
    //     $sql->bindValue("id", $id);
    //     $sql->execute();

    //     if ($sql->rowCount() > 0) {
    //         $array = $sql->fetchAll();
    //     }

    //     return $array;
    // }
}

?>