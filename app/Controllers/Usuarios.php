<?php
/**
 * Created by PhpStorm.
 * User: 20161197100045
 * Date: 08/10/2018
 * Time: 16:18
 */

namespace App\Controllers;

use App\Models\Usuario;

class Usuarios
{
    public static function create_usuario($matricula, $nome, $email, $senha, $resenha, $adm)
    {

        $user = Usuario::create([
            'matricula' => $matricula,
            'nome' => $nome,
            'email' => $email,
            'senha' => $senha,
            'resenha' => $resenha,
            'adm' => $adm
        ]);
        return $user;
    }

    public static function return_usuario($email, $senha){
        $user = Usuario::
    }
}

?>

<!--//https://code.tutsplus.com/pt/tutorials/using-illuminate-database-with-eloquent-in-your-php-app-without-laravel--cms-27247-->