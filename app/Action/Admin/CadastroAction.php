<?php
/**
 * Created by PhpStorm.
 * User: 20161197100045
 * Date: 08/10/2018
 * Time: 15:30
 */

namespace App\Action\Admin;

use App\Action\Action;
use App\Controllers\Usuarios;

class CadastroAction extends Action
{
    public function addUsuario($request, $response)
    {
        $data = $request->getParsedBody();
        $matricula  = strip_tags(filter_var($data['matricula'], FILTER_SANITIZE_STRING));
        $nome       = strip_tags(filter_var($data['nome'], FILTER_SANITIZE_STRING));
        $email      = strip_tags(filter_var($data['email'], FILTER_SANITIZE_STRING));
        $senha      = strip_tags(filter_var($data['senha'], FILTER_SANITIZE_STRING));
        $resenha    = strip_tags(filter_var($data['resenha'], FILTER_SANITIZE_STRING));
        $adm        = "nao";

        $add_usuario = Usuarios::addUsuario($matricula, $nome, $email, $senha, $resenha, $adm);

        if(!$add_usuario){
            $vars['erro'] = 'Voce não possui cadastro no sistema';
            return $this->view->render($response, 'admin/login/cadastro.phtml', $vars);
        }

        $vars['sucesso'] = 'O CADASTRO FOI REALIZADO COM SUCESSO';
        return $this->view->render($response, 'admin/login/cadastro.phtml', $vars);
    }

    public function cadastro($request, $response){
        return $this->view->render($response, 'admin/login/cadastro.phtml');

    }
}