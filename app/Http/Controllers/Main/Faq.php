<?php

namespace App\Http\Controllers\main;
use App\Dao\DAOFaq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Faq extends Controller
{
    public function get(){
        return $this->respSuccess(DAOFaq::get(request()->header('language', 'cn')));
    }
}
