<?php
/**
 * Created by PhpStorm.
 * User: luizf
 * Date: 27/10/2018
 * Time: 11:24
 */

namespace App\Action\Admin;

use App\Action\Action;
use App\BD\BD;
use App\Action\Util;


class UsuarioAction extends Action
{

    public function index($request, $response)
    {
        if (isset($_SESSION["usuario"])) {

            return $this->view->render($response, '/admin');

        }

        return $this->view->render($response, 'admin/login/login.phtml');
    }

    public function logar($request, $response)
    {
        $data = $request->getParsedBody();

        $email = strip_tags(filter_var($data['email'], FILTER_SANITIZE_STRING));
        $senha = strip_tags(filter_var($data['senha'], FILTER_SANITIZE_STRING));

        if (Util::verifyEmpty($email, $senha)) {
            $Sql = new BD();
            $user = $Sql->select("SELECT * FROM ledoc_usuario WHERE email = :EMAIL", array(
                ":EMAIL" => $email
            ));
            if ($user) {
                $usu["us"] = $user;

                if ($senha == $usu["us"][0]['senha']) {
                    $_SESSION["usuario"] = $user;
                    return $response->withRedirect(PAF . '/admin');
                } else {
                    $vars['erro'] = 'A senha está incorreta';
                    return $this->view->render($response, 'admin/login/login.phtml', $vars);
                }

            } else {
                $vars['erro'] = 'Voce não possui cadastro no sistema';
                return $this->view->render($response, 'admin/login/login.phtml', $vars);
            }

        } else {
            $vars['erro'] = 'Preencha todos os campos';
        }
        return $this->view->render($response, 'admin/login/login.phtml', $vars);
    }

    public function logout($request, $response)
    {
        unset($_SESSION["usuario"]);
        session_destroy();
        return $response->withRedirect(PAF . '/');

    }

    public function pagCadastro($request, $response)
    {
        return $this->view->render($response, 'admin/login/cadastro.phtml');

    }

    public function addUsuario($request, $response)
    {
        $data = $request->getParsedBody();
        $matricula = strip_tags(filter_var($data['matricula'], FILTER_SANITIZE_STRING));
        $nome = strip_tags(filter_var($data['nome'], FILTER_SANITIZE_STRING));
        $email = strip_tags(filter_var($data['email'], FILTER_SANITIZE_STRING));
        $senha = strip_tags(filter_var($data['senha'], FILTER_SANITIZE_STRING));
        $resenha = strip_tags(filter_var($data['resenha'], FILTER_SANITIZE_STRING));
        $adm = "nao";
        /* */
        $add_usuario = new BD();

        if (!$add_usuario) {
            $vars['erro'] = 'Voce não possui cadastro no sistema';
            return $this->view->render($response, 'admin/login/cadastro.phtml', $vars);
        }

        $vars['sucesso'] = 'O CADASTRO FOI REALIZADO COM SUCESSO';
        return $this->view->render($response, 'admin/login/cadastro.phtml', $vars);

    }

    public function cadastro($request, $response)
    {
        return $this->view->render($response, 'admin/login/cadastro.phtml');

    }

    //retorna os dados do usuario
    public function consultaUsuario($request, $response)
    {
        $data = $request->getParsedBody();
        $matricula = strip_tags(filter_var($data['matricula'], FILTER_SANITIZE_STRING));

        if ($this->verifyEmpty($matricula)) {
            $bd = new BD();
            $db = $bd->select("SELECT * FROM ledoc_usuario WHERE matricula = :MATRICULA", array(
                ":MATRICULA" => $matricula
            ));
            if (!$db) {
                $vars['erro'] = 'Não existe esse usuario';
                return $this->view->render($response, 'admin/login/cadastro.phtml', $vars);
            }

            $vars['sucesso'] = 'O usuario foi encontrado';
            return $this->view->render($response, 'admin/login/cadastro.phtml', $vars);

        } else {

        }

    }

    private $msg;
    private $msgs;

