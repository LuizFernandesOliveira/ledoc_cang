<?php
require_once("../php/banco_dados/DatabaseConnection.php");
require_once("../php/session/inicia_sessao.php");

$dbConnection = new DatabaseConnection();

$usuario = $_SESSION["usuario"];
$senha = $_POST['senha'];
$nsenha = $_POST['novasenha'];
$rnsenha = $_POST['repetenovasenha'];

/*
if ($senha != "" && $nsenha != "" && $rnsenha != "") {
    if ($senha == $senhalog) {
        if ($nsenha == $rnsenha) {
            if ($quant == 14) {
                mysqli_query($link, "UPDATE administrador SET senha = '$nsenha', resenha = '$rnsenha' WHERE administrador.matricula = '$login'");
            } else if ($quant == 7) {
                mysqli_query($link, "UPDATE coodenador SET senha = '$nsenha', resenha = '$rnsenha' WHERE coordenador.matricula = '$login'");
            }
            unset($_SESSION['matricula']);
            unset($_SESSION['senha']);
            header('location:../index.php');
            echo "<script>alert('A senha foi alterada com sucesso!');</script>";
        } else {
            echo "<script>alert('A senha inserida não confere!');window.history.go(-1);</script>";
        }
    } else {
        echo "<script>alert('A senha inserida não confere!');window.history.go(-1);</script>";
    }
} else {
    echo "<script>alert('todos os campos devem ser preenchidos!');window.history.go(-1);</script>";
}
*/

?>