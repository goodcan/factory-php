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
        $input = request()->all();

        $validator = Validator::make($input, [
            'phone' => 'required',
            'mobilePhone' => 'required',
            'concatUser' => 'required',
            'email' => 'required',
            'address' => 'required',
            'logo' => 'required',
            'briefIntroduction' => 'required',
            'latLng' => 'required'
        ], BaseConf::$ValidatorMessages);

        if ($validator->fails()) {
            return $this->respFailure($validator->errors());
        }

        DAOCompany::updateInfo($input);
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

    public function delHistory()
    {
        $input = request()->all();

        $validator = Validator::make($input, [
            'timestamp' => 'required',
        ], BaseConf::$ValidatorMessages);

        if ($validator->fails()) {
            return $this->respFailure($validator->errors());
        }

        DAOCompany::delHistory($input['timestamp']);
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
