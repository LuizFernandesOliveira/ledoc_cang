<?php
    require "../../php/banco_dados/DatabaseConnection.php";
    require "../../php/utilitarios/Utils.php";
    require "../../php/session/inicia_sessao.php";

    $databaseConnection = new DatabaseConnection();

    $nome = $_POST['nome'];
    $ano = $_POST['ano'];
    $email = $_POST['email'];
    $categoria = $_POST['categoria'];
    $hab = $_POST['hab'];

    //VERIFICA SE A INSCRIÇÃO ESTÁ OU NAO VAZIA
    if (Utils::verificaCampoVazio($nome, $ano, $categoria, $hab)) {
        $resultado = $databaseConnection->atualizaBancoDados("INSERT into ledoc_integrante(id, nome, email, ano, id_habilitacao, id_categoria)VALUES (NULL ,'$nome','$email','$ano','$hab','$categoria')");
            echo "<script>alert('O INTEGRANTE FOI ADICIONADO COM SUCESSO!');window.history.go(-1);</script>";

    } else {
        echo "<script>alert('Por favor, preencha todos os campos!');window.history.go(-1);</script>";
    }

?>