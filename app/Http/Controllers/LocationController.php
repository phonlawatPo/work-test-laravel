<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LocationController extends Controller
{

    public function getProvince(){
        $provinces = \DB::table('provinces')->orderBy('name', 'ASC')->get();
        $data['provinces'] = $provinces;
        return view('LocationTest', $data);
    }

    public function getAmphoe($province_id = null){
        $amphoes = \DB::table('districts')
                    ->where('province_id',$province_id)
                    ->OrderBy('name','ASC')
                    ->get();
        return respose()->json([
            'status_code' => 200,
            'status_msg' => 'Success',
            'amphoes' => $amphoes
        ]);
    }
}
