<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Dao\DAOWorkshop;

class Workshop extends Controller
{
    public function get(){
        return $this->respSuccess(DAOWorkshop::get(request()->header('language', 'cn')));
    }

}
