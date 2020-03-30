<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use App\Conf\BaseConf;
use App\Dao\DAOCustomer;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Customer extends Controller
{
    public function get(){
        $input = request()->all();
        
        $validator = Validator::make($input, [
            'page' => 'required',
            'pageSize' => 'required',
        ], BaseConf::$ValidatorMessages);

        return $this->respSuccess(DAOCustomer::get($input['page'],$input['pageSize']));
    }

    public function set(){
        $input = request()->all();

        $validator = Validator::make($input, [
            'name' => 'required',
            'img' =>'required',
        ], BaseConf::$ValidatorMessages);

        if ($validator->fails()) {
            return $this->respFailure($validator->errors());
        }
        
        return $this->respSuccess(DAOCustomer::set($input));
    }

    public function del(){

        $input = request()->all();

        $validator = Validator::make($input, [
            'id' => 'required',
        ], BaseConf::$ValidatorMessages);

        if ($validator->fails()) {
            return $this->respFailure($validator->errors());
        }

        if (!DAOCustomer::checkExists($input['id'])) {
            return $this->respFailure('item is not exists');
        }

        DAOCustomer::del($input['id']);

        return $this->respSuccess(true);
    }
}
