<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Village;
use Illuminate\Http\Request;

class AlamatController extends Controller
{
    public function getProvinsi(Request $request)
    {   
        if($request->ajax()) {
            $provinces = Province::all();
            return response()->json([
                'provinces' => $provinces
            ]);
        }
    }
     public function getKabupaten(Request $request)
     {
        $province_id = $request->input('province_id');
        $regencies = Regency::where('province_id', $province_id)->get();

        return response()->json([
            'regencies' => $regencies
        ]);
     }

     public function getKecamatan(Request $request)
     {
        $regency_id = $request->input('regency_id');
        $districts = District::where('regency_id', $regency_id)->get();

        return response()->json([
            'districts' => $districts
        ]);
     }
     public function getDesa(Request $request)
     {
        $district_id = $request->input('district_id');
        $villages = Village::where('district_id', $district_id)->get();

        return response()->json([
            'villages' => $villages
        ]);
     }
}
