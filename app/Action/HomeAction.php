<?php
/**
 * Created by PhpStorm.
 * User: 20161197100045
 * Date: 03/10/2018
 * Time: 16:59
 */
namespace App\Action;

class HomeAction extends Action
{

    public function ledocComunica($request, $response){
        $vars['page'] = 'ledoc_comunica';
        return $this->view->render($response, 'index.phtml', $vars);
    }

    public function edocEmPauta($request, $response){
        $vars['page'] = 'edoc_em_pauta';
        return $this->view->render($response, 'index.phtml', $vars);
    }

    public function corpoDocente($request, $response){
        $vars['page'] = 'corpo_docente';
        return $this->view->render($response, 'index.phtml', $vars);
    }

    public function conhecaOCurso($request, $response){
        $vars['page'] = 'conheca_o_curso';
        return $this->view->render($response, 'index.phtml', $vars);
    }

    public function estagiosDocente($request, $response){
        $vars['page'] = 'estagios_docente';
        return $this->view->render($response, 'index.phtml', $vars);
    }

    public function trabalhos($request, $response){
        $vars['page'] = 'trabalhos';
        return $this->view->render($response, 'index.phtml', $vars);
    }

    public function projetos($request, $response){
        $vars['page'] = 'projetos';
        return $this->view->render($response, 'index.phtml', $vars);
    }

    public function equipe($request, $response){
        $vars['page'] = 'equipe';
        return $this->view->render($response, 'index.phtml', $vars);
    }

}