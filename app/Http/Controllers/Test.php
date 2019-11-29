<?php


namespace App\Http\Controllers;


class Test extends Controller
{
    public function test() {
        return response()->json([
            'test' => 'hello world!'
        ]);
    }
}
