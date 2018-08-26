<?php
    require "../banco_dados/DatabaseConnection.php";
    require "../utilitarios/Utils.php";
    require "../session/inicia_sessao.php";

    $databaseConnection = new DatabaseConnection();

    $matricula = $_POST['matricula'];
    $senha = $_POST['senha'];

    if (Utils::verificaCampoVazio($matricula, $senha)) {
        //LOGIN DO COORDENADOR
        $rDC = $databaseConnection->retornaUsuario($matricula);
        if (isset($rDC['matricula'])) {
            $sen = $rDC['senha'];
            if($sen == $senha){
                $_SESSION["usuario"] = $rDC;
                header('location:../../admin/index.php');
            }else{
                echo "<script>alert('A SENHA NÃO ESTÁ CORRETA');window.history.go(-1);</script>";
            }
        }else {
            echo "<script>alert('VOCÊ NÃO TEM ACESSO PARA O LOGIN, FAVOR PROCURAR A COORDENAÇÃO DO CURSO');window.history.go(-1);</script>";
        }
    } else {
        //MANDA O USUARIO PARA A PÁGINA INICIAL
        header('location:../../index.php?valor=1');
    }

?>