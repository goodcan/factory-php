<?php


namespace App\Http\Controllers\Dao;


use App\Http\Controllers\Conf\DBTable;
use App\Http\Controllers\Common\L18n;
use App\Http\Controllers\Common\Json;
use Illuminate\Support\Facades\DB;

class DAOCompanyHistory
{
    static function get($lang = null)
    {
        $data = DB::table(DBTable::$CompanyHistory)->get(['timestamp', 'content']);
        foreach ($data as $item) {
            $item->content = L18n::decodeDBField($item->content, $lang);
        }
        return $data;
    }

    static function upsert($data)
    {
        if (array_key_exists('content', $data)) {
            $data['content'] = Json::encodeDBField($data['content']);
        }
        DB::table(DBTable::$CompanyHistory)
            ->updateOrInsert(['timestamp' => $data['timestamp']], $data);
    }
}
