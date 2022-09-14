<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
// use Intervention\Image\Image;

class RoomsController extends Controller
{

       public function getData(){
        $result= DB::table('aminities')->get();
        return $result;
       }



    public function roomUpload(Request $request){

        //    $fileName = time().'.'.$request->file->getClientOriginalExtension();
        //    $filepath= $request->file->move(public_path('upload'), $fileName);

           $data= array();
           $data['name']= $request->name;
           $data['size']= $request->size;
           $data['maximum_occupancy']= $request->maximum_occupancy;
           $data['price']= $request->price;
           $data['amenities']= $request->amenities;
           $data['description']= $request->description;
        //    $data['photo']= $filepath;
           DB::table('rooms')->insert($data);
           return response()->json(['success'=>'You have successfully upload file.']);



   
               
    }


    public function roomsData(){
        $result= Room::get();
        return $result;
    }

    public function deleteData($id){
        $result= Room::where('id', $id)->delete();
        return $result;
    }


    public function showData($id){
        $result= Room::where('id', $id)->first();
        return response()->json($result);
    }


    public function updateRoom(Request $request, $id)
    {
        $product = Room::where('id', $id)->first();
        $product->update($request->all());
        return response()->json('Product updated!');
    }




}


   