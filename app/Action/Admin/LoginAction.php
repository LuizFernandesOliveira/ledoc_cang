<?php
/**
 * Created by PhpStorm.
 * User: 20161197100045
 * Date: 03/10/2018
 * Time: 17:12
 */

namespace App\Action\Admin;

use App\Action\Action;
use App\Controllers\Usuarios;

class LoginAction extends Action
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

        if ($email !== '' && $senha !== '') {

            $user = Usuarios::return_usuario($email);

            if ($user) {

                if ($senha == $user->senha) {
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

        unset($_SESSION[PREFIX . 'logado']);
        session_destroy();
        return $response->withRedirect(PAF . '/');
    }


}