<?php

namespace App\Http\Controllers\Main;
use Illuminate\Support\Facades\Validator;
use App\Conf\BaseConf;

use App\Dao\DAOCompany;
use App\Http\Controllers\Controller;
use Input;


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

    public function newsList()
    {
        return $this->respSuccess(DAOCompany::getNews(request()->header('language', 'cn')));
    }

    public function getNewsById()
    {
        $input = request()->all();
        $validator = Validator::make($input, [
            'id' => 'required'
        ], BaseConf::$ValidatorMessages);

        if ($validator->fails()) {
            return $this->respFailure($validator->errors());
        }

        if (!DAOCompany::checkNewsExists($input['id'])) {
            return $this->respFailure('news is not exists');
        }
        
        // DAOCompany::increaseReading($input['id']);

        return $this->respSuccess(DAOCompany::getNewsById($input['id'],request()->header('language', 'cn')));
    }
}
