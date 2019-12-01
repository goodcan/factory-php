<?php


namespace App\Http\Controllers\orm;


use App\Http\Controllers\common\Json;
use App\Http\Controllers\common\L18n;
use Illuminate\Support\Facades\DB;

class ORMCompany
{
    static function get($lang = null)
    {
        $company = DB::table('company')->first();
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

    static function update($data)
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
        DB::table('company')
            ->where('id', 1)
            ->update($data);
    }
}
