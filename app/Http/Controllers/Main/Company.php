<?php

namespace App\Http\Controllers\Main;

use App\Dao\DAOCompany;
use App\Http\Controllers\Controller;


class Company extends Controller
{
    public function info()
    {
        return $this->respSuccess(DAOCompany::getInfo(request()->header('language', 'cn')));
    }

    public function historyList()
    {
        return $this->respSuccess(DAOCompany::getHistory(request()->header('language', 'cn')));
    }
}
