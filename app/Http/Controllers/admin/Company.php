<?php


namespace App\Http\Controllers\admin;


use App\Http\Controllers\Controller;
use App\Http\Controllers\orm\ORMCompany;
use App\Http\Controllers\orm\ORMCompanyHistory;
use App\Http\Controllers\orm\ORMCompanyNews;

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

    public function getHistoryList()
    {
        return $this->respSuccess(ORMCompanyHistory::get());
    }

    public function setHistory()
    {
        ORMCompanyHistory::upsert(request()->all());
        return $this->respSuccess();
    }

    public function getNewsList() {
        return $this->respSuccess(ORMCompanyNews::get());
    }
}
