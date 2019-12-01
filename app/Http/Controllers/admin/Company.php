<?php


namespace App\Http\Controllers\admin;


use App\Http\Controllers\Controller;
use App\Http\Controllers\orm\ORMCompany;

class Company extends Controller
{
    public function getInfo()
    {
        return $this->respSuccess(ORMCompany::get());
    }

    public function setInfo()
    {
        ORMCompany::update(request()->all());
        return $this->respSuccess();
    }
}
