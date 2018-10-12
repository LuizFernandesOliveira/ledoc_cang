<?php
/**
 * Created by PhpStorm.
 * User: 20161197100045
 * Date: 08/10/2018
 * Time: 16:17
 */

namespace App\Models;
use \Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'ledoc_usuario';

    protected $fillable = [
        'matricula',
        'nome',
        'email',
        'senha',
        'resenha',
        'adm'
    ];

}

?>