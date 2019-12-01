<?php


namespace App\Http\Controllers\orm;


use App\Http\Controllers\common\Json;
use App\Http\Controllers\common\L18n;
use Illuminate\Support\Facades\DB;

class ORMCompany
{
    static function CompanyInfo()
    {
        $company = DB::table('company')->first();
        $info = [
            'phone' => $company->phone,
            'fax' => $company->fax,
            'mobilePhone' => $company->mobilePhone,
            'concatUser' => L18n::fmtDBField($company->concatUser),
            'email' => $company->email,
            'address' => L18n::fmtDBField($company->address),
            'logo' => $company->logo,
            'briefIntroduction' => L18n::fmtDBField($company->briefIntroduction),
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
}
