<?php


namespace App\Http\Controllers\main;


use App\Http\Controllers\Controller;
use App\Http\Controllers\orm\ORMCompany;


class Company extends Controller
{
    public function info()
    {
        return $this->respSuccess(ORMCompany::get(request()->header('language', 'cn')));
    }
}
