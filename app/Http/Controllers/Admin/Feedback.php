<?php

namespace App\Http\Controllers\Admin;

use App\Dao\DAOFeedback;
use App\Http\Controllers\Controller;

class Feedback extends Controller
{
    public function getList()
    {
        return $this->respSuccess(DAOFeedback::getList());
    }
}
