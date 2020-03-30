<?php

namespace App\Http\Controllers\main;
use App\Dao\DAOCustomer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Customer extends Controller
{
 
    public function get(){

        return $this->respSuccess(DAOCustomer::v1get(request()->header('language', 'cn')));
    }
}
