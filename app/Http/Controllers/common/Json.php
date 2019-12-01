<?php


namespace App\Http\Controllers\common;


class Json
{
    static function decodeDBField($data)
    {
        return json_decode($data);
    }

    static function encodeDBField($data)
    {
        return json_encode($data);
    }
}
