<?php


namespace App\Utils;


class Md5
{
    static function encode($data)
    {
        return md5($data);
    }
}

