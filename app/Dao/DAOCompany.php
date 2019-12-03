<?php

namespace App\Dao;

use Illuminate\Support\Facades\DB;

use App\Conf\DBTable;
use App\Utils\Json;
use App\Utils\L18n;

class DAOCompany
{
    static function getInfo($lang = null)
    {
        $company = DB::table(DBTable::$Company)->first();
        $info = [
            'phone' => $company->phone,
            'fax' => $company->fax,
            'mobilePhone' => $company->mobilePhone,
            'concatUser' => L18n::decodeDBField($company->concatUser, $lang),
            'email' => $company->email,
            'address' => L18n::decodeDBField($company->address, $lang),
            'logo' => $company->logo,
            'briefIntroduction' => L18n::decodeDBField($company->briefIntroduction, $lang),
        ];
        if ($company->latLng === null) {
            $info['latLng'] = [
                'lat' => 0,
                'lng' => 0
            ];
        } else {
            $info['latLng'] = Json::decodeDBField($company->latLng);
        }
        return $info;
    }

    static function updateInfo($data)
    {
        if (array_key_exists('concatUser', $data)) {
            $data['concatUser'] = Json::encodeDBField($data['concatUser']);
        }
        if (array_key_exists('address', $data)) {
            $data['address'] = Json::encodeDBField($data['address']);
        }
        if (array_key_exists('briefIntroduction', $data)) {
            $data['briefIntroduction'] = Json::encodeDBField($data['briefIntroduction']);
        }
        if (array_key_exists('latLng', $data)) {
            $data['latLng'] = Json::encodeDBField($data['latLng']);
        }
        $data['id'] = 1;
        DB::table(DBTable::$Company)
            ->updateOrInsert(['id' => $data['id']], $data);
    }


    static function getHistory($lang = null)
    {
        $data = DB::table(DBTable::$CompanyHistory)->get(['timestamp', 'content']);
        foreach ($data as $item) {
            $item->content = L18n::decodeDBField($item->content, $lang);
        }
        return $data;
    }

    static function upsertHistory($data)
    {
        if (array_key_exists('content', $data)) {
            $data['content'] = Json::encodeDBField($data['content']);
        }
        DB::table(DBTable::$CompanyHistory)
            ->updateOrInsert(['timestamp' => $data['timestamp']], $data);
    }


    static function getNews($lang = null)
    {
        $data = DB::table(DBTable::$CompanyNews)->get();
        foreach ($data as $item) {
            $item->title = L18n::decodeDBField($item->title, $lang);
            $item->content = L18n::decodeDBField($item->content, $lang);
        }
        return $data;
    }
}
