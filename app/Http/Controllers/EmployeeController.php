<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Division;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function employee(){
        $divisions = Division::all();
        return view('create_employee',compact('divisions'));
    }
    public function insert(Request $req){
        $obj = new Employee();
        $obj->name = $req->name;
        $obj->division_id = $req->division_id;
        $obj->district_id = $req->district_id;
        if($obj->save()){
            return response()->json([
                'employee'=>$obj
            ]);
        }


    }

}
