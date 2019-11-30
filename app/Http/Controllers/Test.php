<?php


namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;

class Test extends Controller
{
    public function test() {
        $data = DB::table('test')->get();
//        foreach ($data as $item) {
//            echo $item->id;
//        }

        return response()->json([
            'test' => 'hello world!',
            'data' => $data
        ]);
    }
}
