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
        $adm        = strip_tags(filter_var($data['adm'], FILTER_SANITIZE_STRING));

        $add_usuario = Usuarios::addUsuario($matricula, $nome, $email, $senha, $resenha, $adm);
    }
}