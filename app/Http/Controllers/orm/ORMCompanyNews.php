<?php


namespace App\Http\Controllers\orm;


use App\Http\Controllers\common\L18n;
use Illuminate\Support\Facades\DB;

class ORMCompanyNews
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
