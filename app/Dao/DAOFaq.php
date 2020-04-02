<?php

namespace App\Dao;

use Illuminate\Support\Facades\DB;

use App\Conf\DBTable;

use App\Utils\Json;
use App\Utils\L18n;

class DAOFaq
{
    static function get($lang = null)
    {
        $data = DB::table(DBTable::$Faq)->where('effective',1)->get();

        foreach ($data as $item) {
            $item->answer = L18n::decodeDBField($item->answer, $lang);
            $item->question = L18n::decodeDBField($item->question, $lang);
        }

        return $data;
    }

    static function del($id)
    {
        return DB::table(DBTable::$Faq)->where('id',$id)->update(['effective'=>0]);
    }

    static function checkExists($id)
    {
        return DB::table(DBTable::$Faq)
            ->where('id', $id)
            ->exists();
    }

    static function set($data)
    {
        $data['answer'] = Json::encodeDBField($data['answer']);
        $data['question'] = Json::encodeDBField($data['question']);
        $data['createTime'] = time();
        $data['effective'] = 1;
        if(array_key_exists('id',$data)){
            DB::table(DBTable::$Faq)->where('id',$data['id'])->update($data);
        }else{
            DB::table(DBTable::$Faq)->insert($data);
        }
        // DB::table(DBTable::$Faq)->insert($data);
        // DB::table(DBTable::$Faq)->updateOrInsert(['id' => $data=>id], $data);
    }
}
