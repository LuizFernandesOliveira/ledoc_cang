<?php
require "../../php/banco_dados/DatabaseConnection.php";
require "../../php/utilitarios/Utils.php";
require "../../php/session/inicia_sessao.php";

$databaseConnection = new DatabaseConnection();

$inscricao = $_POST['inscricao'];
$tam = strlen($inscricao);
if($tam == 7 || $tam == 14){

    //VERIFICA SE A INSCRIÇÃO ESTÁ OU NAO VAZIA
    if (Utils::verificaCampoVazio($inscricao)) {

        //VERIFICA SE A MATRICULA UTILIZADA Está no cadastro
        $existMatricula = $databaseConnection->retornaUsuario($inscricao);

        if (empty($existMatricula)) {

            $resultado = $databaseConnection->atualizaBancoDados("INSERT into ledoc_usuario(matricula, nome, email, senha, re_senha, turma, usuario_categoria)value ('$inscricao', '','','','', NULL , NULL );");

            echo "<script>alert('MATRICULA CADASTRADA COM SUCESSO!');window.history.go(-1);</script>";

        } else {

            echo "<script>alert('Essa matricula já foi adicionada');window.history.go(-1);</script>";

        }
    } else {

        echo "<script>alert('O campo não pode estar vazio');window.history.go(-1);</script>";

    }

}else{

    echo "<script>alert('Esta matricula não pode ser adicionada');window.history.go(-1);</script>";

}




?>
