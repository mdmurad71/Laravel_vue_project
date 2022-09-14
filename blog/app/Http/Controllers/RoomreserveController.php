<?php

namespace App\Http\Controllers;

use App\Models\Roomreserve;
use Illuminate\Http\Request;

class RoomreserveController extends Controller
{
    public function reserveList(){

        $result= Roomreserve::with('room')->orderBy('id', 'desc')->get();
        return $result;
    }

    public function deleteRequest($id){
        $result= Roomreserve::where('id', $id)->delete();
        return $result;
    }
}
