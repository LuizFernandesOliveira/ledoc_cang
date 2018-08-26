<?php
require_once "ConnectBD.php";

class DatabaseConnection
{
    private $connection = null;

    function __construct()
    {
        $this->connection = ConnectBD::getConnect();
    }

    function makeQuery($sql, ...$params)
    {
        $stmt = $this->connection->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $args = $this->setParams($params);
        $stmt->execute($args);
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    function atualizaBancoDados($sql, ...$params)
    {
        $stmt = $this->connection->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $args = $this->setParams($params);
        $result = $stmt->execute($args);
        return $result;
    }

    public function setParams($params)
    {
        $args = [];
        foreach ($params as $param) {
            $args[] = $param;
        }
        return $args;
    }

    function retornaUsuario($matricula)
    {
        $sql = "SELECT * FROM  ledoc_usuario where matricula = '$matricula'";
        return $user = $this->setRetorna($sql);
    }

    function retornaMatriculas()
    {
        $sql = "SELECT * FROM  ledoc_usuario.matricula";
        return $mat = $this->setRetorna($sql);
    }

    function retornaPostagem()
    {
        $sql = "SELECT max(id) FROM  ledoc_postagem";
        return $post = $this->setRetorna($sql);
    }

    public function setRetorna($sql)
    {
        $retorn = $this->makeQuery($sql);
        if ($retorn) {
            return $retorn[0];
        } else {
            return null;
        }
    }

    function verificaExistenciaMatricula($matricula)
    {
        $sql = "SELECT * FROM ledoc_usuario WHERE matricula LIKE ?";
        return $ma[0] = $this->setVerifica($sql, $matricula);
    }

    function verificaExistenciaEmail($email)
    {
        $sql = "SELECT * FROM ledoc_usuario WHERE email LIKE ?";
        return $em[0] = $this->setVerifica($sql, $email);
    }

    function verificaExistenciaSenha($senha)
    {
        $sql = "SELECT * FROM ledoc_usuario WHERE senha LIKE ?";
        return $se[0] = $this->setVerifica($sql, $senha);
    }

    public function setVerifica($sql, $tipoDado)
    {
        $sen = $this->makeQuery($sql, $tipoDado);
        if ($sen) {
            return $sen[0];
        } else {
            return null;
        }
    }
}

?>
