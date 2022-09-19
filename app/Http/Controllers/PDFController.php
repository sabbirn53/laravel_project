<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
   public function pdfFile(){
    $data = [
        'title' => 'Welcome to Tutsmake.com',
        'date' => date('m/d/Y')
    ];
       
    $pdf = PDF::loadView('pdf\create', $data);
 
    return $pdf->download('tutsmake.pdf');
   }

}
