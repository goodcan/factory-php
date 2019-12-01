<?php


namespace App\Http\Controllers\Dao;


use App\Http\Controllers\Conf\DBTable;
use App\Http\Controllers\Common\L18n;
use Illuminate\Support\Facades\DB;

class DAOCompanyNews
{
    static function get($lang = null)
    {
        $data = DB::table(DBTable::$CompanyNews)->get();
        foreach ($data as $item) {
            $item->title = L18n::decodeDBField($item->title, $lang);
            $item->content = L18n::decodeDBField($item->content, $lang);
        }
        return $data;
    }
}
