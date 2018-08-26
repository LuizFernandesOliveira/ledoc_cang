<?php

class Utils
{
    public static function verificaCampoVazio(...$fields)
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
?>
