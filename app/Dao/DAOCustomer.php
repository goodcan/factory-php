<?php

namespace App\Dao;

use Illuminate\Support\Facades\DB;

use App\Conf\DBTable;

use App\Utils\Json;
use App\Utils\L18n;

class DAOCustomer
{
    static function get($page,$pageSize,$lang = null)
    {
        $data = DB::table(DBTable::$Customer)->where('effective',1)->paginate($pageSize);

        foreach ($data as $item) {
            $item->name = L18n::decodeDBField($item->name, $lang);
        }

        return $data;
    }

    static function del($id)
    {
        return DB::table(DBTable::$Customer)->where('id',$id)->update(['effective'=>0]);
    }

    static function checkExists($id)
    {
        return DB::table(DBTable::$Customer)
            ->where('id', $id)
            ->exists();
    }

    static function set($data)
    {
        $data['name'] = Json::encodeDBField($data['name']);
        $data['createTime'] = time();
        $data['effective'] = 1;
        if(array_key_exists('id',$data)){
            DB::table(DBTable::$Customer)->where('id',$data['id'])->update($data);
        }else{
            DB::table(DBTable::$Customer)->insert($data);
        }
        // DB::table(DBTable::$Customer)->insert($data);
        // DB::table(DBTable::$Customer)->updateOrInsert(['id' => $data=>id], $data);
    }
}
