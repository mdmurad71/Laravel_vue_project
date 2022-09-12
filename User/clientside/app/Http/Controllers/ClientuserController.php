<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientuserController extends Controller
{
    public function login(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'phone' => 'required'

,
           ]);


        $data= array();
        $data['name'] = $request->name;
        $data['phone'] = $request->phone;
        DB::table('clientuser')->insert($data);

    }
}
