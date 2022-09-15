<?php

namespace App\Http\Controllers;

use App\Models\Demo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DemoController extends Controller
{
    public function insertData(Request $request){
       
        
        // $fileName = time().'.'.$request->file->getClientOriginalExtension();
        // $filepath= $request->file->move(public_path('upload'), $fileName);
        $filepath= $request->file->store('image', 'public');

        $data=array();
        $data['name']= $request->name;
        // $data['size']= $request->size;
        // $data['maximum_occupancy']= $request->maximum_occupancy;
        // $data['price']= $request->price;
        // $data['amenities']= $request->amenities;
        // $data['description']= $request->description;
        $data['file']= $filepath;

         DB::table('demo')->insert($data);
        return response()->json(['success'=>'You have successfully upload file.']);
    }
}
