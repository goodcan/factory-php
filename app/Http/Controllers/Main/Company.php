<?php


namespace App\Http\Controllers\Main;


use App\Http\Controllers\Controller;
use App\Http\Controllers\Dao\DAOCompany;
use App\Http\Controllers\Dao\DAOCompanyHistory;


class Company extends Controller
{
    public function info()
    {
        return $this->respSuccess(DAOCompany::get(request()->header('language', 'cn')));
    }

    public function historyList()
    {
        return $this->respSuccess(DAOCompanyHistory::get(request()->header('language', 'cn')));
    }
}
