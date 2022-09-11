<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
// use Intervention\Image\Image;
use Intervention\Image\Image;

class RoomsController extends Controller
{

       public function getData(){
        $result= DB::table('aminities')->get();
        return $result;
       }



    public function roomUpload(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'size' => 'required|unique:products|max:255',
            'maximum_occupancy' => 'required',
            'price' => 'required',
            'amenities' => 'required',
            'description' => 'required'
,
           ]);

           $data= array();
           $data['name']= $request->name;
           $data['size']= $request->size;
           $data['maximum_occupancy']= $request->maximum_occupancy;
           $data['price']= $request->price;
           $data['amenities']= $request->amenities;
           $data['description']= $request->description;
           DB::table('rooms')->insert($data);
        //    $photo= $request->photo;
           
        //    if($photo){
        //     $photoname= time().'.'.$photo->getClientOriginalExtension();
        //     Image::make($photo)->resize(240, 200)->save('public/image'.$photoname);
        //     $data['photo']= 'public/image'.$photoname;
        //     DB::table('rooms')->insert($data);
            
        //    }

   
               
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


   