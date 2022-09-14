<?php

namespace App\Http\Controllers;

use App\Models\ConfirmReserve;
use App\Models\Room;
use App\Models\Roomreserve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConfirmReserveController extends Controller
{
    public function confirmOrder(Request $request, $id){
        $reserve= Roomreserve::where('id', $id)->first();
        // $room= Room::where('id')->get()

        $data= array();
        $data['name']=$reserve->name;
        $data['phone']=$reserve->phone;
        $data['room_id']=$reserve->room_id;
        $data['check_in']=$reserve->check_in;
        $data['check_out']=$reserve->check_out;
        DB::table('cinfirm_reserve')->insert($data);
         return response()->json("done");

      
        }


        public function confirmList(){

            $result= ConfirmReserve::with('room')->orderBy('id', 'desc')->get();
            return $result;
        }
      
        
    
}
