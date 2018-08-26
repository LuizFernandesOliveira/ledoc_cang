<?php
    require_once ("../banco_dados/DatabaseConnection.php");
    require_once ("../utilitarios/Utils.php");
    require_once ("../session/inicia_sessao.php");

    $databaseConnection = new DatabaseConnection();

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $matricula = $_POST['matricula'];
    $senha = $_POST['senha'];
    $resenha = $_POST['resenha'];
    $tamanho = strlen($matricula);

    //impedindo o cadastro de uma matricula com 14 caracteres em Coordenador ou Professor;
    $usuarioCategoria = $_POST['categoria'];
    if ($usuarioCategoria == 1) {
        $usuarioCategoria = "Aluno";
    } elseif ($usuarioCategoria == 2) {
        $usuarioCategoria = "Professor";
    } elseif ($usuarioCategoria == 3) {
        $usuarioCategoria = "Coordenador";
    }
    if ($tamanho == 14) {
        $usuarioCategoria = "Aluno";
    }

    $turma = substr($matricula, 0, 4);

    if (Utils::verificaCampoVazio($nome, $email, $matricula, $senha, $resenha)) {
        //VERIFICA SE O EMAIL JÁ FOI UTILIZADO
        $existEmail = $databaseConnection->verificaExistenciaEmail($email);
        if (empty($existEmail)) {
            //VERIFICA SE O EMAIL JÁ FOI UTILIZADO
            $existSenha = $databaseConnection->verificaExistenciaSenha($senha);
            if (empty($existSenha)) {
                //VERIFICA SE A MATRICULA UTILIZADA Está no cadastro
                $existMatricula = $databaseConnection->verificaExistenciaMatricula($matricula);
                if (!empty($existMatricula)) {
                    $rDC = $databaseConnection->retornaUsuario($matricula);
                    if(empty($rDC['email'])){
                        $resultado = $databaseConnection->atualizaBancoDados("UPDATE ledoc_usuario SET nome = '$nome', email = '$email', senha = '$senha', re_senha = '$resenha', turma = '$turma', ledoc_integrante_categoria = '$usuarioCategoria'  WHERE ledoc_usuario.matricula = '$matricula'");
                        if ($resultado) {
                            if (file_exists("admin/perfil/" . $matricula)) {

                            } else {
                                mkdir("../../admin/perfil/" . $matricula, 0777);
                                $caminho = "../../admin/perfil/perfil.jpg";
                                $destino = "../../admin/perfil/" . $matricula . "/perfil.jpg";
                                copy($caminho, $destino);
                            }
                            echo "<script>alert('Cadastro realizado com sucesso');window.history.go(-1);</script>";
                        }else{
                            echo "<script>alert('Houve um erro, contate a coordenação');window.history.go(-1);</script>";
                        }
                    }else{
                        echo "<script>alert('Esse usuário já efetuou o cadastro. Caso tenha perdido o acesso, entre em contato com a coordenação');window.history.go(-1);</script>";
                    }
                } else {
                    echo "<script>alert('Você não tem permissão para se cadastrar. Procure a coordenação do curso');window.history.go(-1);</script>";
                }
            } else {
                echo "<script>alert('Essa senha já foi utilizada por outro usuario');window.history.go(-1);</script>";
            }
        } else {
            echo "<script>alert('Esse e-mail já foi utilizado por outro usuario');window.history.go(-1);</script>";
        }
    } else {
        echo "<script>alert('Todos os campos devem ser preenchidos!');window.history.go(-1);</script>";
    }

?>