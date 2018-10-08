<?php 
/*
namespace App\Action\Admin;

use App\Action\Action;

class PostAction extends Action
{

    public function index($request, $response){

    	$vars['title'] = 'Lista de Posts';

        $vars['page'] = 'posts/list';

        $posts = $this->db->prepare("SELECT `id`, `titulo`, `descricao` FROM `posts` ORDER BY `id` DESC");
        $posts->execute();

        if($posts->rowCount()>0){
        	$vars['posts'] = $posts->fetchAll(\PDO::FETCH_OBJ);
        }

        return $this->view->render($response, 'admin/index.phtml', $vars);

    }

    public function add($request, $response){

    	$vars['title'] = 'Novo post';

        $vars['page'] = 'posts/add';

        return $this->view->render($response, 'admin/index.phtml', $vars);

    }

    public function store($request, $response){

    	$data = $request->getParsedBody();

    	$titulo = filter_var($data['titulo'], FILTER_SANITIZE_STRING);
    	$descricao = filter_var($data['descricao'], FILTER_SANITIZE_STRING);

    	if($titulo != "" && $descricao != ""){
    		$cadastrar = $this->db->prepare("INSERT INTO `posts` SET `titulo` = ?, `descricao` = ?");
	    	$cadastrar->execute(array($titulo, $descricao));
	    	return $response->withRedirect(PATH.'/admin/posts');
    	}
		$vars['title'] = 'Lista de Posts';
        $vars['page'] = 'posts/add';

        $vars['error'] = 'Preencha todos os campos.';
        return $this->view->render($response, 'admin/index.phtml', $vars);
    	
    }

    public function edit($request, $response){

    	$id = $request->getParsedBody('id');

    	if(!is_numeric($id)){
    		return $response->withRedirect(PATH.'/admin/posts');
    	}

    	$post = $this->db->prepare("SELECT `id`, `titulo`, `descricao` FROM `posts` WHERE `id` = ? ");
    	$post->execute(array($id));

    	if($post->rowCount() == 0){
    		return $response->withRedirect(PATH.'/admin/posts');
    	}

    	$vars['post'] = $post->fetch(\PDO::FETCH_OBJ);

    	$vars['title'] = 'Editar post';

        $vars['page'] = 'posts/edit';

        return $this->view->render($response, 'admin/index.phtml', $vars);

    }

    public function update($request, $response){

    	$data = $request->getParsedBody();

    	$titulo = filter_var($data['titulo'], FILTER_SANITIZE_STRING);
    	$descricao = filter_var($data['descricao'], FILTER_SANITIZE_STRING);

    	if($titulo != "" && $descricao != ""){
    		$cadastrar = $this->db->prepare("INSERT INTO `posts` SET `titulo` = ?, `descricao` = ?");
	    	$cadastrar->execute(array($titulo, $descricao));
	    	return $response->withRedirect(PATH.'/admin/posts');
    	}
		$vars['title'] = 'Lista de Posts';
        $vars['page'] = 'posts/add';

        $vars['error'] = 'Preencha todos os campos.';
        return $this->view->render($response, 'admin/index.phtml', $vars);
    	
    }
}*/
 ?>
