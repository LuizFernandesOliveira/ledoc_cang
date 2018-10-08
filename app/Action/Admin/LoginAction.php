<?php
/**
 * Created by PhpStorm.
 * User: 20161197100045
 * Date: 03/10/2018
 * Time: 17:12
 */

namespace App\Action\Admin;

use Illuminate\Database\Capsule\Manager as DB;
use App\Action\Action;

class LoginAction extends Action
{

    public function index($request, $response)
    {
        if (isset($_SESSION[PREFIX . 'logado'])) {
            //return $response->withRedirect(PAF . '/admin');
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

            $user = DB::table('ledoc_usuario')->where('email', $email)->first();

            if ($user->rowCount() > 0) {

                $_SESSION[PREFIX . 'logado'] = true;
                return $response->withRedirect(PAF . '/admin');

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