<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Support\Facades\Validator;
use App\Conf\BaseConf;
use App\Dao\DAOWorkshop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Workshop extends Controller
{
    public function get(){
        return $this->respSuccess(DAOWorkshop::get());
    }

    public function set(){
        $input = request()->all();

        $validator = Validator::make($input, [
            'name' => 'required',
            // 'imgs' =>'required',
            'pid' => 'required',
        ], BaseConf::$ValidatorMessages);

        if ($validator->fails()) {
            return $this->respFailure($validator->errors());
        }
        
        return $this->respSuccess(DAOWorkshop::set($input));
    }

    public function del(){

        $input = request()->all();

        $validator = Validator::make($input, [
            'id' => 'required',
        ], BaseConf::$ValidatorMessages);

        if ($validator->fails()) {
            return $this->respFailure($validator->errors());
        }

        if (!DAOWorkshop::checkExists($input['id'])) {
            return $this->respFailure('nav is not exists');
        }

        DAOWorkshop::del($input['id']);

        return $this->respSuccess(true);
    }
}
