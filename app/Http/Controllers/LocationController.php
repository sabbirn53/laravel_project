<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\District;


class LocationController extends Controller
{
    public function getDistrictByDivision($division_id){
        $d = District::where('division_id' , '=' , $division_id)->get();
        return response()->json([
            'districts' => $d
        ]);

    }
}
