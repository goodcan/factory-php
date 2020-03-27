<?php

namespace App\Http\Controllers\Admin\Products;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use Illuminate\Support\Facades\Validator;
use App\Conf\BaseConf;

use App\Dao\DAOProductsNav;

class nav extends Controller
{
    public function get(){
        return $this->respSuccess(DAOProductsNav::get());
    }

    public function set(){
        $input = request()->all();

        $validator = Validator::make($input, [
            'name' => 'required',
            'pid' => 'required',
        ], BaseConf::$ValidatorMessages);

        if ($validator->fails()) {
            return $this->respFailure($validator->errors());
        }
        
        return $this->respSuccess(DAOProductsNav::set($input));
    }

    public function del(){

        $input = request()->all();

        $validator = Validator::make($input, [
            'id' => 'required',
        ], BaseConf::$ValidatorMessages);

        if ($validator->fails()) {
            return $this->respFailure($validator->errors());
        }

        if (!DAOProductsNav::checkExists($input['id'])) {
            return $this->respFailure('nav is not exists');
        }

        DAOProductsNav::del($input['id']);

        return $this->respSuccess(true);
    }
}
