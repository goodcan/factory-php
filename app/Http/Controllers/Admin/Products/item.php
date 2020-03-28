<?php

namespace App\Http\Controllers\Admin\Products;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use Illuminate\Support\Facades\Validator;
use App\Conf\BaseConf;

use App\Dao\DAOProductsItem;

class item extends Controller
{
    public function get(){
        $input = request()->all();

        $validator = Validator::make($input, [
            'type' => 'required',
            'page' => 'required',
            'pageSize' => 'required',
        ], BaseConf::$ValidatorMessages);

        if ($validator->fails()) {
            return $this->respFailure($validator->errors());
        }

             // $page = Input::get('page',1);
        // $pageSize = Input::get('pageSize',10);

        return $this->respSuccess(DAOProductsItem::get($input['type'],$input['model'],$input['page'],$input['pageSize']));
    }

    public function set(){
        $input = request()->all();

        $validator = Validator::make($input, [
            'model' => 'required',
            'image' => 'required',
        ], BaseConf::$ValidatorMessages);

        if ($validator->fails()) {
            return $this->respFailure($validator->errors());
        }
        DAOProductsItem::set($input);
        return $this->respSuccess(true);
    }

    public function del(){

        $input = request()->all();

        $validator = Validator::make($input, [
            'id' => 'required',
        ], BaseConf::$ValidatorMessages);

        if ($validator->fails()) {
            return $this->respFailure($validator->errors());
        }

        if (!DAOProductsItem::checkExists($input['id'])) {
            return $this->respFailure('nav is not exists');
        }

        DAOProductsItem::del($input['id']);

        return $this->respSuccess(true);
    }
}
