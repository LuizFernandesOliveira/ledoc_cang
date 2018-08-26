<?php
/**
 * Created by PhpStorm.
 * User: 20161197100045
 * Date: 21/08/2018
 * Time: 16:22
 */

require_once ("Sql.php");
require_once ("Model.php");
class Usuario extends Model
{
    private $nome;
    private $email;
    private $senha;
    private $resenha;
    private $turma;
    private $usuarioCategoria;
    private $matricula;

    public function getnome()
    {
        return $this->nome;
    }
    public function setnome($value)
    {
        $this->nome = $value;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($value)
    {
        $this->email = $value;
    }
    public function getSenha()
    {
        return $this->senha;
    }
    public function setSenha($value)
    {
        $this->senha = $value;
    }
    public function getResenha()
    {
        return $this->resenha;
    }
    public function setResenha($value)
    {
        $this->resenha = $value;
    }
    public function getTurma()
    {
        return $this->turma;
    }

    public function setTurma($value)
    {
        $this->turma = $value;
    }
    public function getUsuarioCategoria()
    {
        return $this->usuarioCategoria;
    }
    public function setUsuarioCategoria($value)
    {
        $this->usuarioCategoria = $value;
    }
    public function getMatricula()
    {
        return $this->matricula;
    }
    public function setMatricula($value)
    {
        $this->matricula = $value;
    }



    //atualizaCadastro pq a matricula já está no banco
    public function atualizaCadastro($nome, $email, $senha, $resenha, $turma, $usuarioCategoria, $matricula){

        $dbConnection = new Sql();
        $dbConnection->select("UPDATE ledoc_usuario SET nome = :NOME, email = :EMAIL, senha = :SENHA, re_senha = :RESENHA, turma = :TURMA, usuario_categoria = :UCATEGORIA  WHERE matricula = :MATRICULA", array(
            ':NOME'       => $nome,
            ':EMAIL'      => $email,
            ':SENHA'      => $senha,
            ':RESENHA'    => $resenha,
            ':TURMA'      => $turma,
            ':UCATEGORIA' => $usuarioCategoria,
            ':MATRICULA'  => $matricula
        ));

        return $dbConnection;
    }



    //retorna os dados do usuario
    public function consultaUsuario($matricula)
    {
        $Sql = new Sql();
        $db = $Sql->select("SELECT * FROM ledoc_usuario WHERE matricula = :MATRICULA",array(
            ":MATRICULA" => $matricula
        ));
        $dbs = $db[0];
        $this->setData($dbs);
    }

    //deleta usuario
    public function deletaUsuario($matricula)
    {
        $Sql = new Sql();
        $db = $Sql->select("DELETE * FROM ledoc_usuario WHERE matricula = :MATRICULA",array(
            ":MATRICULA" => $matricula
        ));
        $dbs = $db[0];
        $this->setData($dbs);
    }




    public function __construct($nome = "", $email = "", $senha = "", $resenha = "", $turma = "", $usuarioCategoria = "", $matricula = ""){
        $this->setnome($nome);
        $this->setEmail($email);
        $this->setSenha($senha);
        $this->setResenha($resenha);
        $this->setTurma($turma);
        $this->setUsuarioCategoria($usuarioCategoria);
        $this->setMatricula($matricula);
    }




    public function __toString(){
        return json_encode(array(
            "nome"=>$this->getnome(),
            "email"=>$this->getEmail(),
            "senha"=>$this->getSenha(),
            "resenha"=>$this->getResenha(),
            "turma"=>$this->getTurma(),
            "usuarioCategoria"=>$this->getUsuarioCategoria(),
            "matricula"=>$this->getMatricula()
        ));
    }



}