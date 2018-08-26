<?php
require "../../php/banco_dados/DatabaseConnection.php";
require "../../php/utilitarios/Utils.php";
require "../../php/session/inicia_sessao.php";

$usuario = $_SESSION["usuario"];
$databaseConnection = new DatabaseConnection();

$idDelet = $_POST['del_post'];

//VERIFICA SE A INSCRIÇÃO ESTÁ OU NAO VAZIA
if (Utils::verificaCampoVazio($idDelet)) {

    $img = $databaseConnection->makeQuery("SELECT imagem as img FROM ledoc_postagem WHERE ledoc_postagem.id = '$idDelet'");
    $img = $img[0]['img'];

    if (file_exists("../perfil/" . $usuario['matricula'] . "/postagem" . $idDelet."/".$img)) {
        $dell = unlink("../perfil/" . $usuario['matricula'] . "/postagem" . $idDelet."/".$img);
        $delll = rmdir("../perfil/" . $usuario['matricula'] . "/postagem" . $idDelet);

        $resultado = $databaseConnection->atualizaBancoDados("DELETE FROM ledoc_postagem WHERE ledoc_postagem.id = '$idDelet'");
    }

    if ($resultado && $dell && $delll) {
        echo "<script>alert('Deletado com sucesso');window.history.go(-1);</script>";
    } else {
        echo "<script>alert('falha ao deletar');window.history.go(-1);</script>";
    }


} else {
    echo "<script>alert('falha ao deletar');window.history.go(-1);</script>";
}
?>