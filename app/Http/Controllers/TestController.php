<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Input;

class TestController extends Controller
{
    public function insert(){
        $db = DB::table('test');
        $result = $db->insert([
            [
                'name'=>'小新',
                'age'=>'2',
                'email'=>'madongmei@qq.com'
            ],
            [
                'name'=>'风间彻',
                'age'=>'3',
                'email'=>'fengjianche@qq.com'
            ],
            [
                'name'=>'美伢',
                'age'=>'18',
                'email'=>'meiya@qq.com'
            ],
            [
                'name'=>'怪兽',
                'age'=>'18',
                'email'=>'guaishou@qq.com'
            ],
        ]);
        dd($result);
    }
    public function delete(){
        $db = DB::table('test');
        $result = $db->where('name','=','怪兽')->delete();
        dd($result);
    }
    public function update(){
        $db = DB::table('test');
        $result = $db->where('name','=','小新') -> update([
            'name' => '野原新之助'
        ]);
        dd($result);
    }

    public function select(){
        $db = DB::table('test');
        $data = $db->get();
        foreach ($data as $key => $value) {
            echo "id是：{$value->id}, 名字是: {$value->name},邮箱是: {$value->email} </br>";
        }
    }

    public function selectPaginate(){

        $page = Input::get('page',1);
        $pageSize = Input::get('pageSize',10);
        $name = Input::get('name');

        $db = DB::table('test');
        $data = $db->where('name','like','%'.$name.'%')->paginate($pageSize);
        // dd($data);
        foreach ($data as $key => $value) {
            echo "id是：{$value->id}, 名字是: {$value->name},邮箱是: {$value->email} </br>";
        }
        return $data ;
    }
}
