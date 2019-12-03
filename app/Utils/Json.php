<?php

namespace App\Utils;

class Json
{
    static function decodeDBField($data)
    {
        return json_decode($data, true);
    }

    static function encodeDBField($data)
    {
        if ($data === NULL) {
            return '';
        }
        return json_encode($data);
    }
}
