<?php

namespace App\Http\Controllers\Main\Products;


use Illuminate\Support\Facades\Validator;
use App\Conf\BaseConf;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

        if(array_key_exists('model',$input)){
            $modal = $input['model'];
        }else{
            $modal = null;
        }
             // $page = Input::get('page',1);
        // $pageSize = Input::get('pageSize',10);

        return $this->respSuccess(DAOProductsItem::get($input['type'],$modal,$input['page'],$input['pageSize'],request()->header('language', 'cn')));
    }

}
