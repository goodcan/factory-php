<?php

namespace App\Dao;

use Illuminate\Support\Facades\DB;

use App\Conf\DBTable;

class DAOFeedback
{
    static function getList()
    {
        return DB::table(DBTable::$Feedback)->get();
    }

    static function delete($id)
    {
        return DB::table(DBTable::$Feedback)->where('id',$id)->delete();
    }

    static function checkExists($id)
    {
        return DB::table(DBTable::$Feedback)
            ->where('id', $id)
            ->exists();
    }

    static function submit($data)
    {
        $data['time'] = time();
        DB::table(DBTable::$Feedback)->insert($data);
    }
}
