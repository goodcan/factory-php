<?php


namespace App\Http\Controllers\Common;


class Json
{
    static function decodeDBField($data)
    {
        return json_decode($data, true);
    }

    static function encodeDBField($data)
    {
        return json_encode($data);
    }
}
