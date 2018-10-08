<?php
/**
 * Created by PhpStorm.
 * User: 20161197100045
 * Date: 03/10/2018
 * Time: 16:58
 */

$app->get('/', 'App\Action\HomeAction:ledocComunica');
$app->get('/ledoc_comunica', 'App\Action\HomeAction:ledocComunica');
$app->get('/edoc_em_pauta', 'App\Action\HomeAction:edocEmPauta');
$app->get('/corpo_docente', 'App\Action\HomeAction:corpoDocente');
$app->get('/conheca_o_curso', 'App\Action\HomeAction:conhecaOCurso');
$app->get('/estagios_docente', 'App\Action\HomeAction:estagiosDocente');
$app->get('/trabalhos', 'App\Action\HomeAction:trabalhos');
$app->get('/projetos', 'App\Action\HomeAction:projetos');
$app->get('/equipe', 'App\Action\HomeAction:equipe');
$app->get('/admin/cadastro', 'App\Action\Admin\CadastroAction:cadastro');
$app->post('/admin/cadastro', 'App\Action\Admin\CadastroAction:addUsuario');

$app->group('/admin', function(){
	$this->get('', 'App\Action\Admin\HomeAction:index');

	//POSTS
	$this->get('/posts', 'App\Action\Admin\PostAction:index');
	$this->get('/posts/add', 'App\Action\Admin\PostAction:add');
	$this->post('/posts/add', 'App\Action\Admin\PostAction:store');
	$this->get('/posts/{id}/edit', 'App\Action\Admin\PostAction:edit');
	$this->post('/posts/{id}/edit', 'App\Action\Admin\PostAction:update');

})->add(App\Middleware\Admin\AuthMiddleware::class);

$app->get('/admin/login', 'App\Action\Admin\LoginAction:index');
$app->post('/admin/login', 'App\Action\Admin\LoginAction:logar');
$app->get('/admin/logout', 'App\Action\Admin\LoginAction:logout');