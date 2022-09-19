<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function about($cat){
        $name = 'Any';
        $email = 'any@gmail.com';
        return view('about', ['mycategory'=>$cat, 'myname' => $name, 'myemail'=>$email]);
    }
}
