<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomsController extends Controller
{
    public function getData(){
        $result= Room::orderBy('id', 'desc')->get();
        return $result;
    }

    public function showData($id){
        $result= Room::where('id', $id)->get();
        return $result;
    }
}
