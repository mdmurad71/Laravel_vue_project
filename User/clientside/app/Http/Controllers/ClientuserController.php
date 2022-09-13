<?php

namespace App\Http\Controllers;

use App\Models\Clientuser;
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

           $phone= $request->input('phone');

           $record= DB::table('clientuser')->where('phone', $phone)->first();

           if($record === null){
            $data= array();
            $data['name'] = $request->name;
            $data['phone'] = $request->phone;
            DB::table('clientuser')->insert($data);
           }else{
            
           }




    }
}
