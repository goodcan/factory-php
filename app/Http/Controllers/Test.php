<?php


namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;

class Test extends Controller
{
    public function test()
    {
        $data = DB::table('test')->get();
        return $this->respSuccess($data);
    }
}
