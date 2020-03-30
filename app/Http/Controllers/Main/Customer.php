<?php

namespace App\Http\Controllers\main;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Customer extends Controller
{
    public function get(){
        return $this->respSuccess(DAOWorkshop::get(request()->header('language', 'cn')));
    }
}
