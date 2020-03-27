<?php

namespace App\Dao;

use Illuminate\Support\Facades\DB;

use App\Conf\DBTable;

use App\Utils\Json;
use App\Utils\L18n;

class DAOProductsNav
{
    static function get($lang = null)
    {
        $data = DB::table(DBTable::$ProductsNav)->where('effective',1)->get();

        foreach ($data as $item) {
            $item->name = L18n::decodeDBField($item->name, $lang);
        }

        return $data;
    }

    static function del($id)
    {
        return DB::table(DBTable::$ProductsNav)->where('id',$id)->update(['effective'=>0]);
    }

    static function checkExists($id)
    {
        return DB::table(DBTable::$ProductsNav)
            ->where('id', $id)
            ->exists();
    }

    static function set($data)
    {
        $data['name'] = Json::encodeDBField($data['name']);
        $data['createTime'] = time();
        $data['effective'] = 1;
        if(array_key_exists('id',$data)){
            DB::table(DBTable::$ProductsNav)->where('id',$data['id'])->update($data);
        }else{
            DB::table(DBTable::$ProductsNav)->insert($data);
        }
        // DB::table(DBTable::$ProductsNav)->insert($data);
        // DB::table(DBTable::$ProductsNav)->updateOrInsert(['id' => $data=>id], $data);
    }
}
