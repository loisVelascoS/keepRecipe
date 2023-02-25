<?php
$nome = $_POST["nome"];
$senha = $_POST["senha"];

// função de insert - ajustar para tabela destino
function db_inserir($nome, $senha)
{
    global $conn;
    $sql = "INSERT INTO usuario(nm_usuario, senha_usuario) VALUES ('$nome', '$email', MD5('$senha'))";
    try {
        $conn->query($sql);
        header("Location: ../inicial.html");
    } catch (Exception $e) {
        header("Location: ../erro.html");
    }
    return null;
}

require_once("./banco.php");

// chamada da função
db_inserir($nome, $senha);

?>