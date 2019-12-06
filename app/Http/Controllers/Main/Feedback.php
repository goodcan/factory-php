<?php

namespace App\Http\Controllers\Main;

use Illuminate\Support\Facades\Validator;

use App\Conf\BaseConf;
use App\Dao\DAOFeedback;
use App\Http\Controllers\Controller;

class Feedback extends Controller
{
    public function submit()
    {
        $input = request()->all();

        $validator = Validator::make($input, [
            'name' => 'required',
            'company' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'content' => 'required',
        ], BaseConf::$ValidatorMessages);

        if ($validator->fails()) {
            return $this->respFailure($validator->errors());
        }

        DAOFeedback::submit($input);
        return $this->respSuccess();
    }
}
