<?php

namespace App\Http\Controllers\Main\Products;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

        return $this->respSuccess(DAOProductsItem::get($input['type'],$input['page'],$input['pageSize'],request()->header('language', 'cn')));
    }

}
