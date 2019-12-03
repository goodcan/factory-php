<?php

namespace App\Http\Controllers\Admin;

use App\Dao\DAOCompany;
use App\Http\Controllers\Controller;


class Company extends Controller
{
    public function getInfo()
    {
        return $this->respSuccess(DAOCompany::getInfo());
    }

    public function setInfo()
    {
        DAOCompany::updateInfo(request()->all());
        return $this->respSuccess();
    }

    public function getHistoryList()
    {
        return $this->respSuccess(DAOCompany::getHistory());
    }

    public function setHistory()
    {
        DAOCompany::upsertHistory(request()->all());
        return $this->respSuccess();
    }

    public function getNewsList()
    {
        return $this->respSuccess(DAOCompany::getNews());
    }

    public function setNews()
    {
        return $this->respSuccess();
    }
}
