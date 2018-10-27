<?php
/**
 * Created by PhpStorm.
 * User: 20161197100045
 * Date: 03/10/2018
 * Time: 16:59
 */
namespace App\Action\Admin;
use App\Action\Action;

class HomeAction extends Action
{
    public function index($request, $response){
        if(isset($_SESSION['usuario'])) {
            $vars['page'] = 'home';
            $vars['nome'] = $_SESSION["usuario"];
            return $this->view->render($response, 'admin/index.phtml', $vars);
        }
    }
}