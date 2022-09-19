<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Form;

class multipleImage extends Controller
{
    public function index()
    {

    }

   
    public function multipleImage()
    {
        $images = Form::all();
    
        return view('multipleImage.create',compact('images'));
    }

  
    public function uploadMultipleImage(Request $request)

    {

        $this->validate($request, [

                'filename' => 'required',
                'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);
        
        if($request->hasfile('filename'))
         {

            foreach($request->file('filename') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/images/', $name);  
                $data[] = $name;  
            }
         }

         $form= new Form();
         $form->filename=json_encode($data);
         
        
        $form->save();

        return back()->with('success', 'Your images has been successfully');
    }


    
    public function show($id)
    {
        
    }

    public function edit($id)
    {
    
    }

    
    public function update(Request $request, $id)
    {
        
    }

    
    public function destroy($id)
    {
        
    }
}
