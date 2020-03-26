<?php

namespace App\Http\Controllers\Main\Products;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Dao\DAOProductsNav;

class nav extends Controller
{
    public function get(){
        return $this->respSuccess(DAOProductsNav::get(request()->header('language', 'cn')));
    }

}
