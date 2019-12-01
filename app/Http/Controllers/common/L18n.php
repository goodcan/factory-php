<?php


namespace App\Http\Controllers\common;


class L18n
{
    static function fmtDBField($data)
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
