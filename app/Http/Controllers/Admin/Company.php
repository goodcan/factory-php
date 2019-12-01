<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Controllers\Dao\DAOCompany;
use App\Http\Controllers\Dao\DAOCompanyHistory;
use App\Http\Controllers\Dao\DAOCompanyNews;

class Company extends Controller
{
    public function getInfo()
    {
        return $this->respSuccess(DAOCompany::get());
    }

    public function setInfo()
    {
        DAOCompany::update(request()->all());
        return $this->respSuccess();
    }

    public function getHistoryList()
    {
        return $this->respSuccess(DAOCompanyHistory::get());
    }

    public function setHistory()
    {
        DAOCompanyHistory::upsert(request()->all());
        return $this->respSuccess();
    }

    public function getNewsList() {
        return $this->respSuccess(DAOCompanyNews::get());
    }
}
