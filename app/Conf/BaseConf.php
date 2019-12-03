<?php


namespace App\Conf;


class BaseConf
{
    static $ValidatorMessages = [
        'required' => 'param :attribute miss',
        'size' => ':attribute must be exactly :size.',
    ];
}
