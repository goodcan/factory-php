<?php

namespace App\Http\Controllers\admin;


use Illuminate\Support\Facades\Validator;
use App\Conf\BaseConf;
use App\Dao\DAOFaq;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Faq extends Controller
{
    public function get(){
        return $this->respSuccess(DAOFaq::get());
    }

    public function set(){
        $input = request()->all();

        $validator = Validator::make($input, [
            'answer' => 'required',
            'question' => 'required',
        ], BaseConf::$ValidatorMessages);

        if ($validator->fails()) {
            return $this->respFailure($validator->errors());
        }
        
        return $this->respSuccess(DAOFaq::set($input));
    }

    public function del(){

        $input = request()->all();

        $validator = Validator::make($input, [
            'id' => 'required',
        ], BaseConf::$ValidatorMessages);

        if ($validator->fails()) {
            return $this->respFailure($validator->errors());
        }
        
        if (!DAOFaq::checkExists($input['id'])) {
            return $this->respFailure('faq is not exists');
        }

        DAOFaq::del($input['id']);

        return $this->respSuccess(true);
    }
}
