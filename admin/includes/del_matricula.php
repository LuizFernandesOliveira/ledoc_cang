<?php

    require "../../php/banco_dados/DatabaseConnection.php";
    require "../../php/utilitarios/Utils.php";
    require "../../php/session/inicia_sessao.php";

    $databaseConnection = new DatabaseConnection();

    $matricula = $_POST['matricula'];

    //VERIFICA SE A INSCRIÇÃO ESTÁ OU NAO VAZIA
    if (Utils::verificaCampoVazio($matricula)) {

        $resultado = $databaseConnection->atualizaBancoDados("DELETE FROM ledoc_usuario WHERE usuario.matricula = '$matricula'");
        if($resultado){
            echo "<script>alert('Deletado com sucesso');window.history.go(-1);</script>";
        }else{
            echo "<script>alert('falha ao deletar');window.history.go(-1);</script>";
        }

    }




?>