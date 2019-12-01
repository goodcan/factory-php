<?php


namespace App\Http\Controllers\common;


class L18n
{
    static function decodeDBField($data)
    {
        if ($data === null) {
            return [
                'cn' => '',
                'en' => ''
            ];
        } else {
            return Json::decodeDBField($data);
        }
    }
}
