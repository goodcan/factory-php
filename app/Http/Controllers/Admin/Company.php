<?php

namespace App\Http\Controllers\Admin;

use App\Conf\BaseConf;
use App\Dao\DAOCompany;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;


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
        $input = request()->all();

        $validator = Validator::make($input, [
            'timestamp' => 'required',
            'content' => 'required',
        ], BaseConf::$ValidatorMessages);

        if ($validator->fails()) {
            return $this->respFailure($validator->errors());
        }

        DAOCompany::upsertHistory($input);
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
