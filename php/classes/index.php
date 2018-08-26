<?php
/**
 * Created by PhpStorm.
 * User: 20161197100045
 * Date: 22/08/2018
 * Time: 17:12
 */

require_once ("CadastroUsuario.php");
echo "Teste com o banco";

$cadastro = new CadastroUsuario();
$cadastro->consultaUsuario("1234567");
echo $cadastro;


?>