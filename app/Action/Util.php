<?php
/**
 * Created by PhpStorm.
 * User: 20161197100045
 * Date: 06/11/2018
 * Time: 21:38
 */

namespace App\Action;


class Util
{
    public static function verifyEmpty(...$fields)
    {
        $verified = true;
        foreach ($fields as $field) {
            //se existir algum campo vazio já retorna false
            if (empty($field)) {
                $verified = false;
                break;
            }
        }
        return $verified;
    }
}