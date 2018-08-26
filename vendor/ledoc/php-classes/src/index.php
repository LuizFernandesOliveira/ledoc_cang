<?php
/**
 * Created by PhpStorm.
 * User: 20161197100045
 * Date: 22/08/2018
 * Time: 17:12
 */
use Ledoc\DC\CadastroUsuario;

echo "Teste com o banco";

$cadastro = new CadastroUsuario();
$cadastro->atualizaCadastro("Luiz", "luiz.fernandes@email", "123", "123", "2016", "3", "1234567");
echo $cadastro;


?>