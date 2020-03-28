<?php

namespace App\Dao;

use Illuminate\Support\Facades\DB;

use App\Conf\DBTable;

use App\Utils\Json;
use App\Utils\L18n;

class DAOProductsItem
{
    static function get($type,$page,$pageSize,$lang = null)
    {
        $data = DB::table(DBTable::$ProductsItem)->where('effective',1)->where('type',$type)->paginate($pageSize);

        // $page = Input::get('page',1);
        // $pageSize = Input::get('pageSize',10);

        foreach ($data as $item) {
            $item->name = L18n::decodeDBField($item->name, $lang);
        }

        return $data;
    }

    static function del($id)
    {
        return DB::table(DBTable::$ProductsItem)->where('id',$id)->update(['effective'=>0]);
    }

    static function checkExists($id)
    {
        return DB::table(DBTable::$ProductsItem)
            ->where('id', $id)
            ->exists();
    }

    static function set($data)
    {
        $data['name'] = Json::encodeDBField($data['name']);
        $data['createTime'] = time();
        $data['effective'] = 1;
        if(array_key_exists('id',$data)){
            DB::table(DBTable::$ProductsItem)->where('id',$data['id'])->update($data);
        }else{
            DB::table(DBTable::$ProductsItem)->insert($data);
        }
        // DB::table(DBTable::$ProductsItem)->insert($data);
        // DB::table(DBTable::$ProductsItem)->updateOrInsert(['id' => $data=>id], $data);
    }
}