    //atualizaCadastro pq a matricula já está no banco
    public function atualizaUsuario($request, $response)
    {
        $data = $request->getParsedBody();

        $nome = strip_tags(filter_var($data['nome'], FILTER_SANITIZE_STRING));
        $email = strip_tags(filter_var($data['email'], FILTER_SANITIZE_STRING));
        $senha = strip_tags(filter_var($data['senha'], FILTER_SANITIZE_STRING));
        $resenha = strip_tags(filter_var($data['resenha'], FILTER_SANITIZE_STRING));
        $matricula = strip_tags(filter_var($data['matricula'], FILTER_SANITIZE_STRING));

        $Sql = new BD();
        $user = $Sql->select("SELECT * FROM ledoc_usuario WHERE matricula = :MATRICULA", array(
            ":MATRICULA" => $matricula
        ));

        if($user){
            $adm = "sim";
        }else{
            $adm = "nao";
        }


        if (Util::verifyEmpty($nome, $email, $senha, $resenha, $matricula)) {

            if ($senha != $resenha) {
                $this->msg = "As senhas adicionadas não são igual, por favor, redigite-as";
                return $this->msg;
            }

            $result = $Sql->query("UPDATE ledoc_usuario SET nome = :NOME, email = :EMAIL, senha = :SENHA, resenha = :RESENHA, adm = :ADM  WHERE ledoc_usuario.matricula = :MATRICULA", array(
                ':NOME' => $nome,
                ':EMAIL' => $email,
                ':SENHA' => $senha,
                ':RESENHA' => $resenha,
                ':MATRICULA' => $matricula,
                ':ADM' => $adm
            ));

            if ($result) {

                $name = "admin" . DIRECTORY_SEPARATOR . "perfil";
                if (!is_dir($name . DIRECTORY_SEPARATOR . $matricula)) mkdir($name . DIRECTORY_SEPARATOR . $matricula);
                $filename = $name . DIRECTORY_SEPARATOR . "perfil.jpg";
                $dirname = $name . DIRECTORY_SEPARATOR . $matricula . DIRECTORY_SEPARATOR . "perfil.jpg";
                copy(
                    $filename,
                    $dirname
                );

                echo "<script>alert('O CADASTRO FOI REALIZADO COM SUCESSO');</script>";

            } else {

                $this->msgs = "O cadastro não foi realizado. Procure a coordenação";
                return $this->msgs;

            }

        } else {

            $this->msgs = "Nenhum Campo deve estar vazio";
            return $this->msgs;
        }

    }


    //deleta usuario
    public function deletaUsuario($matricula)
    {
        if ($this->verifyEmpty($matricula)) {
            $Sql = new BD();
            $db = $Sql->query("DELETE FROM ledoc_usuario WHERE matricula = :MATRICULA", array(
                ":MATRICULA" => $matricula
            ));
            return $db;
        } else {
            throw new \Exception("mande um email para: Ledoc", 1);
        }

    }


    public function insereUsuario($matricula)
    {

        if (Utils::verifyEmpty($matricula)) {

            $login = $matricula;

        } else {

            $this->msg = "O campo não pode estar vazio!";
            return $this->msg;

        }
        $user = new Usuario();
        $results = $user->consultaUsuario($matricula);

        if ($results) {

            $this->msg = "A MATRICULA INSERIDA JÁ FOI ADICIONADA";
            return $this->msg;

        } else {

            $Sql = new Sql();
            $result = $Sql->query("INSERT INTO ledoc_usuario(matricula, nome, email, senha, resenha) VALUES (:MATRICULA,'','','','');", array(
                ":MATRICULA" => $login
            ));

            if ($result) {

                echo "<script>alert('A MATRICULA FOI INSERIDA COM SUCESSO');</script>";

            }

        }


    }

    public function seachUsuarios()
    {

        $Sql = new Sql();
        $results = $Sql->select("SELECT * FROM ledoc_usuario");
        return $results;

    }


}