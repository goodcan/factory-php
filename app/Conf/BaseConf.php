<?php


namespace App\Conf;


class BaseConf
{
    // 参数校验对应错误信息结构
    static $ValidatorMessages = [
        'required' => 'param :attribute miss',
        'size' => ':attribute must be exactly :size.',
    ];

    // 文件存放目录
    static $UploadPath = [
        '1' => 'logo',
        '2' => 'product'
    ];

    // 可上传文件类型
    static $UploadFileType = ['jpg', 'jpeg', 'png'];

    // 最大上传文件大小
    static $UploadMaxSize = 5 * 1024 * 1024;
}
