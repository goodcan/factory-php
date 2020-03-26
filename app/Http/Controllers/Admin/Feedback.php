<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use App\Conf\BaseConf;

use App\Dao\DAOFeedback;
use App\Http\Controllers\Controller;


class Feedback extends Controller
{
    public function list()
    {
        return $this->respSuccess(DAOFeedback::getList());
    }

    public function delete(){

        $input = request()->all();
        $validator = Validator::make($input, [
            'id' => 'required'
        ], BaseConf::$ValidatorMessages);

        if ($validator->fails()) {
            return $this->respFailure($validator->errors());
        }

        if (!DAOFeedback::checkExists($input['id'])) {
            return $this->respFailure('feddback is not exists');
        }

        return $this->respSuccess(DAOFeedback::delete($input['id']));
    }
}
