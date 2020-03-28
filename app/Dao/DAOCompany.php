<?php

namespace App\Dao;

use Illuminate\Support\Facades\DB;

use App\Conf\DBTable;
use App\Utils\Json;
use App\Utils\L18n;
use Input;

class DAOCompany
{

    static function baseInfo()
    {
        return [
            'phone' => '',
            'fax' => '',
            'mobilePhone' => '',
            'concatUser' => L18n::decodeDBField(NULL),
            'email' => '',
            'address' => L18n::decodeDBField(NULL),
            'logo' => '',
            'briefIntroduction' => L18n::decodeDBField(NULL),
            'latLng' => [
                'lat' => 0,
                'lng' => 0
            ]
        ];
    }

    static function getInfo($lang = null)
    {
        $query = DB::table(DBTable::$Company)->first();
        $info = DAOCompany::baseInfo();
        if (is_null($query)) {
            return $info;
        }
        $info['phone'] = $query->phone;
        $info['fax'] = $query->fax;
        $info['mobilePhone'] = $query->mobilePhone;
        $info['concatUser'] = L18n::decodeDBField($query->concatUser, $lang);
        $info['email'] = $query->email;
        $info['address'] = L18n::decodeDBField($query->address, $lang);
        $info['logo'] = $query->logo;
        $info['briefIntroduction'] = L18n::decodeDBField($query->briefIntroduction, $lang);
        if ($query->latLng !== null) {
            $info['latLng'] = Json::decodeDBField($query->latLng);
        }
        return $info;
    }

    static function updateInfo($data)
    {
        $data['concatUser'] = Json::encodeDBField($data['concatUser']);
        $data['address'] = Json::encodeDBField($data['address']);
        $data['briefIntroduction'] = Json::encodeDBField($data['briefIntroduction']);
        $data['latLng'] = Json::encodeDBField($data['latLng']);
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

    static function checkHistoryExists($id)
    {
        return DB::table(DBTable::$CompanyHistory)
            ->where('timestamp', $id)
            ->exists();
    }

    static function upsertHistory($data)
    {
        $data['content'] = Json::encodeDBField($data['content']);
        DB::table(DBTable::$CompanyHistory)
            ->updateOrInsert(['timestamp' => $data['timestamp']], $data);
    }

    static function delHistory($timestamp)
    {
        DB::table(DBTable::$CompanyHistory)->where('timestamp', $timestamp)->delete();
    }

    static function getNews($lang = null)
    {
        $page = Input::get('page',1);
        $pageSize = Input::get('pageSize',10);

        $data = DB::table(DBTable::$CompanyNews)->orderBy('setTime','desc')->paginate($pageSize);
        foreach ($data as $item) {
            $item->title = L18n::decodeDBField($item->title, $lang);
            $item->summary = L18n::decodeDBField($item->summary, $lang);
            unset($item->content) ;
            // $item->content = L18n::decodeDBField($item->content, $lang);
        }
        return $data;
    }

    static function getNewsById($id,$lang = null)
    {

        $data = DB::table(DBTable::$CompanyNews)->where('id',$id)->increment('readings');
        dd($data);
        // dd( $lang);
        $data->title = L18n::decodeDBField($data->title, $lang);
        $data->summary = L18n::decodeDBField($data->summary, $lang);
        $data->content = L18n::decodeDBField($data->content, $lang);
     
        return $data;
    }

    static function checkNewsExists($id)
    {
        return DB::table(DBTable::$CompanyNews)
            ->where('id', $id)
            ->exists();
    }

    static function setNews($data)
    {
        $data['title'] = Json::encodeDBField($data['title']);
        $data['summary'] = Json::encodeDBField($data['summary']);
        $data['content'] = Json::encodeDBField($data['content']);
        $data['setTime'] = time();
      
        if (array_key_exists('id', $data) && $data['id'] !== 0) {
            DB::table(DBTable::$CompanyNews)
                ->where('id', $data['id'])
                ->update($data);
        } else {
            DB::table(DBTable::$CompanyNews)
                ->insert($data);
        }
    }

    static function delNews($id)
    {
        DB::table(DBTable::$CompanyNews)
            ->where('id', $id)
            ->delete();
    }

    // static function increaseReading($id)
    // {
    //     DB::table(DBTable::$CompanyNews)
    //         ->where('id', $id)
    //         ->increment('readings');
    // }
}
