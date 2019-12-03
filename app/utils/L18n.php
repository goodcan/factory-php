<?php


namespace App\Utils;

class L18n
{
    static function decodeDBField($data, $lang = null)
    {
        if ($data === null) {
            $field = [
                'cn' => '',
                'en' => ''
            ];
        } else {
            $field = Json::decodeDBField($data);
        }

        if ($lang === null) {
            return $field;
        } else {
            return $field[$lang];
        }
    }
}
